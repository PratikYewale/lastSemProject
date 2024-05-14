<?php

namespace App\Http\Controllers\v1\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsAnnouncementImages;
use App\Models\NewsImage;
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

        return "/uploads/$fileName/" . $newFileName;
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
                'images' => 'array',
                'title' => 'nullable',
                'user_id' => 'nullable',
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
            $uploadNews->type = $request->type;
            $uploadNews->intro_para = $request->intro_para;
            $uploadNews->body_para = $request->body_para;
            $uploadNews->conclusion = $request->conclusion;
            $uploadNews->short_title = $request->short_title;
            $uploadNews->date = $request->date;
            $uploadNews->file = $this->saveFile($request->file, 'file');;
            $uploadNews->primary_img = $this->saveFile($request->primary_img, 'primary_img');;
            $uploadNews->save();
            if($request->has("news_images"))
            {
                foreach($request->images as $image)
                {
                $newImages = new NewsImage();
                $newImages->news_id = $uploadNews->id;
                $newImages->image = $image;
                }
            }
            DB::commit();
            return $this->sendResponse($uploadNews->id, 'Data uploaded successfully.', true);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError("Something went wrong.",$e->getMessage(), 500);
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
