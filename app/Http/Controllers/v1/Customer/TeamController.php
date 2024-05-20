<?php

namespace App\Http\Controllers\v1\Customer;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\TeamMember;
use App\Models\TeamProfiles;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
{
    public function getAllTeams(Request $request): JsonResponse
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
            $query = Team::query()->with(['teammembers']);

            if ($request->has('name')) {
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
                return $this->sendError('No data available.');
            }
            return $this->sendResponse(["count" => $count, "teams" => $data], 'Data fetched successfully.', true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
    public function getAllTeamMembers(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'pageNo' => 'nullable|numeric',
                'limit' => 'nullable|numeric',
                'team_id' => 'exists:teams,id',
                'team_profie' => 'exists:team_member,team_profile',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors(), 400);
            }
            $query = TeamMember::query()->with(['users']);
            if ($request->has('team_profile_id')) {
                $query->where('team_profile_id', $request->team_profile_id);
            }
            if ($request->has('team_id')) {
                $query->where('team_id', $request->team_id);
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
                return $this->sendError('No data available.');
            }
            
            return $this->sendResponse(["count" => $count, "data" => $data], 'Data fetched successfully.', true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
    public function getTeamById(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:teams,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $getTeam = Team::query()->where('id', $request->id)->with(['teammembers'])->first();
            if (empty($getTeam)) {
                return $this->sendError("No team found.");
            }
            return $this->sendResponse($getTeam, 'Data fetched successfully.', true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }
    public function getAllTeamProfiles(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'pageNo' => 'nullable|numeric',
                'limit' => 'nullable|numeric',
                'name' => 'nullable|string|max:255',
                'team_id' => 'required|exists:teams,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors(), 400);
            }
            $query = TeamProfiles::query()->with('users');

            if ($request->has('name')) {
                $query->where('name', 'like', '%' . $request->name . '%');
            }
            if ($request->has('team_id')) {
                $query->where('team_id', $request->team_id);
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
                return $this->sendError('No data available.');
            }
            return $this->sendResponse(["count" => $count, "teams" => $data], 'Data fetched successfully.', true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
    public function getTeamProfileById(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:team_profiles,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $getTeamProfile = TeamProfiles::query()->where('id', $request->id)->with('users')->first();

            if (empty($getTeamProfile)) {
                return $this->sendError("No team found.");
            }
            return $this->sendResponse($getTeamProfile, 'Data fetched successfully.', true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }
}
