<?php

namespace App\Http\Controllers\v1\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\File;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Exception;

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

        return "/$fileName/" . $newFileName;
    }

    public function createNews(Request $request): JsonResponse
    {

        try{
            $validator = Validator::make($request->all(), [
                'primary_img' => 'required|image|mimes:png,jpg,jpeg|max:2048',
                'secondary_img' => 'required|image|mimes:png,jpg,jpeg|max:2048',
                'title'=>'nullable',
                'user_id'=>'nullable',
                'img_description'=>'nullable',
                'intro_para'=>'nullable',
                'conclusion'=>'nullable',
                'body_para'=>'nullable'
        

            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $uploadNews = new News();
           if ($request->hasFile('primary_img')) {
                $uploadNews->primary_img = $this->saveFile($request->file('primary_img'), 'NewsPrimaryImage');
            }
            if ($request->hasFile('secondary_img')) {
                $uploadNews->secondary_img = $this->saveFile($request->file('secondary_img'), 'NewsSecondaryImage');
            }
            $uploadNews->user_id = $request->user_id;
            $uploadNews->title = $request->title;
            $uploadNews->img_description=$request->img_description;
            $uploadNews->intro_para=$request->intro_para;
            $uploadNews->body_para=$request->body_para;
            $uploadNews->conclusion=$request->conclusion;

                $uploadNews->save();

                return $this->sendResponse($uploadNews->id,'News uploaded successfully',true);

            }

        catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }

    public function updateNews(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $updateNews = News::query()->where('id', $request->id)->first();
            if ($request->hasFile('primary_img')) {
                $updateNews->primary_img = $this->saveFile($request->primary_img, 'NewsPrimaryImage');
            }
            if ($request->hasFile('secondary_img')) {
                $updateNews->secondary_img = $this->saveFile($request->secondary_img, 'NewsSecondaryImage');
            }
            if ($request->filled('user_id')) {
                $updateNews->user_id= $request->user_id;
            }
            if ($request->filled('title')) {
                $updateNews->title= $request->title;
            }
            if ($request->filled('img_description')) {
                $updateNews->img_description= $request->img_description;
            }
            if ($request->filled('intro_para')) {
                $updateNews->intro_para= $request->intro_para;
            }
            if ($request->filled('body_para')) {
                $updateNews->body_para= $request->body_para;
            }
            if ($request->filled('conclusion')) {
                $updateNews->conclusion= $request->conclusion;
            }
            
            
            $updateNews->save();
            return $this->sendResponse($updateNews, 'News Updated Successfully', true);

        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
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
                $response['News'] = $data;
                $response['count'] = $count;
                return $this->sendResponse($response, 'Data Fetched Successfully', true);
            } else {
                return $this->sendResponse('No Data Available', [], false);
            }
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }

    public function deleteNews(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:news,id'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $deleteFaq = News::query()->where('id', $request->id)->first();
            $deleteFaq->delete();

            return $this->sendResponse($deleteFaq, 'News Deleted Successfully', true);


        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }

    public function getNewsById(Request $request): JsonResponse
    {
        try{
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer',
            ]);

            if ($validator->fails()) {
                return $this->sendError("Validation failed", $validator->errors());
            }
            $News = News::query()->where('id',$request->id)->first();

            return $this->sendResponse($News, "News fetched successfully", true);
        }catch(Exception $e){
            return $this->sendError('Something went wrong',$e->getMessage(),500);
        }
    }
    }

