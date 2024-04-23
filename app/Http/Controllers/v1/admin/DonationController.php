<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donor;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DonationController extends Controller
{
    public function getAllDonors(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'first_name' => 'string',
                'last_name' => 'string',
                'limit' => 'integer',
                'pageNo' => 'integer',
            ]);
            if ($validator->fails()) {
                return $this->sendError("Validation failed", $validator->errors());
            }
            $query = Donor::query()->with(['donations','honors']);
            if ($request->has('first_name')) {
                $query->where('name', 'like', '%' . $request->name . '%');
            }
            if ($request->has('last_name')) {
                $query->where('name', 'like', '%' . $request->name . '%');
            }
            $count = $query->count();
            if ($request->has('pageNo') && $request->has('limit')) {
                $limit = $request->limit;
                $pageNo = $request->pageNo;
                $skip = $limit * $pageNo;
                $query->skip($skip)->limit($limit);
            }
            $data = $query->orderBy('id', 'DESC')->get();
            if (count($data) <= 0) {
                return $this->sendResponse([], "No data found", false);
            }
            return $this->sendResponse(['count' => $count, 'data' => $data], "Donors fetched successfully.", true);
        } catch (Exception $e) {
            return $this->sendError("Something went wrong", $e->getMessage(), 500);
        }
    }
}
