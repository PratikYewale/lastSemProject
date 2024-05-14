<?php

namespace App\Http\Controllers\v1\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventImage;
use Illuminate\Support\Facades\DB;
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

        return "/uploads/$fileName/" . $newFileName;
    }
    public function createEvent(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'start_date' => 'date',
                'end_date' => 'date',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            DB::beginTransaction();
            $addEvent = new Event();
            $addEvent->title = $request->title;
            if ($request->hasFile('file')) {
                $addEvent->file = $this->saveFile($request->file, 'EventFile');
            }
            $addEvent->description = $request->description;
            $addEvent->address = $request->address;
            $addEvent->start_date = $request->start_date;
            $addEvent->end_date = $request->end_date;
            $addEvent->save();
            if ($request->has("images")) {
                foreach ($request->images as $image) {
                    $newImages = new EventImage();
                    $newImages->event_id = $addEvent->id;
                    $newImages->image = $image;
                    $newImages->save();
                }
            }
            DB::commit();
            return $this->sendResponse($addEvent->id, 'Event uploaded successfully.', true);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
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
            DB::beginTransaction();
            $updateEvent = Event::query()->where('id', $request->id)->first();
            if ($request->filled('title')) {
                $updateEvent->title = $request->title;
            }
            if ($request->hasFile('file')) {
                $updateEvent->file = $this->saveFile($request->file, 'EventFile');
            }
            if ($request->filled('start_date')) {
                $updateEvent->start_date = $request->start_date;
            }
            if ($request->filled('end_date')) {
                $updateEvent->end_date = $request->end_date;
            }
            if ($request->filled('description')) {
                $updateEvent->description = $request->description;
            }
            if ($request->filled('address')) {
                $updateEvent->address = $request->address;
            }
            $updateEvent->save();
            if ($request->has("images")) {
                $updateEvent->eventImages()->delete();
                foreach ($request->images as $image) {
                    $newImages = new EventImage();
                    $newImages->event_id = $updateEvent->id;
                    $newImages->image = $image;
                    $newImages->save();
                }
            }
            DB::commit();
            return $this->sendResponse($updateEvent->id, 'Event Updated Successfully.', true);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
    public function getAllEvents(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'pageNo' => 'numeric',
                'limit' => 'numeric',
                'start_date' => 'nullable|date_format:Y-m-d',

            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors(), 400);
            }
            $query = Event::query()->with('eventImages');
            if ($request->has('start_date')) {
                $query->whereDate('start_date', '=', $request->start_date);
            }
            if ($request->has('end_date')) {
                $query->whereDate('end_date', '=', $request->end_date);
            }
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
                $response['Events'] = $data;
                return $this->sendResponse($response, 'Data Fetched Successfully.', true);
            } else {
                return $this->sendError("No data available.");
            }
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
    public function getEventById(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:events,id',
            ]);

            if ($validator->fails()) {
                return $this->sendError("Validation failed", $validator->errors());
            }
            $Event = Event::query()->where('id', $request->id)->with('eventImages')->first();
            if (!$Event) {
                return $this->sendError('No data available.');
            }
            return $this->sendResponse($Event, "Event fetched successfully.", true);
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
            $deleteEvent->eventImages()->delete();
            $deleteEvent->delete();

            return $this->sendResponse($deleteEvent->id, 'Event deleted successfully.', true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
    
}
