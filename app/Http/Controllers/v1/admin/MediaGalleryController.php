<?php

namespace App\Http\Controllers\v1\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MediaGallery;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Exception;
use Intervention\Image\Facades\Image;

use Illuminate\Support\Facades\Auth;

class MediaGalleryController extends Controller
{

    public function storeBase64Image($base64String, $uploadDir)
    {
        $UPLOADS_PATH = public_path('uploads/' . $uploadDir);
        $UPLOADS_FOLDER = public_path('uploads/' . $uploadDir);
    
        if (!file_exists($UPLOADS_FOLDER)) {
            mkdir($UPLOADS_FOLDER, 0777, true);
        }
    
        $matches = [];
        preg_match('/^data:image\/([A-Za-z-+\/]+);base64,(.+)$/', $base64String, $matches);
    
        if (empty($matches)) {
            throw new \Exception("Invalid base64 string format");
        }
    
        $extension = $matches[1];
        if (!in_array($extension, ['jpeg', 'png', 'webp', 'jpg'])) {
            throw new \Exception("Invalid image file type");
        }
    
        // Decode the base64 string and save the image
        $image = base64_decode($matches[2]);
    
        // Resize the image
        $resizedImage = Image::make($image)->resize(800, null, function ($constraint) {
            $constraint->aspectRatio();
        });
    
        // Generate a unique filename
        $filename = Str::uuid() . '.' . $extension;
    
        // Save the resized image to the uploads folder
        $resizedImage->save($UPLOADS_FOLDER . '/' . $filename);
    
        // Return the URL path of the saved image
        $imagePath = '/'.'uploads/' . $uploadDir . '/' . $filename;
        return $imagePath;
    }
    public function saveFile($file, $process)
    {
        $extension = $file->getClientOriginalExtension();
        $cur = Str::uuid();
        $fileName = $process . '-' . $cur . '.' . $extension;
        $basePath = public_path('\\Image\\');
        if (env('APP_ENV') == 'prod') {
            $basePath =  public_path('/Image/');
        }
        if (!is_dir($basePath)) {
            mkdir($basePath, 0755, true);
        }
        if (env('APP_ENV') == 'prod') {
            $destinationPath =  public_path('/Image');
        } else {
            $destinationPath = public_path('\\Image');
        }

        $file->move($destinationPath, $fileName);

        return '/Image/' . $fileName;
    }
    // public function addMediaGallery(Request $request): JsonResponse
    // {
    //     try {
    //         $validator = Validator::make($request->all(), [
    //             'media_type' => [Rule::in(['photo', 'video'])],
    //             'media.*' => [
    //                 'required',
    //                 function ($attribute, $value, $fail) use ($request) {
    //                     $index = str_replace('media.', '', $attribute);
    //                     if (isset ($request->media_type[$index])) {
    //                         $mediaType = $request->media_type[$index];

    //                         if ($mediaType === 'photo') {
    //                             if (!$value->isValid() || !in_array($value->getClientOriginalExtension(), ['jpeg', 'png', 'jpg'])) {
    //                                 $fail('The ' . $attribute . ' must be a valid image file (jpeg, png, jpg).');
    //                             }
    //                         } elseif ($mediaType === 'video') {
    //                             if (!$value->isValid() || !in_array($value->getClientOriginalExtension(), ['mp4', 'avi', 'mov'])) {
    //                                 $fail('The ' . $attribute . ' must be a valid video file (mp4, avi, mov).');
    //                             }
    //                         }
    //                     }
    //                 },
    //             ],
    //         ]);
    //         if ($validator->fails()) {
    //             return $this->sendError('Validation Error.', $validator->errors());
    //         }
    //         DB::beginTransaction();
    //         $media = $request->file('media');
    //         if (!is_array($media)) {
    //             return $this->sendError('Media cannot be null.');
    //         }
    //         foreach ($media as $key => $file) {
    //             $MediaGallery = new MediaGallery();
    //             $MediaGallery->user_id = Auth::user()->id;
    //             $MediaGallery->media_type = $request->media_type[$key];
    //             $MediaGallery->media = $this->saveFile($file, 'Media');
    //             $MediaGallery->save();
    //         }
    //         DB::commit();
    //         return $this->sendResponse([$MediaGallery], 'Media gallery added successfully.');
    //     } catch (Exception $e) {
    //         DB::rollBack();
    //         return $this->sendError($e->getMessage(), $e->getTrace(), 413);
    //     }
    // }

    public function addMediaGallery(Request $request): JsonResponse
{
    try {
        $validator = Validator::make($request->all(), [
            'media_type' => 'required|array',
            'media_type.*' => ['required', Rule::in(['photo', 'video'])],
            'media' => 'required|array',
            'media.*' => [
                'required',
                'string',
                function ($attribute, $value, $fail) use ($request) {
                    // Get the index of the current media file
                    $index = str_replace('media.', '', $attribute);
                    
                    // Get the media type for the current index
                    $mediaType = $request->media_type[$index];
        
                    // Determine valid extensions based on media type
                    $validExtensions = ($mediaType === 'photo') ? ['jpeg', 'png', 'jpg'] : ['mp4', 'avi', 'mov'];
        
                    // Check if the file extension is valid
                    if (!in_array(strtolower(pathinfo($value, PATHINFO_EXTENSION)), $validExtensions)) {
                        $fail('The ' . $attribute . ' must be a valid ' . $mediaType . ' file (' . implode(', ', $validExtensions) . ').');
                    }
                },
            ],
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        DB::beginTransaction();

        $uploadedMedia = [];
        foreach ($request->media as $index => $base64Media) {
            $media = new MediaGallery();
            $media->media_type = $request->media_type[$index];
            $media->media = $this->storeBase64Image($base64Media, $media->media_type); 
            $media->save();
            $uploadedMedia[] = $media;
        }

        DB::commit();

        return $this->sendResponse($uploadedMedia, 'Media gallery added successfully.');
    } catch (Exception $e) {
        DB::rollBack();
        return $this->sendError($e->getMessage(), $e->getTrace(), 413);
    }
}


    public function deleteMediaGallery(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:media_gallery,id'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $deleteMediaGallery = MediaGallery::query()->where('id', $request->id)->first();
            $deleteMediaGallery->delete();

            return $this->sendResponse($deleteMediaGallery, 'Media gallery deleted successfully.', true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }

    public function getAllMediaGallery(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'pageNo' => 'numeric',
                'limit' => 'numeric',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors(), 400);
            }
            $query = MediaGallery::query();
            $count = $query->count();
            if ($request->has('pageNo') && $request->has('limit')) {
                $limit = $request->limit;
                $pageNo = $request->pageNo;
                $skip = $limit * $pageNo;
                $query = $query->skip($skip)->limit($limit);
            }
            $data = $query->orderBy('id', 'DESC')->get();
            if (count($data) > 0) {
                $response['count'] = $count;
                $response['Mediagallery'] = $data;
                return $this->sendResponse($response, 'Data fetched successfully.', true);
            } else {
                return $this->sendError("No data found.");
            }
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
    public function getMediaGalleryById(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:media_gallery,id',
            ]);

            if ($validator->fails()) {
                return $this->sendError("Validation failed.", $validator->errors());
            }
            $mediaGallery = MediaGallery::query()->where('id', $request->id)->first();
            if (!$mediaGallery) {
                return $this->sendError('No data available.');
            }
            return $this->sendResponse($mediaGallery, "Media Gallery fetched successfully.", true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
}
