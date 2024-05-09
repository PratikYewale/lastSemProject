<?php

namespace App\Http\Controllers\v1\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function getEventById(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:events,id',
            ]);

            if ($validator->fails()) {
                return $this->sendError("Validation failed", $validator->errors());
            }
            $Event = Event::query()->where('id', $request->id)->first();
            if (!$Event) {
                return $this->sendError('No data available.');
            }
            return $this->sendResponse($Event, "Event fetched successfully.", true);
        } catch (Exception $e) {
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
            $query = Event::query();
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
}