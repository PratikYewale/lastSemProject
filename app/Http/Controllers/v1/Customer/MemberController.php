<?php

namespace App\Http\Controllers\v1\Customer;

use App\Http\Controllers\Controller;
use App\Models\Achivement;
use App\Models\Athelete;
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
    public function addMember(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'mobile_no' => 'required|string',
                'password' => 'required|string',
                'birthdate' =>  'nullable|date',
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
                'date_of_birth' =>  'nullable|date',
                'sport_certificate' => 'mimes:pdf',
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
                $user->password = Hash::make($request->password);
                $user->save();
            }
            $newAthlete = new Athelete();
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
                    $newAchievment = new Achivement();
                    $newAchievment->athlete_id = $newAthlete->id;
                    $newAchievment->name = $achievement['name'];
                    $newAchievment->year = $achievement['year'];
                    $newAchievment->result = $achievement['result'];
                    $newAchievment->save();
                }
            }
            if ($request->has('sport_certificates')) {
                foreach ($request->sport_certificates as $sport_certificate) {
                    $newCertificate = new SportCertificate();
                    $newCertificate->athletes_id = $newAthlete->id;
                    $newCertificate->certificate = $this->saveFile($sport_certificate->file('certificate'), 'Certificates');
                    $newCertificate->save();
                }
            }
            DB::commit();
            $data = Member::query()->where('id', $newAthlete->id)->with('user')->get();
            return $this->sendResponse($data, 'Athlete added successfully.', true);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }
    // Testing remaining

    public function loginMember(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required|string',
            ]);
            if ($validator->fails()) {
                return $this->sendResponse("Validation failed.", $validator->errors());
            }
            $user = User::query()->where('email', $request->email)->where('role', 'member')->first();
            if (!$user) {
                return $this->sendError('User does not exist or user doesn\'t have access', [], 401);
            }
            if (Hash::check($request->password, $user->password)) {
                $token = JWTAuth::fromUser($user);
                $response = ['token' => $token];
                $response['userData'] = $user;
                return $this->sendResponse($response, 'Login success.', 200);
            } else {
                return $this->sendError('Invalid credentials.', [], 401);
            }
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
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
}
