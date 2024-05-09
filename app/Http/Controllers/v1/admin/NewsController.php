<?php

namespace App\Http\Controllers\v1\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsAnnouncementImages;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function saveFile($file, $process)
    {
        $extension = $file->getClientOriginalExtension();
        $cur = Str::uuid();
        $fileName = $process . '-' . $cur . '.' . $extension;
        $basePath = public_path('\\Image\\');
        if (env('APP_ENV') == 'prod') {
            $basePath = public_path('/Image/');
        }
        if (!is_dir($basePath)) {
            mkdir($basePath, 0755, true);
        }
        if (env('APP_ENV') == 'prod') {
            $destinationPath = public_path('/Image');
        } else {
            $destinationPath = public_path('\\Image');
        }

        $file->move($destinationPath, $fileName);

        return '/Image/' . $fileName;
    }
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

    // public function createNews(Request $request)
    // {

    //     try {
    //         $validator = Validator::make($request->all(), [
    //             'images' => 'nullable',
    //             'images.*' => 'image|mimes:jpg,png,jpeg|max:2048',
    //             'title' => 'nullable',
    //             'user_id' => 'nullable',
    //             'img_description' => 'nullable',
    //             'intro_para' => 'nullable',
    //             'conclusion' => 'nullable',
    //             'body_para' => 'nullable',
    //             'short_title' => 'nullable'
    //         ]);
    //         if ($validator->fails()) {
    //             return $this->sendError('Validation Error.', $validator->errors());
    //         }
    //         DB::beginTransaction();
    //         $uploadNews = new News();
    //         $uploadNews->user_id = Auth::user()->id;
    //         $uploadNews->title = $request->title;
    //         $uploadNews->intro_para = $request->intro_para;
    //         $uploadNews->body_para = $request->body_para;
    //         $uploadNews->conclusion = $request->conclusion;
    //         $uploadNews->short_title = $request->short_title;
    //         $uploadNews->save();
            
    //         $images = $request->file('images');
    //         foreach ($images as $newsimage) {
    //             $uploadNewsImage = new NewsAnnouncementImages();
    //             $uploadNewsImage->news_id = $uploadNews->id;
    //             $uploadNewsImage->images = $this->saveFile($newsimage, 'NewsImage'); 
    //             $uploadNewsImage->save();
    //         }
    //         DB::commit();
    //         return $this->sendResponse($uploadNews->id, 'News uploaded successfully.', true);
    //     } catch (Exception $e) {
    //         DB::rollBack();
    //         return $this->sendError($e->getMessage(), $e->getTrace(), 500);
    //     }
    // }

    public function createNews(Request $request)
    {

        try {
            $validator = Validator::make($request->all(), [
                
                'images.*' => 'required|string', 
                'title' => 'nullable',
                'user_id' => 'nullable',
                'img_description' => 'nullable',
                'intro_para' => 'nullable',
                'conclusion' => 'nullable',
                'body_para' => 'nullable',
                'short_title' => 'nullable'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            DB::beginTransaction();
            $uploadNews = new News();
            $uploadNews->user_id = Auth::user()->id;
            $uploadNews->title = $request->title;
            $uploadNews->intro_para = $request->intro_para;
            $uploadNews->body_para = $request->body_para;
            $uploadNews->conclusion = $request->conclusion;
            $uploadNews->short_title = $request->short_title;
            $uploadNews->save();
            
            foreach ($request->images as $base64Image) {
                $uploadNewsImage = new NewsAnnouncementImages();
                $uploadNewsImage->news_id = $uploadNews->id;
                $uploadNewsImage->images = $this->storeBase64Image($base64Image, 'NewsImage');
                $uploadNewsImage->save();
            }
            DB::commit();
            return $this->sendResponse($uploadNews->id, 'News uploaded successfully.', true);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
    public function updateNews(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:news,id'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            DB::beginTransaction();
            $updateNews = News::query()->where('id', $request->id)->first();
           if ($request->filled('user_id')) {
                $updateNews->user_id = $request->user_id;
            }
            if ($request->filled('title')) {
                $updateNews->title = $request->title;
            }
            if ($request->filled('intro_para')) {
                $updateNews->intro_para = $request->intro_para;
            }
            if ($request->filled('body_para')) {
                $updateNews->body_para = $request->body_para;
            }
            if ($request->filled('short_title')) {
                $updateNews->short_title = $request->short_title;
            }
            if ($request->filled('short_title')) {
                $updateNews->short_title = $request->short_title;
            }
            $updateNews->save();
            $updateNews->newsAnnouncementImages()->delete();
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $uploadNewsImage = new NewsAnnouncementImages();
                    $uploadNewsImage->news_id = $updateNews->id;
                    $uploadNewsImage->images = $this->saveFile($image, 'NewsImage');
                    $uploadNewsImage->save();
                }
            }
            DB::commit();
            return $this->sendResponse($updateNews, 'News updated successfully.', true);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }

    public function getAllNews(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'pageNo' => 'numeric',
                'limit' => 'numeric',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors(), 400);
            }
            $query = News::query();
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
                $response['News'] = $data;
                return $this->sendResponse($response, 'Data fetched successfully.', true);
            } else {
                return $this->sendError("No data found.");
            }
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
    public function deleteNews(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:news,id'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $deletenews = News::query()->where('id', $request->id)->first();
            $deletenews->delete();

            return $this->sendResponse($deletenews, 'News deleted successfully.', true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
    public function getNewsById(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:news,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError("Validation failed.", $validator->errors());
            }
            $News = News::query()->where('id', $request->id)->first();
            if (!$News) {
                return $this->sendError('No data available.');
            }
            return $this->sendResponse($News, "News fetched successfully.", true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
}
