<?php

namespace App\Http\Controllers\v1\Customer;
use App\Http\Controllers\Controller;

use Exception;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
    public function getAllCountry(Request $request): JsonResponse
{
    try {
        $validator = Validator::make($request->all(), [
            'limit' => 'nullable|integer',
            'pageNo' => 'nullable|integer',

        ]);

        if ($validator->fails()) {
            return $this->sendError("Validation failed", $validator->errors());
        }

        $query = Country::query();

        $count = $query->count();

        if ($request->has('limit') && $request->has('pageNo')) {
            $limit = $request->limit;
            $pageNo = $request->pageNo;
            $skip = $limit * ($pageNo - 1);
            $query->limit($limit)->skip($skip);
        }
        $data = $query->orderBy('name', 'ASC')->get();
        if ($data->isEmpty()) {
            return $this->sendResponse([], "No data found", false);
        }
        return $this->sendResponse(["state" => $data, "count" => $count], "Data fetched successfully", true);
    } catch (Exception $e) {
        return $this->sendError("Something went wrong", $e->getMessage(), 500);
    }
}
public function getAllState(Request $request): JsonResponse{
    try {
        $validator = Validator::make($request->all(), [
            'limit' => 'nullable|integer',
            'pageNo' => 'nullable|integer',
            'country_id'=>'nullable|integer|exists:countries,id'
        ]);

        if ($validator->fails()) {
            return $this->sendError("Validation failed", $validator->errors());
        }

        $query = State::query();
        if ($request->has('country_id')) {
            $query->where('country_id', $request->country_id);
        }

        $count = $query->count();

        if ($request->has('limit') && $request->has('pageNo')) {
            $limit = $request->limit;
            $pageNo = $request->pageNo;
            $skip = $limit * ($pageNo - 1);
            $query->limit($limit)->skip($skip);
        }

        $data = $query->orderBy('name', 'ASC')->get();

        if ($data->isEmpty()) {
            return $this->sendResponse([], "No data found", false);
        }

        return $this->sendResponse(["state" => $data, "count" => $count], "Data fetched successfully", true);
    } catch (Exception $e) {
        return $this->sendError("Something went wrong", $e->getMessage(), 500);
    }
}
public function getAllCity(Request $request): JsonResponse
{
    try {
        $validator = Validator::make($request->all(), [
            'limit' => 'nullable|integer',
            'pageNo' => 'nullable|integer',
            'state_id'=>'nullable|integer|exists:states,id'
        ]);

        if ($validator->fails()) {
            return $this->sendError("Validation failed", $validator->errors());
        }

        $query = City::query();
        if ($request->has('state_id')) {
            $query->where('state_id', $request->state_id);
        }
        $count = $query->count();

        if ($request->has('limit') && $request->has('pageNo')) {
            $limit = $request->limit;
            $pageNo = $request->pageNo;
            $skip = $limit * ($pageNo - 1);
            $query->limit($limit)->skip($skip);
        }

        $data = $query->orderBy('name', 'ASC')->get();

        if ($data->isEmpty()) {
            return $this->sendResponse([], "No data found", false);
        }

        return $this->sendResponse(["city" => $data, "count" => $count], "Data fetched successfully", true);
    } catch (Exception $e) {
        return $this->sendError("Something went wrong", $e->getMessage(), 500);
    }
}



}
