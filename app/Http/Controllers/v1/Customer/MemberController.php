<?php

namespace App\Http\Controllers\v1\Customer;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use App\Models\Achivement;
use App\Models\Association;
use App\Models\Athelete;
use App\Models\Athlete;
use App\Models\Member;
use App\Models\Membership;
use App\Models\MembershipHistory;
use App\Models\SportCertificate;
use App\Models\User;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Razorpay\Api\Api;
use Tymon\JWTAuth\Facades\JWTAuth;

class MemberController extends Controller
{
    public function saveFile($file, $process)
    {
        $extension = $file->getClientOriginalExtension();
        $cur = Str::uuid();
        $fileName = $process . '-' . $cur . '.' . $extension;
        $basePath = public_path('\\Image\\');
        if (env('APP_ENV') == 'prod') {
            $basePath = public_path('/Image/');
        }
        if (!is_dir($basePath)) {
            mkdir($basePath, 0755, true);
        }
        if (env('APP_ENV') == 'prod') {
            $destinationPath = public_path('/Image');
        } else {
            $destinationPath = public_path('\\Image');
        }

        $file->move($destinationPath, $fileName);

        return '/Image/' . $fileName;
    }
    public function addMember(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'first_name' => 'required|string|max:255',
                'middle_name' => 'nullable|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'mobile_no' => 'required|string',
                'password' => 'required|string',
                'birthdate' => 'nullable|date',
                'achievements' => 'array',
                'schools' => 'nullable',
                'links' => 'nullable',
                'bio' => 'nullable',
                'quote' => 'nullable',
                'address_line1' => 'required|string',
                'address_line2' => 'nullable',
                'is_athlete' => 'boolean',
                'is_featured' => 'boolean'
            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            DB::beginTransaction();
            $user = User::query()->where('email', $request->email)->first();
            if (!$user) {
                $user = new User();
                $user->email = $request->email;
                $user->first_name = $request->first_name;
                $user->middle_name = $request->middle_name;
                $user->last_name = $request->last_name;
                $user->mobile_no = $request->mobile_no;
                $user->password = Hash::make($request->password);
                $user->save();
            }
            $newMember = new Member();
            $newMember->user_id = $user->id;
            $newMember->address_line1 = $request->address_line1;
            $newMember->address_line2 = $request->address_line2;
            $newMember->birthday = $request->birthdate;
            $newMember->achievements = json_encode($request->achievements);
            $newMember->schools = json_encode($request->schools);
            $newMember->links = json_encode($request->links);
            $newMember->bio = $request->bio;
            $newMember->quote = $request->quote;
            $newMember->is_athlete = $request->is_athlete ?? false;
            $newMember->is_featured = $request->is_featured ?? false;

            $newMember->save();
            DB::commit();
            $data = Member::query()->where('id', $newMember->id)->with('user')->get();
            return $this->sendResponse($data, 'Member added successfully.', true);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }
    public function addAthlete(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'mobile_no' => 'required|string',
                'password' => 'required|confirmed|string',
                'date_of_birth' => 'nullable|date',
                'profile_picture' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
                'recommendation' => 'mimes:png,jpg,jpeg,pdf|max:2048',
                'aadhar_card' => 'mimes:png,jpg,jpeg,pdf|max:2048',
                'passport' => 'mimes:png,jpg,jpeg,pdf|max:2048',
                'sport_certificates.*.certificate' => 'mimes:png,jpg,jpeg,pdf|max:2048',
                'acknowledge' => 'boolean',
            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            DB::beginTransaction();
            $user = User::query()->where('email', $request->email)->first();
            if (!$user) {
                $user = new User();
                $user->email = $request->email;
                $user->first_name = $request->first_name;
                $user->last_name = $request->last_name;
                $user->mobile_no = $request->mobile_no;
                $user->role = "athlete";
                $user->password = Hash::make($request->password);
                $user->save();
            }
            $newAthlete = new Athlete();
            $newAthlete->user_id = $user->id;
            $newAthlete->gender = $request->gender;
            $newAthlete->date_of_birth = $request->date_of_birth;
            $newAthlete->city = $request->city;
            $newAthlete->address = $request->address;
            $newAthlete->state = $request->state;
            $newAthlete->country = $request->country;
            $newAthlete->postal_code = $request->postal_code;
            $newAthlete->aadhar_number = $request->aadhar_number;
            $newAthlete->passport_number = $request->passport_number;
            if ($request->hasFile('profile_picture')) {
                $newAthlete->profile_picture = $this->saveFile($request->file('profile_picture'), 'AthleteProfilePicture');
            }
            if ($request->hasFile('recommendation')) {
                $newAthlete->recommendation = $this->saveFile($request->file('recommendation'), 'Recommendation');
            }
            if ($request->hasFile('aadhar_card')) {
                $newAthlete->aadhar_card = $this->saveFile($request->file('aadhar_card'), 'AadharCard');
            }
            if ($request->hasFile('passport')) {
                $newAthlete->passport = $this->saveFile($request->file('passport'), 'Passport');
            }
            $newAthlete->save();

            if ($request->has('achievements')) {
                foreach ($request->achievements as $achievement) {
                    $newAchievment = new Achievement();
                    $newAchievment->athlete_id = $newAthlete->id;
                    $newAchievment->name = $achievement['name'];
                    $newAchievment->year = $achievement['year'];
                    $newAchievment->result = $achievement['result'];
                    $newAchievment->save();
                }
            }
            if ($request->has('sport_certificates')) {
                foreach ($request->file('sport_certificates') as $sport_certificate) {
                    $newCertificate = new SportCertificate();
                    $newCertificate->certificate = $this->saveFile($sport_certificate, 'Certificates');
                    $newCertificate->athlete_id = $newAthlete->id;
                    $newCertificate->save();
                }
            }
            $newAthlete->currency=$request->currency;
            $newAthlete->amount=$request->amount;
            if ($newAthlete->save()) {
                $api = new Api(env('R_API_KEY'), env('R_API_SECRET'));
                $orderDetails = $api->order->create([
                    'receipt' => 'Inv-' . $newAthlete->id,
                    'amount' => intval($request->amount * 100),
                    'currency' => $request->currency,
                    'notes' => [],
                ]);
                $newAthlete->payment_gateway = "razor-pay";
                $newAthlete->payment_gateway_id = $orderDetails->id;
                $newAthlete->save();
            }
            $newAthlete->save();
            DB::commit();
            return $this->sendResponse($newAthlete->id, 'Athlete added successfully.', true);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }

