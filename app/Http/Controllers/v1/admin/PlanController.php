<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PlanController extends Controller
{
    public function createPlan(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'type' => 'nullable',
                'description' => 'nullable',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            DB::beginTransaction();
            $addPlan = new Plan;
            $addPlan->type = $request->type;
            $addPlan->name = $request->name;
            $addPlan->description = $request->description;
            $addPlan->amount = $request->amount;
            $addPlan->status=true;
            $addPlan->save();
            DB::commit();
            return $this->sendResponse($addPlan, 'Plan saved successfully.', true);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }

    public function updatePlan(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:plans,id'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            DB::beginTransaction();
           $updateplan = Plan::query()->where('id', $request->id)->first();
            if ($request->filled('name')) {
                $updateplan->name = $request->name;
            }
            if ($request->filled('description')) {
                $updateplan->description = $request->description;
            }
            if ($request->filled('type')) {
                $updateplan->type = $request->type;
            }
            if ($request->filled('amount')) {
                $updateplan->amount = $request->amount;
            }
            if ($request->filled('status')) {
                $updateplan->status = $request->status;
            }
            $updateplan->save();
            DB::commit();
            return $this->sendResponse($updateplan, 'Plan updated successfully.', true);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }

    public function deletePlan(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:plans,id'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $deletePlan = Plan::query()->where('id', $request->id)->first();
            $deletePlan->delete();

            return $this->sendResponse($deletePlan, 'Plan deleted successfully.', true);
        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }

    public function getAllPlan(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'pageNo' => 'numeric',
                'limit' => 'numeric',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors(), 400);
            }
            $query = Plan::query();
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
                $response['Club'] = $data;
                return $this->sendResponse($response, 'Data fetched successfully.', true);
            } else {
                return $this->sendError('No Data Available.');
            }
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
    public function getPlanById(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:plans,id'
            ]);

            if ($validator->fails()) {
                return $this->sendError("Validation failed", $validator->errors());
            }
            $plan = Plan::query()->where('id', $request->id)->first();
            if (!$plan) {
                return $this->sendError('No data available.');
            }
            return $this->sendResponse($plan, "Plan fetched successfully.", true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
}
