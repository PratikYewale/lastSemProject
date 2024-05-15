<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Controllers\Controller;
use App\Models\Association;
use App\Models\Athlete;
use App\Models\Member;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{
    public function getAllMembers(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'pageNo' => 'nullable|numeric',
                'limit' => 'nullable|numeric',
                'name' => 'nullable|string|max:255',
            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors(), 400);
            }

            $query = Member::query()->with(['user']);
            if ($request->has('is_athlete')) {
                if ($request->is_athlete == true) {
                    $query->where('is_athlete', true);
                }
                if ($request->is_athlete == false) {
                    $query->where('is_athlete', false);
                }
            }
            if ($request->has('is_featured')) {
                if ($request->is_featured == true) {
                    $query->where('is_featured', true)->where('is_athlete', true);
                }
                if ($request->is_featured == false) {
                    $query->where('is_featured', false)->where('is_athlete', true);
                }
            }
            $count = $query->count();

            if ($request->has('pageNo') && $request->has('limit')) {
                $limit = $request->limit;
                $pageNo = $request->pageNo;
                $skip = $limit * $pageNo;
                $query->skip($skip)->limit($limit);
            }

            $members = $query->orderBy('id', 'DESC')->get()->toArray();

            foreach ($members as &$member) {
                $member['achievements'] = is_string($member['achievements']) ? json_decode($member['achievements'], true) : $member['achievements'];
                $member['schools'] = is_string($member['schools']) ? json_decode($member['schools'], true) : $member['schools'];
                $member['links'] = is_string($member['links']) ? json_decode($member['links'], true) : $member['links'];
            }

            if (count($members) <= 0) {
                return $this->sendError('No data available.');
            }

            return $this->sendResponse(["count" => $count, "data" => $members], 'Data Fetched Successfully.', true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
    public function getMemberById(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|exists:members,id',
            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors(), 400);
            }

            $query = Member::query()->where('id', $request->id)->with('user')->first();

            return $this->sendResponse($query, 'Data fetched successfully.', true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
    public function getAllAthletes(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'pageNo' => 'numeric',
                'limit' => 'numeric',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors(), 400);
            }
            $query = User::query()->with(['achievements','sport_certificates'])->where('role', 'athlete');
            $count = $query->count();
            if ($request->has('pageNo') && $request->has('limit')) {
                $limit = $request->limit;
                $pageNo = $request->pageNo;
                $skip = $limit * $pageNo;
                $query = $query->skip($skip)->limit($limit);
            }
            $data = $query->orderBy('id', 'DESC')->get();
            if (count($data) > 0) {
                $response['Athlete'] = $data;
                $response['count'] = $count;
                return $this->sendResponse($response, 'Athlete fetched successfully.', true);
            } else {
                return $this->sendError("No data found.");
            }
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }

    public function getAllAssociation(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'pageNo' => 'numeric',
                'limit' => 'numeric',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors(), 400);
            }
            $query = User::query()->where('role','member');
            $count = $query->count();
            if ($request->has('pageNo') && $request->has('limit')) {
                $limit = $request->limit;
                $pageNo = $request->pageNo;
                $skip = $limit * $pageNo;
                $query = $query->skip($skip)->limit($limit);
            }
            $data = $query->orderBy('id', 'DESC')->get();
            if (count($data) > 0) {
                $response['Association'] = $data;
                $response['count'] = $count;
                return $this->sendResponse($response, 'Association fetched successfully.', true);
            } else {
                return $this->sendError("No data found.");
            }
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
    
}
