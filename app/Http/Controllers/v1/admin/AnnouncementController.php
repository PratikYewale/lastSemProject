<?php

namespace App\Http\Controllers\v1\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Http\JsonResponse;
use App\Models\NewsAnnouncementImages;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Facades\Auth;

class AnnouncementController extends Controller
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

    public function createAnnouncement(Request $request)
    {

        try {
            $validator = Validator::make($request->all(), [
                'document' => 'nullable|mimes:pdf',
                'title' => 'nullable',
                'sub_title' => 'nullable',
                'intro_para' => 'nullable',
                'conclusion' => 'nullable',
                'body_para' => 'nullable'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            DB::beginTransaction();
            $uploadAnnouncement = new Announcement();
            if ($request->hasFile('document')) {
                $uploadAnnouncement->document = $this->saveFile($request->file('document'), 'AnnouncementDocument');
            }
            $userid = Auth::user()->id;
            $uploadAnnouncement->user_id = $userid;
            $uploadAnnouncement->title = $request->title;
            $uploadAnnouncement->sub_title = $request->sub_title;
            $uploadAnnouncement->intro_para = $request->intro_para;
            $uploadAnnouncement->body_para = $request->body_para;
            $uploadAnnouncement->conclusion = $request->conclusion;
            $uploadAnnouncement->save();
            $images = $request->file('images');
            foreach ($images as $newsimage) {
                $uploadAnnouncementImage = new NewsAnnouncementImages();
                $uploadAnnouncementImage->announcement_id = $uploadAnnouncement->id;
                $uploadAnnouncementImage->images = $this->saveFile($newsimage, 'NewsImage');
                $uploadAnnouncementImage->save();
            }
            DB::commit();
          return $this->sendResponse($uploadAnnouncement->id, 'Announcement uploaded successfully.', true);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
    public function updateAnnouncement(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:announcement,id'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            DB::beginTransaction();
            $updateAnnouncement = Announcement::query()->where('id', $request->id)->first();
            if ($request->hasFile('document')) {
                $updateAnnouncement->document = $this->saveFile($request->document, 'AnnouncementDocument');
            }
            if ($request->filled('user_id')) {
                $updateAnnouncement->user_id = $request->user_id;
            }
            if ($request->filled('title')) {
                $updateAnnouncement->title = $request->title;
            }
            if ($request->filled('intro_para')) {
                $updateAnnouncement->intro_para = $request->intro_para;
            }
            if ($request->filled('body_para')) {
                $updateAnnouncement->body_para = $request->body_para;
            }
            if ($request->filled('short_title')) {
                $updateAnnouncement->short_title = $request->short_title;
            }
            if ($request->filled('conclusion')) {
                $updateAnnouncement->conclusion = $request->conclusion;
            }
            $updateAnnouncement->save();
            $updateAnnouncement->AnnouncementImages()->delete();
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $uploadAnnouncementImage = new NewsAnnouncementImages();
                    $uploadAnnouncementImage->announcement_id = $updateAnnouncement->id;
                    $uploadAnnouncementImage->images = $this->saveFile($image, 'NewsImage');
                    $uploadAnnouncementImage->save();
                }
            }
            DB::commit();
            return $this->sendResponse($updateAnnouncement, 'Announcement updated successfully.', true);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
    public function getAllAnnouncement(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'pageNo' => 'numeric',
                'limit' => 'numeric',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors(), 400);
            }
            $query = Announcement::query()->with('user');
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
                $response['Announcement'] = $data;
                return $this->sendResponse($response, 'Data fetched successfully.', true);
            } else {
                return $this->sendError("No data found.");
            }
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }

    public function getAnnouncementById(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:announcement,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError("Validation failed.", $validator->errors());
            }
            $announcement = Announcement::query()->where('id', $request->id)->with('user')->first();
            if (!$announcement) {
                return $this->sendError('No data available.');
            }
            return $this->sendResponse($announcement, "Announcement fetched successfully.", true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }

    public function deleteAnnouncement(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:announcement,id'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $deleteAnnouncement = Announcement::query()->where('id', $request->id)->first();
            $deleteAnnouncement->delete();

            return $this->sendResponse($deleteAnnouncement, 'Announcement deleted successfully.', true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }

}
