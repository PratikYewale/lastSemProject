<?php

namespace App\Http\Controllers\v1\Customer;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use App\Models\Achivement;
use App\Models\Association;
use App\Models\Athelete;
use App\Models\Athlete;
use App\Models\PaymentHistory;
use App\Models\Member;
use App\Models\Membership;
use App\Models\MembershipHistory;
use Illuminate\Support\Facades\Mail;
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
    public function genarateCode($firstname, $lastname, $user_id, $gender)
    {
        $firstLetterVar1 = strtoupper(substr($firstname, 0, 1));
        $firstLetterVar2 = strtoupper(substr($lastname, 0, 1));
        if ($gender == 1) {
            $firstLetterVar3 = "M";
        } else {
            $firstLetterVar3 = "F";
        }
        $code = "SSI" . $firstLetterVar1 . $firstLetterVar2 . $firstLetterVar3 . $user_id;
        return $code;
    }
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
    public function addMember(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'first_name' => 'required|string|max:255',
                'middle_name' => 'nullable|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'mobile_no' => 'required|min:10|max:10',
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
                return back()->withErrors($validator)->withInput();
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
            // return $this->sendResponse($data, 'Member added successfully.', true);
            return back()->with('success', 'Member added successfully.');
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }
    public function addAthlete(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'first_name' => 'required|string|max:255',
                'last_name' => 'nullable|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'mobile_no' => 'required|min:10|max:10',
                'password' => 'required|confirmed|string',
                'date_of_birth' => 'nullable|date',
                'profile_picture' => 'required|image|mimes:png,jpg,jpeg',
                'anti_doping_certificate' => 'required|mimes:png,jpg,jpeg,pdf',
                'physical_fitness_certificate' => 'required|mimes:png,jpg,jpeg,pdf',
                'recommendation' => 'mimes:png,jpg,jpeg,pdf',
                'aadhar_card' => 'mimes:png,jpg,jpeg,pdf',
                'aadhar_number' => 'required|max:12|min:12',
                'passport_number' => 'nullable|unique:users',
                'passport' => 'mimes:png,jpg,jpeg,pdf',
                'achievements' => 'array',
                'achievements.*.name' => 'nullable',
                'achievements.*.year' => 'nullable',
                'achievements.*.result' => 'nullable',
                'achievements.*.certificate' => 'file',
                'acknowledge' => 'boolean',
                'city' => 'required',
                'state' => 'required',
                'country' => 'required',
                'team_id' => 'integer|exists:teams,id',
                'club_name' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
                // return back()->withErrors($validator)->withInput();
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
                $user->gender = $request->gender;
                $user->date_of_birth = $request->date_of_birth;
                $user->city = $request->city;
                $user->address = $request->address;
                $user->state = $request->state;
                $user->country = $request->country;
                $user->postal_code = $request->postal_code;
                $user->aadhar_number = $request->aadhar_number;
                $user->passport_number = $request->passport_number;
                $user->team_id = $request->team_id;
                $user->club_name = $request->club_name;
                // $user->designation = "Designation not defined yet.";
                if ($request->hasFile('profile_picture')) {
                    $user->profile_picture = $this->saveFile($request->file('profile_picture'), 'AthleteProfilePicture');
                }
                if ($request->hasFile('physical_fitness_certificate')) {
                    $user->physical_fitness_certificate = $this->saveFile($request->file('physical_fitness_certificate'), 'PhysicalFitness');
                }
                if ($request->hasFile('anti_doping_certificate')) {
                    $user->anti_doping_certificate = $this->saveFile($request->file('anti_doping_certificate'), 'AntiDoping');
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
            }
            $user->save();
            $user->unique_code = $this->genarateCode($user->first_name, $user->last_name, $user->id, $user->gender);
            $user->save();

            if ($request->has('achievements')) {
                foreach ($request->achievements as $achievement) {
                    $newAchievment = new Achievement();
                    $newAchievment->user_id = $user->id;
                    $newAchievment->name = $achievement['name'];
                    $newAchievment->year = $achievement['year'];
                    $newAchievment->result = $achievement['result'];
                    if (isset($achievement['certificate'])) {
                        $newAchievment->certificate = $this->saveFile($achievement['certificate'], 'Certificate');
                    }
                    $newAchievment->save();
                }
            }
            if ($request->has('sport_certificates')) {
                foreach ($request->file('sport_certificates') as $sport_certificate) {
                    $newCertificate = new SportCertificate();
                    $newCertificate->certificate = $this->saveFile($sport_certificate, 'Certificates');
                    $newCertificate->user_id = $user->id;
                    $newCertificate->save();
                }
            }
            DB::commit();
            // return back()->with('success', 'Athlete added successfully.');
            return $this->sendResponse([], "Athlete added succesfully.");
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), $e->getMessage(), 413);
        }
    }
    public function createPaymentAthlete(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                //'user_id' => 'required|exists:users,id',
                //'description' => 'nullable',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            DB::beginTransaction();

            $paymentHistory = new PaymentHistory();
            $paymentHistory->user_id = Auth::user()->id;
            $paymentHistory->type = 'athlete';
            $paymentHistory->amount = $request->amount;
            $paymentHistory->currency = $request->currency;
            $paymentHistory->payment_gateway = "razor-pay";

            $api = new Api(env('R_API_KEY'), env('R_API_SECRET'));
            $orderDetails = $api->order->create([
                'receipt' => 'Inv-' . $paymentHistory->id,
                'amount' => intval($request->amount * 100),
                'currency' => $request->currency,
                'notes' => [],
            ]);
            $paymentHistory->payment_gateway_id = $orderDetails->id;

            $paymentHistory->save();
            DB::commit();
            return $this->sendResponse($paymentHistory, 'payment saved successfully.', true);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }
    public function athletePaymentVerification(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'payment_history_id' => 'required|numeric',
                'payment_gateway_id' => 'required|string',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $payment = PaymentHistory::where('payment_gateway_id', $request->payment_gateway_id)->find($request->payment_history_id);
            $payment->plan_start_date = now();
            $payment->plan_expiry_date = now()->addYear();
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
                $user = User::find(Auth::id());
                $user->status = true;
                $user->save();
                $data = [
                    'to_name' => $request->name,
                    'email' => Auth::user()->email,
                    'message' => $request->message,
                ];

                Mail::send('emails.athleteRegister', $data, function ($message) use ($data) {
                    $message->to($data['email'], $data['to_name'])
                        ->subject('Confirmation email');
                    $message->from(env('MAIL_FROM_ADDRESS'), 'SKI AND SNOWBOARD INDIA');
                });
                $adminData = [
                    'to_name' => 'Admin',
                    'email' => 'achalbhujbal2003@gmail.com',
                    'message' => 'A new athlete have registered.',

                ];
                Mail::send('emails.adminAthleteRegister', $adminData, function ($message) use ($adminData) {
                    $message->to($adminData['email'], $adminData['to_name'])
                        ->subject('New Athlete Registration');
                    $message->from(env('MAIL_FROM_ADDRESS'), 'SKI AND SNOWBOARD INDIA');
                });
            } else {
                $payment->status = "pending";
                $payment->save();
                return $this->sendError('Payment pending.');
            }
            return $this->sendResponse([], 'Athlete payment status saved successfully.', true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
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
            ]);
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            DB::beginTransaction();

            $user = User::query()->where('id', $request->id)->first();
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
            return back()->with('success', 'Profile Updated successfully!');
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }
    public function updateAchievement(Request $request)
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
            if ($request->has('certificate')) {
                $achievement->certificate = $this->saveFile($request->file('certificate'), 'Certificate');
            }
            $achievement->save();
            DB::commit();
            return $this->sendResponse($achievement->id, 'Achievement updated successfully.');
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
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
                return back()->withErrors($validator)->withInput();
            }
            $query = User::query()->with(['team', 'achievements', 'payment_history'])->where('role', 'athlete');
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
            $user = User::query()->where('email', $request->email)->first();
            if (!$user) {
                //return $this->sendError('User does not exist or user doesn\'t have access', [], 401);
                return back()->withErrors(['error' => 'User does not exist or user doesn\'t have access']);
            }
            if (Hash::check($request->password, $user->password)) {
                $token = JWTAuth::fromUser($user);
                $response = ['token' => $token];
                $response['userData'] = $user;
                Auth::login($user);
                //return $this->sendResponse($response, 'User logged in successfully.', 200);

                // Check user status
                if ($user->status == 1) {
                    return redirect('/');
                } else {
                    // return redirect('/razorpay-payment');
                    return redirect('/');
                }
            } else {

                return back()->withErrors(['error' => 'Invalid credentials']);
                //return $this->sendError("Invalid credentials.");

            }
        } catch (\Exception $e) {
            // Exception occurred


            //     ->withErrors(['error' => 'Something Went Wrong' . $e->getMessage()]);
            return back()->withErrors(['error' => 'Something weent wrong']);
            // return $this->sendError("Something weent wrong",$e->getMessage());
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

    public function addAssociationMember(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'first_name' => 'required|string|max:255',
                'middle_name' => 'nullable|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'mobile_no' => 'required|min:10|max:10',
                'password' => 'required|string',
                'name_of_state_unit' => 'nullable|string',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'date_of_establishment' => 'required|date',
                'incorporation_certificate_number' => 'required|string|max:255',
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
                'president_name' => 'required|string|max:255',
                'president_email' => 'required|string|email|max:255',
                'president_phone_number' => 'required|string|max:255',
                'president_signature' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'signature_of_bearer_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'signature_of_bearer_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'acknowledgement' => 'nullable|boolean|max:255',


            ]);

            if ($validator->fails()) {
                // return $this->sendError('Validation Error.', $validator->errors());
                return back()->withErrors($validator)->withInput();
            }
            DB::beginTransaction();
            $user = User::query()->where('email', $request->email)->first();
            if (!$user) {
                $user = new User();
                $user->email = $request->email;
                $user->first_name = $request->first_name;
                $user->middle_name = $request->middle_name;
                $user->mobile_no = $request->mobile_no;
                $user->password = Hash::make($request->password);
                if ($request->hasFile('logo')) {
                    $user->logo = $this->saveFile($request->file('logo'), 'AssociationMemberLogo');
                }
                $user->date_of_establishment = $request->date_of_establishment;
                $user->incorporation_certificate_number = $request->incorporation_certificate_number;
                $user->recognition_by_state_government = $request->recognition_by_state_government;
                $user->recognition_by_state_olympic_association = $request->recognition_by_state_olympic_association;
                $user->hosted_national_event_in_past_3_yrs = $request->hosted_national_event_in_past_3_yrs;
                $user->hosted_international_event_in_past_4_yrs = $request->hosted_international_event_in_past_4_yrs;
                $user->active_athletes_competed_in_past_2_yrs = $request->active_athletes_competed_in_past_2_yrs;
                $user->registered_address = $request->registered_address;
                $user->city = $request->city;
                $user->state = $request->state;
                $user->postal_code = $request->postal_code;
                $user->website = $request->website;
                $user->president_name = $request->president_name;
                $user->president_email = $request->president_email;
                $user->president_phone_number = $request->president_phone_number;
                if ($request->hasFile('president_signature')) {
                    $user->president_signature = $this->saveFile($request->file('president_signature'), 'PresidentSignature');
                }
                if ($request->hasFile('signature_of_bearer_1')) {
                    $user->signature_of_bearer_1 = $this->saveFile($request->file('signature_of_bearer_1'), 'Bearer1Signature');
                }
                if ($request->hasFile('signature_of_bearer_2')) {
                    $user->signature_of_bearer_2 = $this->saveFile($request->file('signature_of_bearer_2'), 'Bearer2Signature');
                }
                $user->acknowledgement = $request->acknowledgement;
                $user->save();
                $user->unique_code = $this->genarateCode($user->first_name, $user->last_name, $user->id, $user->gender);
                $user->save();
            }


            DB::commit();
            $data = Member::query()->where('id', $user->id)->with('user')->get();
            // return $this->sendResponse($data, 'Association Member added successfully.', true);
            return back()->with('success', 'Form Updated successfully!');
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }

    public function createPaymentAssociation(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                //'user_id' => 'required|exists:users,id',
                //'description' => 'nullable',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            DB::beginTransaction();

            $paymentHistory = new PaymentHistory();
            $paymentHistory->user_id = Auth::user()->id;
            $paymentHistory->type = 'member';
            $paymentHistory->amount = $request->amount;
            $paymentHistory->currency = $request->currency;
            $paymentHistory->payment_gateway = "razor-pay";

            $api = new Api(env('R_API_KEY'), env('R_API_SECRET'));
            $orderDetails = $api->order->create([
                'receipt' => 'Inv-' . $paymentHistory->id,
                'amount' => intval($request->amount * 100),
                'currency' => $request->currency,
                'notes' => [],
            ]);
            $paymentHistory->payment_gateway_id = $orderDetails->id;

            $paymentHistory->save();
            DB::commit();
            return $this->sendResponse($paymentHistory, 'payment saved successfully.', true);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }
    public function associationPaymentVerification(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'payment_history_id' => 'required|numeric',
                'payment_gateway_id' => 'required|string',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $payment = PaymentHistory::where('payment_gateway_id', $request->payment_gateway_id)->find($request->payment_history_id);
            $payment->plan_start_date = now();
            $payment->plan_expiry_date = now()->addYear();
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
                $user = User::find(Auth::id());
                $user->status = true;
                $user->save();
                $data = [
                    'to_name' => $request->name,
                    'email' => Auth::user()->email,
                    'message' => $request->message,
                ];

                Mail::send('emails.memberRegister', $data, function ($message) use ($data) {
                    $message->to($data['email'], $data['to_name'])
                        ->subject('New Athelete Registartion');
                    $message->from(env('MAIL_FROM_ADDRESS'), 'SKI AND SNOWBOARD INDIA');
                });
                $adminData = [
                    'to_name' => 'Admin',
                    'email' => 'achalbhujbal2003@gmail.com',
                    'message' => 'A new association have registered.',

                ];
                Mail::send('emails.adminAssociationRegister', $adminData, function ($message) use ($adminData) {
                    $message->to($adminData['email'], $adminData['to_name'])
                        ->subject('New association have registered');
                    $message->from(env('MAIL_FROM_ADDRESS'), 'SKI AND SNOWBOARD INDIA');
                });
            } else {
                $payment->status = "pending";
                $payment->save();
                return $this->sendError('Payment pending.');
            }
            return $this->sendResponse([], 'Association payment status saved successfully.', true);
        } catch (Exception $e) {
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


            ]);
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            DB::beginTransaction();

            $user = User::query()->where('id', $request->id)->first();
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
            return back()->with('success', 'Profile Updated successfully!');
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }
    public function getAssociationById(Request $request)
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
    public function getAthleteById(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:users,id'
            ]);

            if ($validator->fails()) {
                return $this->sendError("Validation failed", $validator->errors());
            }
            $athlete = User::query()->where('id', $request->id)->with(['team', 'achievements', 'payment_history'])->where('role', 'athlete')->first();
            if (!$athlete) {
                return $this->sendError('No data available.');
            }
            return $this->sendResponse($athlete, "Association fetched successfully.", true);
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
    public function forgetPasswordAdmin(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|exists:users,email',
            ]);
            if ($validator->fails()) {
                return $this->sendError("Validation failed.", $validator->errors());
            }
            $user = User::query()->where('email', $request->email)->first();
            if (!$user) {
                return $this->sendError('User does not exist or user doesn\'t have access.', [], 401);
            }
            $otp = rand(100000, 999999);
            $user->email_otp = $otp;
            $user->email_otp_expiry = Carbon::now()->addMinutes(5);
            $user->save();
            $to_email = $user->email;
            $data = array('otp' => $otp);
            Mail::send('emails.sendOtp', $data, function ($message) use ($to_email) {
                $message->to($to_email)
                    ->subject('Otp for Login');
                $message->from(env('MAIL_FROM_ADDRESS'), 'SKI AND SNOWBOARDS INDIA');
            });
            DB::commit();

            return back()->with('success', 'Otp sent successfully.')->with('showOtpScreen', true)->with('email', $request->email);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
    public function checkOtpAndLoginEmail(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|exists:users,email',
                'otp' => 'required|string',
            ]);
            if ($validator->fails()) {
                return $this->sendError("Validation failed.", $validator->errors());
            }
            $user = User::query()->where('email', $request->email)->first();
            if (!$user) {
                return $this->sendError('User does not exist or user doesn\'t have access.', [], 401);
            }
            if ($user->email_otp != $request->otp) {
                return $this->sendError("Validation failed.", ['otp' => 'Invalid OTP.']);
            }
            if ($user->email_otp_expiry < Carbon::now()) {
                return $this->sendError("Validation failed.", ['otp' => 'Expired OTP.']);
            }
            $user->email_otp = null;
            $user->email_otp_expiry = null;
            $user->save();
            DB::commit();

            session(['showOtpScreen' => false, 'showResetPasswordScreen' => true, 'email' => $request->email]);

            // Return a JSON response with success message
            return response()->json([
                'success' => true,
                'message' => 'OTP verified. You can now reset your password.',
            ]);
            return redirect()->back()->with('success', 'OTP verified. You can now reset your password.');
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
    public function updatePassword(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|exists:users,email',
                'password' => 'required|min:6|confirmed',
            ]);

            if ($validator->fails()) {
                return $this->sendError("Validation failed.", $validator->errors());
            }
            $user = User::where('email', $request->email)->first();
            if (!$user) {
                return $this->sendError('User not found.', [], 404);
            }
            $hashedPassword = Hash::make($request->password);
            $user->password = $hashedPassword;
            $user->save();
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Password updated successfully.',
                'redirect_url' => url('/login')
            ]);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
}
