<?php

namespace App\Http\Controllers\v1\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Membership;
use App\Models\MembershipHistory;
use Illuminate\Validation\Rule;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Exception;
use Carbon\Carbon;


class MembershipController extends Controller
{
    public function createMembership(Request $request): JsonResponse
    {

        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'description' => 'nullable',
                'type' => [Rule::in(['yearly', 'monthly'])],
                'mrp' => 'nullable',
                'selling_price' => 'nullable',
                'is_active' => 'nullable',
                'discount' => 'nullable',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            DB::beginTransaction();
            $addMembership = new Membership();
            $addMembership->name = $request->name;
            $addMembership->description = $request->description ?? null;
            $addMembership->type = $request->type;
            $addMembership->mrp = $request->mrp ?? 0;
            $addMembership->selling_price = $request->selling_price;
            $addMembership->discount = $addMembership->mrp > $request->selling_price ? $addMembership->mrp - $addMembership->selling_price : 0;
            $addMembership->is_active = true;
            $addMembership->save();
            DB::commit();
            return $this->sendResponse($addMembership, 'Membership uploaded successfully.', true);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }

    public function updateMembership(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:membership,id'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            DB::beginTransaction();
            $updateMembership = Membership::query()->where('id', $request->id)->first();
            if ($request->filled('name')) {
                $updateMembership->name = $request->name;
            }
            if ($request->filled('description')) {
                $updateMembership->description = $request->description;
            }
            if ($request->filled('type')) {
                $updateMembership->type = $request->type;
            }
            if ($request->filled('mrp')) {
                $updateMembership->mrp = $request->mrp;
            }
            if ($request->filled('selling_price')) {
                $updateMembership->selling_price = $request->selling_price;
            }
            if ($request->filled('is_active')) {
                $updateMembership->is_active = $request->is_active;
            }
            $updateMembership->save();
            DB::commit();
            return $this->sendResponse($updateMembership, 'Membership updated successfully.', true);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }

    public function getAllMemberships(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'pageNo' => 'numeric',
                'limit' => 'numeric',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors(), 400);
            }
            $query = Membership::query();
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
                $response['Membership'] = $data;
                return $this->sendResponse($response, 'Data fetched successfully.', true);
            } else {
                return $this->sendError("No data available");
            }
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
    public function deletemembership(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:membership,id'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $deleteMembership = Membership::query()->where('id', $request->id)->first();
            $deleteMembership->delete();

            return $this->sendResponse($deleteMembership, 'Membership deleted successfully.', true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }

    public function getMembershipById(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:membership,id'
            ]);

            if ($validator->fails()) {
                return $this->sendError("Validation failed.", $validator->errors());
            }
            $Membership = Membership::query()->where('id', $request->id)->with('history')->first();
            if (!$Membership) {
                return $this->sendError('No data available.');
            }
            return $this->sendResponse($Membership, "Membership fetched successfully.", true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }

    public function getAllMembershipPayment(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'pageNo' => 'numeric',
                'limit' => 'numeric',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors(), 400);
            }
            $query = MembershipHistory::query()->with('member');
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
                $response['membership_payment'] = $data;
                return $this->sendResponse($response, 'Data fetched successfully.', true);
            } else {
                return $this->sendError("No data available.");
            }
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
}
