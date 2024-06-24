<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\TeamMember;
use App\Models\TeamProfiles;
use App\Models\User;
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

        return "/uploads/$fileName/" . $newFileName;
    }
    public function addTeam(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'primary_img' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            DB::beginTransaction();
            $newTeam = new Team();
            $newTeam->name = $request->name;
            $newTeam->description = $request->description;
            if ($request->primary_img) {
                $newTeam->primary_img = $this->saveFile($request->primary_img, 'TeamLogos');
            }
            $newTeam->save();
            DB::commit();
            return $this->sendResponse($newTeam, 'Game added successfully.', true);
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
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            DB::beginTransaction();
            $updateTeam = Team::query()->where('id', $request->id)->first();
            if (!$updateTeam) {
                return $this->sendError("No game found.");
            }
            if ($request->has('name')) {
                $updateTeam->name = $request->name;
            }
            if ($request->has('description')) {
                $updateTeam->description = $request->description;
            }
            if ($request->hasFile('primary_img')) {
                $updateTeam->primary_img = $this->saveFile($request->primary_img, 'TeamLogos');
            }
            $updateTeam->save();
            DB::commit();
            return $this->sendResponse($updateTeam, 'Game updated successfully.');
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
            return $this->sendResponse(["count" => $count, "games" => $data], 'Data fetched successfully.', true);
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
                return $this->sendError("No game found.");
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
            $team->teammember()->delete();
            $team->teamprofiles()->delete();
            $team->delete();
            DB::commit();
            return $this->sendResponse($team->id, 'Game and associated teams deleted successfully.', true);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }

    // Team Profile
    public function addMultipleTeamsWithAthletes(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'team_id' => 'required|integer|exists:teams,id',
            'teams' => 'required|array',
            'teams.*.name' => 'required|string|max:255',
            // 'teams.*.team_id' => 'required|integer|exists:teams,id',
            'teams.*.athlete_ids' => 'required|array',
            'teams.*.athlete_ids.*' => 'required|integer|exists:users,id,role,athlete',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        DB::beginTransaction();
        $team_id = $request->team_id;
        try {
            foreach ($request->teams as $teamData) {
                // Check if team profile with the same name exists
                $teamProfile = TeamProfiles::query()
                    ->where('team_id', $team_id)
                    ->where('name', $teamData['name'])
                    ->first();

                if ($teamProfile) {
                    DB::rollBack();
                    return $this->sendError("Team with the name '{$teamData['name']}' already exists.");
                }

                // Create a new team profile
                $newTeamProfile = new TeamProfiles();
                $newTeamProfile->team_id = $team_id;
                $newTeamProfile->name = $teamData['name'];
                $newTeamProfile->description = $teamData['description'] ?? null;
                $newTeamProfile->save();

                $team_profile_id = $newTeamProfile->id;

                foreach ($teamData['athlete_ids'] as $athlete_id) {
                    // Check if athlete is already part of the team profile
                    $existingTeamMember = TeamMember::query()
                        ->where('team_id', $team_id)
                        ->where('athlete_id', $athlete_id)
                        ->first();
                    if ($existingTeamMember) {
                        $teamProfile = TeamProfiles::where('id', $existingTeamMember->team_profile_id)->pluck('name')->first();
                        $athleteName = User::where('id', $athlete_id)->pluck('first_name')->first();
                        DB::rollBack();
                        return $this->sendError("$athleteName is already assigned to team '$teamProfile'.", [], 409);
                    }
                    // $user = User::where('team_id', $team_id)->where('id', $athlete_id);
                    // if ($user) {
                    //     DB::rollBack();
                    //     return $this->sendError("Please select valid athlete.");
                    // }
                    // Add athlete to the team profile
                    $newTeamMember = new TeamMember();
                    $newTeamMember->team_id = $team_id;
                    $newTeamMember->team_profile_id = $team_profile_id;
                    $newTeamMember->athlete_id = $athlete_id;
                    $newTeamMember->save();
                }
            }

            DB::commit();
            return $this->sendResponse([], 'Multiple teams and athletes added successfully.', true);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError('Failed to add multiple teams with athletes.', $e->getMessage(), 500);
        }
    }
    public function updateMultipleTeamsWithAthletes(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'team_id' => 'required|integer|exists:teams,id',
            'teams' => 'required|array',
            'teams.*.id' => 'required|integer|exists:team_profiles,id',
            'teams.*.name' => 'required|string|max:255',
            'teams.*.description' => 'nullable|string|max:255',
            'teams.*.athlete_ids' => 'required|array',
            'teams.*.athlete_ids.*' => 'required|integer|exists:users,id,role,athlete',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        DB::beginTransaction();
        $team_id = $request->team_id;
        try {
            foreach ($request->teams as $teamData) {
                // Fetch existing team profile
                $teamProfile = TeamProfiles::find($teamData['id']);

                if (!$teamProfile || $teamProfile->team_id != $team_id) {
                    DB::rollBack();
                    return $this->sendError("Team profile with ID '{$teamData['id']}' does not exist or does not belong to the specified team.");
                }

                // Update team profile details
                $teamProfile->name = $teamData['name'];
                $teamProfile->description = $teamData['description'] ?? $teamProfile->description; // Update description if provided
                $teamProfile->save();

                // Remove existing athlete associations
                TeamMember::where('team_profile_id', $teamProfile->id)->delete();

                // Add updated athlete associations
                foreach ($teamData['athlete_ids'] as $athlete_id) {
                    // Ensure athlete is not already assigned to another team in the same game
                    $existingTeamMember = TeamMember::query()
                        ->where('team_id', $team_id)
                        ->where('athlete_id', $athlete_id)
                        ->first();

                    if ($existingTeamMember) {
                        DB::rollBack();
                        return $this->sendError("Athlete with ID $athlete_id is already assigned to another team in this game", [], 409);
                    }

                    // Add athlete to the team profile
                    $newTeamMember = new TeamMember();
                    $newTeamMember->team_id = $team_id;
                    $newTeamMember->team_profile_id = $teamProfile->id;
                    $newTeamMember->athlete_id = $athlete_id;
                    $newTeamMember->save();
                }
            }

            DB::commit();
            return $this->sendResponse([], 'Teams and athletes updated successfully.', true);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError('Failed to update teams with athletes.', $e->getMessage(), 500);
        }
    }

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
            $teamProfile = TeamProfiles::query()->where('team_id', $request->team_id)->where('name', $request->name)->first();
            if ($teamProfile) {
                return $this->sendError("Team with same name already exist");
            } else {
                $newTeamProfile = new TeamProfiles();
                $newTeamProfile->team_id = $request->team_id;
                $newTeamProfile->name = $request->name;
                $newTeamProfile->description = $request->description;
                $newTeamProfile->save();
            }
            DB::commit();
            return $this->sendResponse($newTeamProfile, 'Team added successfully.', true);
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
                $teamProfile = TeamProfiles::query()->where('team_id', $updateTeamProfile->team_id)->where('name', $request->name)->first();
                if ($teamProfile && $teamProfile->id != $request->id) {
                    return $this->sendError("Team with same name already exist");
                } else {
                    $updateTeamProfile->name = $request->name;
                }
            }
            if ($request->has('description')) {
                $updateTeamProfile->description = $request->description;
            }
            $updateTeamProfile->save();
            DB::commit();
            return $this->sendResponse($updateTeamProfile, 'Team updated successfully.');
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
                'team_id' => 'required|exists:teams,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors(), 400);
            }
            $query = TeamProfiles::query()->with('users')->withCount('users');

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
            $teamProfile->teammember()->delete();
            $teamProfile->delete();
            DB::commit();
            return $this->sendResponse($teamProfile->id, 'Team deleted successfully.', true);
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
                'team_profile_id' => 'required||exists:team_profiles,id',
                'athlete_ids' => 'required|array',
                'athlete_ids.*' => 'required|integer|exists:users,id,role,athlete',
            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            DB::beginTransaction();

            $team_id = $request->team_id;
            $team_profile_id = $request->team_profile_id;
            $athlete_ids = $request->athlete_ids;

            foreach ($athlete_ids as $athlete_id) {
                $existingTeamMember = TeamMember::where('team_id', $team_id)
                    ->where('team_profile_id', $team_profile_id)
                    ->where('athlete_id', $athlete_id)
                    ->first();

                if ($existingTeamMember) {
                    return $this->sendError("Athlete with ID $athlete_id already belongs to this team profile.", [], 409);
                }

                $existingTeamMember = TeamMember::where('team_id', $team_id)
                    ->where('athlete_id', $athlete_id)
                    ->first();

                if ($existingTeamMember) {
                    return $this->sendError("Athlete with ID $athlete_id already belongs to another team profile.", [], 409);
                }
                $newTeamMember = new TeamMember();
                $newTeamMember->team_id = $team_id;
                $newTeamMember->team_profile_id = $team_profile_id;
                $newTeamMember->athlete_id = $athlete_id;
                $newTeamMember->save();
            }

            DB::commit();
            return $this->sendResponse([], 'Athletes added to team successfully.', true);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }
    public function updateTeamMember(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'team_id' => 'required|integer|exists:teams,id',
                'team_profile_id' => 'required|exists:team_profiles,id',
                'athlete_ids' => 'required|array',
                'athlete_ids.*' => 'required|integer|exists:users,id,role,athlete',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            DB::beginTransaction();
            $teamMembers = TeamMember::query()->where('team_id', $request->team_id)->where('team_profile_id', $request->team_profile_id)->get();
            if (!$teamMembers) {
                return $this->sendError("No team found.");
            }
            foreach ($teamMembers as $teamMember) {
                $teamMember->delete();
            }
            $team_id = $request->team_id;
            $team_profile_id = $request->team_profile_id;
            $athlete_ids = $request->athlete_ids;

            foreach ($athlete_ids as $athlete_id) {
                $existingTeamMember = TeamMember::where('team_id', $team_id)
                    ->where('team_profile_id', $team_profile_id)
                    ->where('athlete_id', $athlete_id)
                    ->first();

                if ($existingTeamMember) {
                    return $this->sendError("Athlete with ID $athlete_id already belongs to this team profile.", [], 409);
                }

                $existingTeamMember = TeamMember::where('team_id', $team_id)
                    ->where('athlete_id', $athlete_id)
                    ->first();

                if ($existingTeamMember) {
                    return $this->sendError("Athlete with ID $athlete_id already belongs to another team profile.", [], 409);
                }

                $newTeamMember = new TeamMember();
                $newTeamMember->team_id = $team_id;
                $newTeamMember->team_profile_id = $team_profile_id;
                $newTeamMember->athlete_id = $athlete_id;
                $newTeamMember->save();
            }
            DB::commit();
            return $this->sendResponse([], 'Athletes in team updated successfully.');
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
    public function getTeamMemberById(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:team_member,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $getTeamMember = TeamMember::query()->where('id', $request->id)->with(['team', 'users'])->first();
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
                'team_id' => 'required|integer|exists:teams,id',
                'team_profile_id' => 'required|integer|exists:team_profiles,id',
                'athlete_id' => 'required|integer|exists:users,id,role,athlete',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            DB::beginTransaction();
            $teamMember = TeamMember::query()->where('team_id', $request->team_id)
                ->where('team_profile_id', $request->team_profile_id)
                ->where('athlete_id', $request->athlete_id)->first();
            if (!$teamMember) {
                return $this->sendError("Athlete doesn't exist in this team.");
            } else {
                $teamMember->delete();
            }
            DB::commit();
            return $this->sendResponse($teamMember->id, 'Athlete removed fron team successfully.', true);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }
}
