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
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class MemberController extends Controller
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
    // public function getAllMembers(Request $request): JsonResponse
    // {
    //     try {
    //         $validator = Validator::make($request->all(), [
    //             'pageNo' => 'nullable|numeric',
    //             'limit' => 'nullable|numeric',
    //             'name' => 'nullable|string|max:255',
    //         ]);

    //         if ($validator->fails()) {
    //             return $this->sendError('Validation Error.', $validator->errors(), 400);
    //         }

    //         $query = Member::query()->with(['user']);
    //         if ($request->has('is_athlete')) {
    //             if ($request->is_athlete == true) {
    //                 $query->where('is_athlete', true);
    //             }
    //             if ($request->is_athlete == false) {
    //                 $query->where('is_athlete', false);
    //             }
    //         }
    //         if ($request->has('is_featured')) {
    //             if ($request->is_featured == true) {
    //                 $query->where('is_featured', true)->where('is_athlete', true);
    //             }
    //             if ($request->is_featured == false) {
    //                 $query->where('is_featured', false)->where('is_athlete', true);
    //             }
    //         }
    //         $count = $query->count();

    //         if ($request->has('pageNo') && $request->has('limit')) {
    //             $limit = $request->limit;
    //             $pageNo = $request->pageNo;
    //             $skip = $limit * $pageNo;
    //             $query->skip($skip)->limit($limit);
    //         }

    //         $members = $query->orderBy('id', 'DESC')->get()->toArray();

    //         foreach ($members as &$member) {
    //             $member['achievements'] = is_string($member['achievements']) ? json_decode($member['achievements'], true) : $member['achievements'];
    //             $member['schools'] = is_string($member['schools']) ? json_decode($member['schools'], true) : $member['schools'];
    //             $member['links'] = is_string($member['links']) ? json_decode($member['links'], true) : $member['links'];
    //         }

    //         if (count($members) <= 0) {
    //             return $this->sendError('No data available.');
    //         }

    //         return $this->sendResponse(["count" => $count, "data" => $members], 'Data Fetched Successfully.', true);
    //     } catch (Exception $e) {
    //         return $this->sendError($e->getMessage(), $e->getTrace(), 500);
    //     }
    // }
    // public function getMemberById(Request $request): JsonResponse
    // {
    //     try {
    //         $validator = Validator::make($request->all(), [
    //             'id' => 'required|exists:members,id',
    //         ]);

    //         if ($validator->fails()) {
    //             return $this->sendError('Validation Error.', $validator->errors(), 400);
    //         }

    //         $query = Member::query()->where('id', $request->id)->with('user')->first();

    //         return $this->sendResponse($query, 'Data fetched successfully.', true);
    //     } catch (Exception $e) {
    //         return $this->sendError($e->getMessage(), $e->getTrace(), 500);
    //     }
    // }
    public function getAllAthletes(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'pageNo' => 'numeric',
                'limit' => 'numeric',
                'team_id' => 'integer|exists:teams,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors(), 400);
            }
            $query = User::query()->with(['team', 'achievements', 'sport_certificates', 'payment_history'])->where('role', 'athlete');
            if ($request->team_id) {
                $query->where('team_id', $request->team_id);
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
                $response['Athlete'] = $data;
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
            $query = User::query()->with('payment_history')->where('role', 'member');
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
    public function getAssociationById(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:users,id'
            ]);

            if ($validator->fails()) {
                return $this->sendError("Validation failed", $validator->errors());
            }
            $association = User::query()->where('id', $request->id)->with('payment_history')->where('role', 'member')->first();
            if (!$association) {
                return $this->sendError('No data available.');
            }
            return $this->sendResponse($association, "Association fetched successfully.", true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
    public function getAthleteById(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:users,id'
            ]);

            if ($validator->fails()) {
                return $this->sendError("Validation failed", $validator->errors());
            }
            $athlete = User::query()->where('id', $request->id)->with(['team', 'achievements', 'sport_certificates', 'payment_history'])->where('role', 'athlete')->first();
            if (!$athlete) {
                return $this->sendError('No data available.');
            }
            return $this->sendResponse($athlete, "Association fetched successfully.", true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
    public function updateAthleteDesignation(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:users,id',
                'designation' => 'required|in:senior_a,senior_b,junior_a,junior_b,',
            ]);
            if ($validator->fails()) {
                return $this->sendError("Validation failed", $validator->errors());

                // return back()->withErrors($validator)->withInput();
            }
            DB::beginTransaction();

            $user = User::query()->where('id', $request->id)->first();
            if (!$user) {
                return $this->sendError("User not found.");
            }
            if ($request->has('designation')) {
                $user->designation = $request->designation;
            }
            $user->save();
            DB::commit();
            return $this->sendResponse([], "Designation Updated Successfully.");
            // return back()->with('success', 'Profile Updated successfully!');
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError("Validation failed", $validator->errors());
        }
    }

    public function updateAthlete(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:users,id',
                'email' => 'string|email|max:255|unique:users',
                'profile_picture' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
                'anti_doping_certificate' => 'nullable|mimes:png,jpg,jpeg,pdf',
                'physical_fitness_certificate' => 'nullable|mimes:png,jpg,jpeg,pdf',
                'recommendation' => 'mimes:png,jpg,jpeg,pdf|max:2048',
                'aadhar_card' => 'mimes:png,jpg,jpeg,pdf|max:2048',
                'passport' => 'mimes:png,jpg,jpeg,pdf|max:2048',
                'acknowledge' => 'boolean',
                'team_id' => 'integer|exists:teams,id',
                'is_active' => 'nullable|boolean'
            ]);
            if ($validator->fails()) {
                return $this->sendError("Validation failed", $validator->errors());
            }
            DB::beginTransaction();

            $user = User::query()->where('id', $request->id)->first();
            if (!$user) {
                return $this->sendError("User not found.");
            }
            if ($request->has('first_name')) {
                $user->first_name = $request->first_name;
            }
            if ($request->has('is_active')) {
                $user->is_active = $request->is_active;
            }
            if ($request->has('middle_name')) {
                $user->middle_name = $request->middle_name;
            }
            if ($request->has('last_name')) {
                $user->last_name = $request->last_name;
            }
            if ($request->has('team_id')) {
                $user->team_id = $request->team_id;
            }
            if ($request->has('mobile_no')) {
                $user->mobile_no = $request->mobile_no;
            }
            if ($request->has('gender')) {
                $user->gender = $request->gender;
            }
            if ($request->has('date_of_birth')) {
                $user->date_of_birth = $request->date_of_birth;
            }
            if ($request->has('city')) {
                $user->city = $request->city;
            }
            if ($request->has('address')) {
                $user->address = $request->address;
            }
            if ($request->has('state')) {
                $user->state = $request->state;
            }
            if ($request->has('country')) {
                $user->country = $request->country;
            }
            if ($request->has('postal_code')) {
                $user->postal_code = $request->postal_code;
            }
            if ($request->has('aadhar_number')) {
                $user->aadhar_number = $request->aadhar_number;
            }
            if ($request->has('passport_number')) {
                $user->passport_number = $request->passport_number;
            }
            if ($request->hasFile('physical_fitness_certificate')) {
                $user->physical_fitness_certificate = $this->saveFile($request->file('physical_fitness_certificate'), 'PhysicalFitness');
            }
            if ($request->hasFile('anti_doping_certificate')) {
                $user->anti_doping_certificate = $this->saveFile($request->file('anti_doping_certificate'), 'AntiDoping');
            }
            if ($request->hasFile('profile_picture')) {
                $user->profile_picture = $this->saveFile($request->file('profile_picture'), 'AthleteProfilePicture');
            }
            if ($request->hasFile('recommendation')) {
                $user->recommendation = $this->saveFile($request->file('recommendation'), 'Recommendation');
            }
            if ($request->hasFile('aadhar_card')) {
                $user->aadhar_card = $this->saveFile($request->file('aadhar_card'), 'AadharCard');
            }
            if ($request->hasFile('passport')) {
                $user->passport = $this->saveFile($request->file('passport'), 'Passport');
            }
            $user->save();
            DB::commit();
            return $this->sendResponse([], "Profile Updated successfully.");
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }

    public function updateAssociationMember(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:users,id',
                'name_of_state_unit' => 'nullable|string',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'date_of_establishment' => 'nullable|date',
                'incorporation_certificate_number' => 'nullable|string|max:255',
                'recognition_by_state_government' => 'nullable|boolean|max:255',
                'recognition_by_state_olympic_association' => 'nullable|boolean|max:255',
                'hosted_national_event_in_past_3_yrs' => 'nullable|boolean|max:255',
                'hosted_international_event_in_past_4_yrs' => 'nullable|boolean|max:255',
                'active_athletes_competed_in_past_2_yrs' => 'nullable|boolean|max:255',
                'registered_address' => 'nullable|string|max:255',
                'city' => 'nullable|string|max:255',
                'state' => 'nullable|string|max:255',
                'postal_code' => 'nullable|string|max:255',
                'website' => 'nullable|string|max:255',
                'president_name' => 'nullable|string|max:255',
                'president_email' => 'nullable|string|email|max:255',
                'president_phone_number' => 'nullable|string|max:255',
                'president_signature' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'signature_of_bearer_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'signature_of_bearer_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'acknowledgement' => 'nullable|boolean|max:255',
                'is_active' => 'nullable|boolean'


            ]);
            if ($validator->fails()) {
                return $this->sendError("Validation failed", $validator->errors());
            }
            DB::beginTransaction();

            $user = User::query()->where('id', $request->id)->first();
            if (!$user) {
                return $this->sendError("User not found.");
            }
            if ($request->has('first_name')) {
                $user->first_name = $request->first_name;
            }
            if ($request->has('is_active')) {
                $user->is_active = $request->is_active;
            }
            if ($request->has('middle_name')) {
                $user->middle_name = $request->middle_name;
            }
            if ($request->has('last_name')) {
                $user->last_name = $request->last_name;
            }
            if ($request->has('mobile_no')) {
                $user->mobile_no = $request->mobile_no;
            }

            if ($request->has('date_of_establishment')) {
                $user->date_of_establishment = $request->date_of_establishment;
            }
            if ($request->has('incorporation_certificate_number')) {
                $user->incorporation_certificate_number = $request->incorporation_certificate_number;
            }
            if ($request->has('recognition_by_state_government')) {
                $user->recognition_by_state_government = $request->recognition_by_state_government;
            }
            if ($request->has('recognition_by_state_olympic_association')) {
                $user->recognition_by_state_olympic_association = $request->recognition_by_state_olympic_association;
            }
            if ($request->has('hosted_national_event_in_past_3_yrs')) {
                $user->hosted_national_event_in_past_3_yrs = $request->hosted_national_event_in_past_3_yrs;
            }
            if ($request->has('postal_code')) {
                $user->postal_code = $request->postal_code;
            }
            if ($request->has('hosted_international_event_in_past_4_yrs')) {
                $user->hosted_international_event_in_past_4_yrs = $request->hosted_international_event_in_past_4_yrs;
            }
            if ($request->has('active_athletes_competed_in_past_2_yrs')) {
                $user->active_athletes_competed_in_past_2_yrs = $request->active_athletes_competed_in_past_2_yrs;
            }
            if ($request->has('registered_address')) {
                $user->registered_address = $request->registered_address;
            }
            if ($request->has('hosted_international_event_in_past_4_yrs')) {
                $user->hosted_international_event_in_past_4_yrs = $request->hosted_international_event_in_past_4_yrs;
            }
            if ($request->has('city')) {
                $user->city = $request->city;
            }
            if ($request->has('state')) {
                $user->state = $request->state;
            }
            if ($request->has('postal_code')) {
                $user->postal_code = $request->postal_code;
            }
            if ($request->has('website')) {
                $user->website = $request->website;
            }
            if ($request->has('president_name')) {
                $user->president_name = $request->president_name;
            }
            if ($request->has('president_email')) {
                $user->president_email = $request->president_email;
            }
            if ($request->has('president_phone_number')) {
                $user->president_phone_number = $request->president_phone_number;
            }

            if ($request->hasFile('logo')) {
                $user->logo = $this->saveFile($request->file('logo'), 'AssociationMemberLogo');
            }
            if ($request->hasFile('president_signature')) {
                $user->president_signature = $this->saveFile($request->file('president_signature'), 'PresidentSignature');
            }
            if ($request->hasFile('signature_of_bearer_1')) {
                $user->signature_of_bearer_1 = $this->saveFile($request->file('signature_of_bearer_1'), 'Bearer1Signature');
            }
            if ($request->hasFile('signature_of_bearer_2')) {
                $user->signature_of_bearer_2 = $this->saveFile($request->file('signature_of_bearer_2'), 'Bearer2Signature');
            }

            $user->save();
            DB::commit();
            return $this->sendResponse([], "Profile Updated successfully.");
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }
    
}