    public function athletePaymentVerification(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'athlete_id'=>'required|numeric',
                'payment_gateway_id' => 'required|string',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $payment = Association::where('payment_gateway_id', $request->payment_gateway_id)->find($request->athlete_id);
            if (is_null($payment)) {
                return $this->sendError('Wrong payment id.');
            }
            if ($payment->status == "paid") {
                return $this->sendError('Payment already done.');
            }
            $api = new Api(env('R_API_KEY'), env('R_API_SECRET'));
            $razorpay_order = $api->order->fetch($request->payment_gateway_id);
            if ($razorpay_order->status == 'paid' || true) {
                $payment->status = "paid";
                $payment->save();
            } else {
                $payment -> status = "pending";
                $payment->save();
                return $this->sendError('Payment pending.');
            }
            return $this->sendResponse([], 'Athlete payment status saved successfully.', true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }
    public function updateAthlete(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:athletes,id',
                'email' => 'string|email|max:255|unique:users',
                'profile_picture' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
                'recommendation' => 'mimes:png,jpg,jpeg,pdf|max:2048',
                'aadhar_card' => 'mimes:png,jpg,jpeg,pdf|max:2048',
                'passport' => 'mimes:png,jpg,jpeg,pdf|max:2048',
                'acknowledge' => 'boolean',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            DB::beginTransaction();
            $athlete = Athlete::findOrFail($request->id);
            if (!$athlete) {
                return $this->sendError("User not found.");
            }
            $user = User::where('id', $athlete->user_id)->first();
            if (!$user) {
                return $this->sendError("User not found.");
            }
            if ($request->has('first_name')) {
                $user->first_name = $request->first_name;
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
            $user->save();

            if ($request->has('gender')) {
                $athlete->gender = $request->gender;
            }
            if ($request->has('date_of_birth')) {
                $athlete->date_of_birth = $request->date_of_birth;
            }
            if ($request->has('city')) {
                $athlete->city = $request->city;
            }
            if ($request->has('address')) {
                $athlete->address = $request->address;
            }
            if ($request->has('state')) {
                $athlete->state = $request->state;
            }
            if ($request->has('country')) {
                $athlete->country = $request->country;
            }
            if ($request->has('postal_code')) {
                $athlete->postal_code = $request->postal_code;
            }
            if ($request->has('aadhar_number')) {
                $athlete->aadhar_number = $request->aadhar_number;
            }
            if ($request->has('passport_number')) {
                $athlete->passport_number = $request->passport_number;
            }
            if ($request->hasFile('profile_picture')) {
                $athlete->profile_picture = $this->saveFile($request->file('profile_picture'), 'AthleteProfilePicture');
            }
            if ($request->hasFile('recommendation')) {
                $athlete->recommendation = $this->saveFile($request->file('recommendation'), 'Recommendation');
            }
            if ($request->hasFile('aadhar_card')) {
                $athlete->aadhar_card = $this->saveFile($request->file('aadhar_card'), 'AadharCard');
            }
            if ($request->hasFile('passport')) {
                $athlete->passport = $this->saveFile($request->file('passport'), 'Passport');
            }
            $athlete->save();
            DB::commit();
            return $this->sendResponse($athlete->id, 'Athlete updated successfully.');
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }
    public function updateAchievement(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:achievements,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            DB::beginTransaction();
            $achievement = Achievement::findOrFail($request->id);
            if (!$achievement) {
                return $this->sendError("User not found.");
            }
            if ($request->has('name')) {
                $achievement->name = $request->name;
            }
            if ($request->has('year')) {
                $achievement->year = $request->year;
            }
            if ($request->has('result')) {
                $achievement->result = $request->result;
            }
            $achievement->save();
            DB::commit();
            return $this->sendResponse($achievement->id, 'Achievement updated successfully.');
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }

    public function loginMember(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required|string',
            ]);
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            $user = User::query()->where('email', $request->email)->where('role', 'member')->first();
            if (!$user) {
                // return $this->sendError('User does not exist or user doesn\'t have access', [], 401);
                return back()->withErrors(['error' => 'User does not exist or user doesn\'t have access']);
            }
            if (Hash::check($request->password, $user->password)) {
                $token = JWTAuth::fromUser($user);
                $response = ['token' => $token];
                $response['userData'] = $user;
                Auth::login($user);
                return redirect('/');
            } else {
                // return $this->sendError('Invalid credentials.', [], 401);
                return back()->withErrors(['error' => 'Invalid credentials']);
            }
        } catch (\Exception $e) {
            return redirect()->route('login')
            ->withErrors(['error' => 'Something Went Wrong' . $e->getMessage()]);
        }
    }

    // public function athleteRegistration(Request $request)
    // {
    //     try {
    //         $validator = Validator::make($request->all(), [
    //             'membership_id' => 'required|exists:membership,id',
    //         ]);

    //         if ($validator->fails()) {
    //             return $this->sendError('Validation Error.', $validator->errors());
    //         }

    //         DB::beginTransaction();
    //         $user = Auth::user();
    //         $membership = Membership::findOrFail($request->membership_id);
    //         $member = Member::where('user_id', $user->id)->first();

    //         $membershipHistory = MembershipHistory::where('member_id', $member->id)
    //             ->where('end_date', '>=', now())
    //             ->first();

    //         if ($membershipHistory) {
    //             return $this->sendError("You already have an active subscription.");
    //         }

    //         $addMembershipHistory = new MembershipHistory();
    //         $addMembershipHistory->member_id = $member->id;
    //         $addMembershipHistory->membership_id = $membership->id;
    //         $addMembershipHistory->total_amount = $membership->selling_price;
    //         $addMembershipHistory->payment_gateway = "razor-pay";
    //         $addMembershipHistory->start_date = now();

    //         if ($membership->type == 'monthly') {
    //             $endDate = now()->addMonths(1);
    //         } elseif ($membership->type == 'yearly') {
    //             $endDate = now()->addMonths(12);
    //         }

    //         $addMembershipHistory->end_date = $endDate;

    //         if ($addMembershipHistory->save()) {
    //             $api = new Api(env('R_API_KEY'), env('R_API_SECRET'));
    //             $orderDetails = $api->order->create([
    //                 'receipt' => 'Inv-' . $addMembershipHistory->id,
    //                 'amount' => $membership->selling_price,
    //                 'currency' => 'INR',
    //                 'notes' => [],
    //             ]);

    //             $addMembershipHistory->payment_gateway_id = $orderDetails->id;
    //             $addMembershipHistory->save();

    //             $response = [
    //                 'system_order_id' => $addMembershipHistory->id,
    //                 'razorpay_order_id' => $addMembershipHistory->payment_gateway_id,
    //                 'razorpay_api_key' => env('R_API_KEY'),
    //             ];
    //             DB::commit();
    //             return $this->sendResponse($response, 'Payment initiated successfully.', true);
    //         }
    //     } catch (Exception $e) {
    //         DB::rollBack();
    //         return $this->sendError($e->getMessage(), $e->getTrace(), 500);
    //     }
    // }

    public function paymentVerification(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'system_order_id' => 'required|numeric',
                'razorpay_order_id' => 'required|string',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $payment = MembershipHistory::where('payment_gateway_id', $request->razorpay_order_id)->find($request->system_order_id);
            if (is_null($payment)) {
                return $this->sendError('Wrong payment id.');
            }
            if ($payment->status == "paid") {
                return $this->sendError('Payment already done.');
            }
            $api = new Api(env('R_API_KEY'), env('R_API_SECRET'));
            $razorpay_order = $api->order->fetch($request->razorpay_order_id);
            if ($razorpay_order->status == 'paid' || true) {
                $payment->status = "paid";
                $payment->save();
                $member = Member::where('user_id', Auth::user()->id)->first();
                $member->is_athlete = true;
                $member->save();
                $user = User::findOrFail(Auth::User()->id);
                $user->role = 'athlete';
                $user->save();
            } else {
                $payment->status = "pending";
                $payment->save();
                return $this->sendError('Payment pending.');
            }
            return $this->sendResponse([], 'Athlete registration successfully.', true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }

    public function addAssociationMember(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'first_name' => 'required|string|max:255',
                
                'email' => 'required|string|email|max:255|unique:users',
                'mobile_no' => 'required|string',
                'password' => 'nullable|string',
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


            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            DB::beginTransaction();
            $user = User::query()->where('email', $request->email)->first();
            if (!$user) {
                $user = new User();
                $user->email = $request->email;
                
                $user->mobile_no = $request->mobile_no;
                $user->password = Hash::make($request->password);
                $user->save();
            }
            $newMember = new Association();
            $newMember->user_id = $user->id;
            if ($request->hasFile('logo')) {
                $newMember->logo = $this->saveFile($request->file('logo'), 'AssociationMemberLogo');
            }
            $newMember->name_of_state_unit = $request->name_of_state_unit;
            $newMember->date_of_establishment = $request->date_of_establishment;
            $newMember->incorporation_certificate_number = $request->incorporation_certificate_number;
            $newMember->recognition_by_state_government = $request->recognition_by_state_government;
            $newMember->recognition_by_state_olympic_association = $request->recognition_by_state_olympic_association;
            $newMember->hosted_national_event_in_past_3_yrs = $request->hosted_national_event_in_past_3_yrs;
            $newMember->hosted_international_event_in_past_4_yrs = $request->hosted_international_event_in_past_4_yrs;
            $newMember->active_athletes_competed_in_past_2_yrs = $request->active_athletes_competed_in_past_2_yrs;
            $newMember->registered_address = $request->registered_address;
            $newMember->city = $request->city;
            $newMember->state = $request->state;
            $newMember->postal_code = $request->postal_code;
            $newMember->website = $request->website;
            $newMember->president_name = $request->president_name;
            $newMember->president_email = $request->president_email;
            $newMember->president_phone_number = $request->president_phone_number;
            if ($request->hasFile('president_signature')) {
                $newMember->president_signature = $this->saveFile($request->file('president_signature'), 'PresidentSignature');
            }
            if ($request->hasFile('signature_of_bearer_1')) {
                $newMember->signature_of_bearer_1 = $this->saveFile($request->file('signature_of_bearer_1'), 'Bearer1Signature');
            }
            if ($request->hasFile('signature_of_bearer_2')) {
                $newMember->signature_of_bearer_2 = $this->saveFile($request->file('signature_of_bearer_2'), 'Bearer2Signature');
            }
            $newMember->acknowledgement = $request->acknowledgement;
            $newMember->currency=$request->currency;
            $newMember->amount=$request->amount;
            if ($newMember->save()) {
                $api = new Api(env('R_API_KEY'), env('R_API_SECRET'));
                $orderDetails = $api->order->create([
                    'receipt' => 'Inv-' . $newMember->id,
                    'amount' => intval($request->amount * 100),
                    'currency' => $request->currency,
                    'notes' => [],
                ]);
                $newMember->payment_gateway = "razor-pay";
                $newMember->payment_gateway_id = $orderDetails->id;
                $newMember->save();
            }
            $newMember->save();
            DB::commit();
            $data = Member::query()->where('id', $newMember->id)->with('user')->get();
            return $this->sendResponse($data, 'Association Member added successfully.', true);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }

    public function associationMemberPaymentVerification(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'association_id'=>'required|numeric',
                'payment_gateway_id' => 'required|string',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $payment = Association::where('payment_gateway_id', $request->payment_gateway_id)->find($request->association_id);
            if (is_null($payment)) {
                return $this->sendError('Wrong payment id.');
            }
            if ($payment->status == "paid") {
                return $this->sendError('Payment already done.');
            }
            $api = new Api(env('R_API_KEY'), env('R_API_SECRET'));
            $razorpay_order = $api->order->fetch($request->payment_gateway_id);
            if ($razorpay_order->status == 'paid' || true) {
                $payment->status = "paid";
                $payment->save();
            } else {
                $payment -> status = "pending";
                $payment->save();
                return $this->sendError('Payment pending.');
            }
            return $this->sendResponse([], 'Association member payment status saved successfully.', true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }
    public function updateAssociationMember(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:association,id',
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


            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            DB::beginTransaction();
            $Association = Association::findOrFail($request->id);
            if (!$Association) {
                return $this->sendError("User not found.");
            }
            $user = User::where('id', $Association->user_id)->first();
            if (!$user) {
                return $this->sendError("User not found.");
            }
            if ($request->has('first_name')) {
                $user->first_name = $request->first_name;
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
            $user->save();

            if ($request->has('name_of_state_unit')) {
                $Association->name_of_state_unit = $request->name_of_state_unit;
            }
            if ($request->has('date_of_establishment')) {
                $Association->date_of_establishment = $request->date_of_establishment;
            }
            if ($request->has('incorporation_certificate_number')) {
                $Association->incorporation_certificate_number = $request->incorporation_certificate_number;
            }
            if ($request->has('recognition_by_state_government')) {
                $Association->recognition_by_state_government = $request->recognition_by_state_government;
            }
            if ($request->has('recognition_by_state_olympic_association')) {
                $Association->recognition_by_state_olympic_association = $request->recognition_by_state_olympic_association;
            }
            if ($request->has('hosted_national_event_in_past_3_yrs')) {
                $Association->hosted_national_event_in_past_3_yrs = $request->hosted_national_event_in_past_3_yrs;
            }
            if ($request->has('postal_code')) {
                $Association->postal_code = $request->postal_code;
            }
            if ($request->has('hosted_international_event_in_past_4_yrs')) {
                $Association->hosted_international_event_in_past_4_yrs = $request->hosted_international_event_in_past_4_yrs;
            }
            if ($request->has('active_athletes_competed_in_past_2_yrs')) {
                $Association->active_athletes_competed_in_past_2_yrs = $request->active_athletes_competed_in_past_2_yrs;
            }
            if ($request->has('registered_address')) {
                $Association->registered_address = $request->registered_address;
            }
            if ($request->has('hosted_international_event_in_past_4_yrs')) {
                $Association->hosted_international_event_in_past_4_yrs = $request->hosted_international_event_in_past_4_yrs;
            }
            if ($request->has('city')) {
                $Association->city = $request->city;
            }
            if ($request->has('state')) {
                $Association->state = $request->state;
            }
            if ($request->has('postal_code')) {
                $Association->postal_code = $request->postal_code;
            }
            if ($request->has('website')) {
                $Association->website = $request->website;
            }
            if ($request->has('president_name')) {
                $Association->president_name = $request->president_name;
            }
            if ($request->has('president_email')) {
                $Association->president_email = $request->president_email;
            }
            if ($request->has('president_phone_number')) {
                $Association->president_phone_number = $request->president_phone_number;
            }

            if ($request->hasFile('logo')) {
                $Association->logo = $this->saveFile($request->file('logo'), 'AssociationMemberLogo');
            }
            if ($request->hasFile('president_signature')) {
                $Association->president_signature = $this->saveFile($request->file('president_signature'), 'PresidentSignature');
            }
            if ($request->hasFile('signature_of_bearer_1')) {
                $Association->signature_of_bearer_1 = $this->saveFile($request->file('signature_of_bearer_1'), 'Bearer1Signature');
            }
            if ($request->hasFile('signature_of_bearer_2')) {
                $Association->signature_of_bearer_2 = $this->saveFile($request->file('signature_of_bearer_2'), 'Bearer2Signature');
            }
            $Association->save();
            DB::commit();
            return $this->sendResponse($Association->id, 'Association updated successfully.');
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }

}
