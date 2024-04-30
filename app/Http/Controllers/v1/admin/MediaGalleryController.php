<?php

namespace App\Http\Controllers\v1\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MediaGallery;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Facades\Auth;

class MediaGalleryController extends Controller
{
    public function saveFile($file, $fileName)
    {
        $fileExtension = $file->getClientOriginalExtension();
        $newFileName = Str::uuid() . '-' . rand(100, 9999) . '.' . $fileExtension;
        $uploadsPath = public_path('uploads');
        $directoryPath = "$uploadsPath/$fileName";

        if (!File::exists($uploadsPath)) {
            File::makeDirectory($uploadsPath, 0755, true);
        }

        if (!File::exists($directoryPath)) {
            File::makeDirectory($directoryPath, 0755, true);
        }

        $destinationPath = "$directoryPath/$newFileName";
        $file->move($directoryPath, $newFileName);

        return "/$fileName/" . $newFileName;
    }
    public function addMediaGallery(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'media_type.*' => [Rule::in(['photo', 'video'])],
                'media.*' => [
                    'required',
                    function ($attribute, $value, $fail) use ($request) {
                        $index = str_replace('media.', '', $attribute);
                        if (isset ($request->media_type[$index])) {
                            $mediaType = $request->media_type[$index];

                            if ($mediaType === 'photo') {
                                if (!$value->isValid() || !in_array($value->getClientOriginalExtension(), ['jpeg', 'png', 'jpg'])) {
                                    $fail('The ' . $attribute . ' must be a valid image file (jpeg, png, jpg).');
                                }
                            } elseif ($mediaType === 'video') {
                                if (!$value->isValid() || !in_array($value->getClientOriginalExtension(), ['mp4', 'avi', 'mov'])) {
                                    $fail('The ' . $attribute . ' must be a valid video file (mp4, avi, mov).');
                                }
                            }
                        }
                    },
                ],
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $media = $request->file('media');
            if (!is_array($media)) {
                return $this->sendError('Media cannot be null.');
            }
            foreach ($media as $key => $file) {
                $MediaGallery = new MediaGallery();
                $MediaGallery->user_id = Auth::user()->id;
                $MediaGallery->media_type = $request->media_type[$key];
                $MediaGallery->media = $this->saveFile($file, 'Media');
                $MediaGallery->save();
            }
            return $this->sendResponse([$MediaGallery], 'Media gallery added successfully.');
        } catch (Exception $e) {
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
