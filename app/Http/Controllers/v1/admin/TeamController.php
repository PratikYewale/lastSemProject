<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\TeamMember;
use App\Models\TeamProfiles;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class TeamController extends Controller
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
    public function addTeam(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'description' => 'required',
                'primary_img' => 'required|mimes:jpg,jpeg,png|max:2048',
                'secondary_img' => 'mimes:jpg,jpeg,png|max:2048',
                'primary_video' => 'mimes:mp4,mkv|max:4046',
                'intro_para' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            DB::beginTransaction();
            $newTeam = new Team();
            $newTeam->name = $request->name;
            $newTeam->description = $request->description;
            $newTeam->links = $request->links;
            $newTeam->quote = $request->quote;
            $newTeam->intro_para = $request->intro_para;
            $newTeam->body_para = $request->body_para;
            $newTeam->conclusion = $request->conclusion;
            if ($request->primary_img) {
                $newTeam->primary_img = $this->saveFile($request->primary_img, 'TeamsPrimaryImages');
            }
            if ($request->secondary_img) {
                $newTeam->secondary_img = $this->saveFile($request->secondary_img, 'TeamsSecondaryImages');
            }
            if ($request->primary_video) {
                $newTeam->primary_video = $this->saveFile($request->primary_video, 'TeamsPrimaryVideos');
            }
            $newTeam->save();
            DB::commit();
            return $this->sendResponse($newTeam, 'Team added successfully.', true);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }
    public function updateTeam(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:teams,id',
                'name' => 'string|max:255',
                'primary_img' => 'mimes:jpg,jpeg,png|max:2048',
                'secondary_img' => 'mimes:jpg,jpeg,png|max:2048',
                'primary_video' => 'mimes:mp4,mkv|max:4046',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            DB::beginTransaction();
            $updateTeam = Team::query()->where('id', $request->id)->first();
            if (!$updateTeam) {
                return $this->sendError("No team found.");
            }
            if ($request->has('name')) {
                $updateTeam->name = $request->name;
            }
            if ($request->has('description')) {
                $updateTeam->description = $request->description;
            }
            if ($request->has('links')) {
                $updateTeam->links = $request->links;
            }
            if ($request->has('quote')) {
                $updateTeam->quote = $request->quote;
            }
            if ($request->has('intro_para')) {
                $updateTeam->intro_para = $request->intro_para;
            }
            if ($request->has('body_para')) {
                $updateTeam->body_para = $request->body_para;
            }
            if ($request->has('conclusion')) {
                $updateTeam->conclusion = $request->conclusion;
            }
            if ($request->hasFile('primary_img')) {
                $updateTeam->primary_img = $this->saveFile($request->primary_img, 'TeamsPrimaryImages');
            }
            if ($request->hasFile('secondary_img')) {
                $updateTeam->secondary_img = $this->saveFile($request->secondary_img, 'TeamsSecondaryImages');
            }
            if ($request->hasFile('primary_video')) {
                $updateTeam->primary_video = $this->saveFile($request->primary_video, 'TeamsPrimaryVideos');
            }
            $updateTeam->save();
            DB::commit();
            return $this->sendResponse($updateTeam, 'Team updated successfully.');
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }
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
            $query = Team::query();

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
            foreach ($data as &$member) {
                $member['links'] = is_string($member['links']) ? json_decode($member['links'], true) : $member['links'];
            }
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
            $getTeam = Team::query()->where('id', $request->id)->with(['teamprofiles'])->first();
            $getTeam['links'] = is_string($getTeam['links']) ? json_decode($getTeam['links'], true) : $getTeam['links'];

            if (empty($getTeam)) {
                return $this->sendError("No team found.");
            }

            return $this->sendResponse($getTeam, 'Data fetched successfully.', true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }
    public function deleteTeamById(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:teams,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            DB::beginTransaction();
            $team = Team::query()->where('id', $request->id)->first();
            $teamProfiles = $team->teamprofiles()->get();
            foreach ($teamProfiles as $teamProfile) {
                $teamProfile->delete();
            }
            $team->delete();
            DB::commit();
            return $this->sendResponse($team->id, 'Team and associated profile deleted successfully.', true);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }

    // Team Profiles
    public function addTeamProfile(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'team_id' => 'required|integer|exists:teams,id',
            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            DB::beginTransaction();
            $newTeamProfile = new TeamProfiles();
            $newTeamProfile->team_id = $request->team_id;
            $newTeamProfile->name = $request->name;
            $newTeamProfile->description = $request->description;
            $newTeamProfile->save();
            DB::commit();
            return $this->sendResponse($newTeamProfile, 'Team profile added successfully.', true);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }
    public function updateTeamProfile(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:team_profiles,id',
                'team_id' => 'required|integer|exists:teams,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            DB::beginTransaction();
            $updateTeamProfile = TeamProfiles::query()->where('id', $request->id)->first();
            if (!$updateTeamProfile) {
                return $this->sendError("No team found.");
            }
            if ($request->has('name')) {
                $updateTeamProfile->name = $request->name;
            }
            if ($request->has('description')) {
                $updateTeamProfile->description = $request->description;
            }
            if ($request->has('team_id')) {
                $updateTeamProfile->team_id = $request->team_id;
            }
            $updateTeamProfile->save();
            DB::commit();
            return $this->sendResponse($updateTeamProfile, 'Team profile updated successfully.');
        } catch (Exception $e) {
            DB::rollBack();
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
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors(), 400);
            }
            $query = TeamProfiles::query();

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
            return $this->sendResponse(["count" => $count, "data" => $data], 'Data fetched successfully.', true);
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
            $getTeamProfile = TeamProfiles::query()->where('id', $request->id)->first();

            if (empty($getTeamProfile)) {
                return $this->sendError("No team found.");
            }
            return $this->sendResponse($getTeamProfile, 'Data fetched successfully.', true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }
    public function deleteTeamProfileById(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:team_profiles,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            DB::beginTransaction();
            $teamProfile = TeamProfiles::query()->where('id', $request->id)->first();
            $teamProfile->delete();
            DB::commit();
            return $this->sendResponse($teamProfile->id, 'Team profile deleted successfully.', true);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }

    // Team Member
    public function addTeamMember(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'team_id' => 'required|integer|exists:teams,id',
                'team_profile_id' => 'required|integer|exists:team_profiles,id',
                'member_id' => 'required|integer|exists:members,id',
            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            DB::beginTransaction();
            $newTeamMember = new TeamMember();
            $newTeamMember->team_id = $request->team_id;
            $newTeamMember->team_profile_id = $request->team_profile_id;
            $newTeamMember->member_id = $request->member_id;
            $newTeamMember->save();
            DB::commit();
            return $this->sendResponse($newTeamMember, 'Team member added successfully.', true);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }
    public function updateTeamMember(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:team_member,id',
                'team_id' => 'required|integer|exists:teams,id',
                'team_profile_id' => 'required|integer|exists:team_profiles,id',
                'member_id' => 'required|integer|exists:members,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            DB::beginTransaction();
            $updateTeamMember = TeamMember::query()->where('id', $request->id)->first();
            if (!$updateTeamMember) {
                return $this->sendError("No team found.");
            }
            if ($request->has('team_id')) {
                $updateTeamMember->team_id = $request->team_id;
            }
            if ($request->has('team_profile_id')) {
                $updateTeamMember->team_profile_id = $request->team_profile_id;
            }
            if ($request->has('member_id')) {
                $updateTeamMember->member_id = $request->member_id;
            }
            $updateTeamMember->save();
            DB::commit();
            return $this->sendResponse($updateTeamMember, 'Team member updated successfully.');
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }
    public function getAllTeamMembers(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'pageNo' => 'nullable|numeric',
                'limit' => 'nullable|numeric',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors(), 400);
            }
            $query = TeamMember::query()->with(['team', 'teamprofiles', 'member']);

            $count = $query->count();
            if ($request->has('pageNo') && $request->has('limit')) {
                $limit = $request->limit;
                $pageNo = $request->pageNo;
                $skip = $limit * $pageNo;
                $query->skip($skip)->limit($limit);
            }
            $data = $query->orderBy('id', 'DESC')->get();
            foreach ($data as &$member) {
                $member['member']['achievements'] = is_string($member['member']['achievements']) ? json_decode($member['member']['achievements'], true) : $member['member']['achievements'];
                $member['member']['schools'] = is_string($member['member']['schools']) ? json_decode($member['member']['schools'], true) : $member['member']['schools'];
                $member['member']['links'] = is_string($member['member']['links']) ? json_decode($member['member']['links'], true) : $member['member']['links'];
                $member['team']['links'] = is_string($member['team']['links']) ? json_decode($member['team']['links'], true) : $member['team']['links'];
            }
            if (count($data) <= 0) {
                return $this->sendError('No data available.');
            }
            return $this->sendResponse(["count" => $count, "data" => $data], 'Data fetched successfully.', true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
    public function getTeamMemberById(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:team_member,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $getTeamMember = TeamMember::query()->where('id', $request->id)->with(['team', 'teamprofiles', 'member'])->first();

            $getTeamMember['member']['achievements'] = is_string($getTeamMember['member']['achievements']) ? json_decode($getTeamMember['member']['achievements'], true) : $getTeamMember['member']['achievements'];
            $getTeamMember['member']['schools'] = is_string($getTeamMember['member']['schools']) ? json_decode($getTeamMember['member']['schools'], true) : $getTeamMember['member']['schools'];
            $getTeamMember['member']['links'] = is_string($getTeamMember['member']['links']) ? json_decode($getTeamMember['member']['links'], true) : $getTeamMember['member']['links'];
            $getTeamMember['team']['links'] = is_string($getTeamMember['team']['links']) ? json_decode($getTeamMember['team']['links'], true) : $getTeamMember['team']['links'];

            if (empty($getTeamMember)) {
                return $this->sendError("No team found.");
            }
            return $this->sendResponse($getTeamMember, 'Data fetched successfully.', true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }
    public function deleteTeamMemberById(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:team_member,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            DB::beginTransaction();
            $teamMember = TeamMember::query()->where('id', $request->id)->first();
            $teamMember->delete();
            DB::commit();
            return $this->sendResponse($teamMember->id, 'Team member deleted successfully.', true);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }
}
