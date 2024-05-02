<?php

namespace App\Http\Controllers\v1\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Facades\Auth;

class AnnouncementController extends Controller
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

    public function createAnnouncement(Request $request)
    {

        try {
            $validator = Validator::make($request->all(), [
                'primary_img' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
                'secondary_img' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
                'document'=>'nullable|mimes:pdf',
                'title' => 'nullable',
                'sub_title'=>'nullable',
                'intro_para' => 'nullable',
                'conclusion' => 'nullable',
                'body_para' => 'nullable'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $uploadAnnouncement = new Announcement();
            if ($request->hasFile('primary_img')) {
                $uploadAnnouncement->primary_img = $this->saveFile($request->file('primary_img'), 'AnnouncementPrimaryImage');
            }
            if ($request->hasFile('secondary_img')) {
                $uploadAnnouncement->secondary_img = $this->saveFile($request->file('secondary_img'), 'AnnouncementSecondaryImage');
            }
            if ($request->hasFile('document')) {
                $uploadAnnouncement->document = $this->saveFile($request->file('document'), 'AnnouncementDocument');
            }
            $userid = Auth::user()->id;
            $uploadAnnouncement->user_id = $userid;
            $uploadAnnouncement->title = $request->title;
            $uploadAnnouncement->sub_title=$request->sub_title;
            $uploadAnnouncement->intro_para = $request->intro_para;
            $uploadAnnouncement->body_para = $request->body_para;
            $uploadAnnouncement->conclusion = $request->conclusion;
          
            $uploadAnnouncement->save();

            return $this->sendResponse($uploadAnnouncement->id, 'Announcement uploaded successfully.', true);
        } catch (Exception $e) {
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

            $updateAnnouncement = Announcement::query()->where('id', $request->id)->first();
            if ($request->hasFile('primary_img')) {
                $updateAnnouncement->primary_img = $this->saveFile($request->primary_img, 'AnnouncementPrimaryImage');
            }
            if ($request->hasFile('secondary_img')) {
                $updateAnnouncement->secondary_img = $this->saveFile($request->secondary_img, 'AnnouncementSecondaryImage');
            }
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
            return $this->sendResponse($updateAnnouncement, 'Announcement updated successfully.', true);
        } catch (Exception $e) {
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
            $announcement= Announcement::query()->where('id', $request->id)->with('user')->first();
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
