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
    public function addMediaGallery(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'medias' => 'required|array',
            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            DB::beginTransaction();

            foreach ($request->medias as $media) {
                $newmedia = new MediaGallery();
                $newmedia->user_id = Auth::user()->id;
                $newmedia->media_type = 'photo';
                $newmedia->media = $media;
                $newmedia->save();
            }

            DB::commit();

            return $this->sendResponse([], 'Media added to gallery successfully.');
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

            return $this->sendResponse($deleteMediaGallery, 'Media in the gallery deleted successfully.', true);
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
