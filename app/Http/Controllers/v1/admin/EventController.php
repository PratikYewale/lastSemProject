<?php

namespace App\Http\Controllers\v1\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\File;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Exception;

class EventController extends Controller
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


    public function createEvent(Request $request): JsonResponse
    {

        try{
            $validator = Validator::make($request->all(), [
                'program_id'=>'nullable|exists:programs,id',
                'team_id'=>'nullable|exists:teams,id',
                'title'=>'required',
                'primary_img' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
                'secondary_img' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
                'intro_para'=>'nullable',
                "body_para"=>'nullable',
                'conclusion'=>'nullable',
                'start_date'=>'nullable',
                'end_date'=>'nullable',
                'is_competition'=>'nullable'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $addEvent = new Event();
            $addEvent->program_id = $request->program_id;
            $addEvent->team_id=$request->team_id;
            $addEvent->title=$request->title;
           if ($request->hasFile('primary_img')) {
                $addEvent->primary_img = $this->saveFile($request->file('primary_img'), 'EventPrimaryImage');
            }
            if ($request->hasFile('secondary_img')) {
                $addEvent->secondary_img = $this->saveFile($request->file('secondary_img'), 'EventSecondaryImage');
            }
            $addEvent->intro_para = $request->intro_para;
            $addEvent->body_para=$request->body_para;
            $addEvent->conclusion=$request->conclusion;
            $addEvent->start_date=$request->start_date;
            $addEvent->end_date=$request->end_date;
            $addEvent->is_competition=$request->is_competition;
            $addEvent->save();

                return $this->sendResponse($addEvent,'Event uploaded successfully',true);

            }

        catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }


    public function updateEvent(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:events,id'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $updateEvent = Event::query()->where('id', $request->id)->first();
            if ($request->filled('program_id')) {
                $updateEvent->program_id= $request->program_id;
            }
            if ($request->filled('team_id')) {
                $updateEvent->team_id= $request->team_id;
            }
            if ($request->filled('title')) {
                $updateEvent->title= $request->title;
            }
            if ($request->hasFile('primary_img')) {
                $updateEvent->primary_img = $this->saveFile($request->primary_img, 'EventPrimaryImage');
            }
            if ($request->hasFile('secondary_img')) {
                $updateEvent->secondary_img = $this->saveFile($request->secondary_img, 'EventSecondaryImage');
            }
           if ($request->filled('intro_para')) {
                $updateEvent->intro_para= $request->intro_para;
            }
            if ($request->filled('body_para')) {
                $updateEvent->body_para= $request->body_para;
            }
            if ($request->filled('start_date')) {
                $updateEvent->start_date= $request->start_date;
            }
            if ($request->filled('end_date')) {
                $updateEvent->end_date= $request->end_date;
            }
            if ($request->filled('conclusion')) {
                $updateEvent->conclusion= $request->conclusion;
            }
            
            
            $updateEvent->save();
            return $this->sendResponse($updateEvent, 'Event Updated Successfully', true);

        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }

    public function getAllEvents(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'pageNo' => 'numeric',
                'limit' => 'numeric',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors(), 400);
            }
            $query = Event::query();
            $count = $query->count();
            if ($request->has('pageNo') && $request->has('limit')) {
                $limit = $request->limit;
                $pageNo = $request->pageNo;
                $skip = $limit * $pageNo;
                $query = $query->skip($skip)->limit($limit);
            }
            $data = $query->orderBy('id', 'DESC')->get();
            if (count($data) > 0) {
                $response['Events'] = $data;
                $response['count'] = $count;
                return $this->sendResponse($response, 'Data Fetched Successfully', true);
            } else {
                return $this->sendResponse('No Data Available', [], false);
            }
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }


    public function deleteEvent(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:events,id'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $deleteEvent = Event::query()->where('id', $request->id)->first();
            $deleteEvent->delete();

            return $this->sendResponse($deleteEvent, 'Events Deleted Successfully', true);


        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }

    public function getEventById(Request $request): JsonResponse
    {
        try{
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:events,id',
            ]);

            if ($validator->fails()) {
                return $this->sendError("Validation failed", $validator->errors());
            }
            $Event = Event::query()->where('id',$request->id)->first();

            return $this->sendResponse($Event, "Event fetched successfully", true);
        }catch(Exception $e){
            return $this->sendError('Something went wrong',$e->getMessage(),500);
        }
    }
}
