<?php

namespace App\Http\Controllers\v1\Customer;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Membership;
use App\Models\MembershipHistory;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Razorpay\Api\Api;
use Tymon\JWTAuth\Facades\JWTAuth;

class MemberController extends Controller
{
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
            $newMember->is_athlete = false;
            $newMember->save();
            DB::commit();
            $data = Member::query()->where('id', $newMember->id)->with('user')->get();
            return $this->sendResponse($data, 'Member added successfully.', true);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }

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

    // Athlete Registration
    // public function addEventRegistration(Request $request)
    // {
    //     try {
    //         $validator = Validator::make($request->all(), [
    //             'event_ids' => 'required|array|distinct',
    //             'event_ids.*' => 'required|integer|exists:event_details,id',
    //             // Add validation for 'event_prices' if necessary
    //         ]);

    //         if ($validator->fails()) {
    //             return $this->sendError('Validation Error.', $validator->errors());
    //         }

    //         $user = Auth::user()->id;

    //         $eventPrices = [];
    //         $totalAmount = 0;

    //         foreach ($request->event_ids as $eventId) {
    //             $event = EventDetails::find($eventId);


    //             $existingRegistration = EventRegistration::whereJsonContains('event_prices', [['event_ids' => $eventId]])
    //                 ->where('user_id', $user)
    //                 ->where('payment_status', 'like', 'paid')
    //                 ->first();

    //             if (!is_null($existingRegistration)) {
    //                 return $this->sendResponse([], 'You are already registered for the event with ID', false);
    //             }
    //             $isMember = in_array('members', Auth::user()->roles->pluck('name')->toArray());
    //             $event_prices_by_event_id = $isMember ? $event->price_for_members : $event->price_for_students;
    //             $totalAmount += $event_prices_by_event_id;

    //             $eventPrices[] = [
    //                 'event_ids' => $eventId,
    //                 'event_prices' => $event_prices_by_event_id,
    //             ];
    //         }

    //         $newEventRegistration = new EventRegistration();
    //         $newEventRegistration->event_prices = json_encode($eventPrices);
    //         $newEventRegistration->user_id = $user;
    //         $newEventRegistration->gst_no = null;
    //         $newEventRegistration->legal_name = null;
    //         $newEventRegistration->attendance_status = null;
    //         $newEventRegistration->event_price = $totalAmount;
    //         $newEventRegistration->total_amount = $totalAmount;

    //         if ($newEventRegistration->save()) {
    //             $api = new Api(env('R_API_KEY'), env('R_API_SECRET'));
    //             $orderDetails = $api->order->create([
    //                 'receipt' => 'Inv-' . $newEventRegistration->id,
    //                 'amount' => intval($totalAmount) * 100,
    //                 'currency' => 'INR',
    //                 'notes' => [],
    //             ]);

    //             $newEventRegistration->razorpay_id = $orderDetails->id;
    //             $newEventRegistration->save();

    //             $response = [
    //                 'system_order_id' => $newEventRegistration->id,
    //                 'razorpay_order_id' => $newEventRegistration->razorpay_id,
    //                 'razorpay_api_key' => env('R_API_KEY'),
    //             ];

    //             return $this->sendResponse($response, 'Payment Initiated Successfully', true);
    //         }
    //     } catch (\Exception $e) {
    //         return $this->sendError('Something went wrong', $e->getMessage(), 413);
    //     }
    // }

    public function athleteRegistration(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'membership_id' => 'required|exists:membership,id',
            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            DB::beginTransaction();
            $user = Auth::user();
            $membership = Membership::findOrFail($request->membership_id);
            $member = Member::where('user_id', $user->id)->first();

            $membershipHistory = MembershipHistory::where('member_id', $member->id)
                ->where('end_date', '>=', now())
                ->first();

            if ($membershipHistory) {
                return $this->sendError("You already have an active subscription.");
            }

            $addMembershipHistory = new MembershipHistory();
            $addMembershipHistory->member_id = $member->id;
            $addMembershipHistory->membership_id = $membership->id;
            $addMembershipHistory->total_amount = $membership->selling_price;
            $addMembershipHistory->payment_gateway = "razor-pay";
            $addMembershipHistory->start_date = now();

            if ($membership->type == 'monthly') {
                $endDate = now()->addMonths(1);
            } elseif ($membership->type == 'yearly') {
                $endDate = now()->addMonths(12);
            }

            $addMembershipHistory->end_date = $endDate;

            if ($addMembershipHistory->save()) {
                $api = new Api(env('R_API_KEY'), env('R_API_SECRET'));
                $orderDetails = $api->order->create([
                    'receipt' => 'Inv-' . $addMembershipHistory->id,
                    'amount' => $membership->selling_price,
                    'currency' => 'INR',
                    'notes' => [],
                ]);

                $addMembershipHistory->payment_gateway_id = $orderDetails->id;
                $addMembershipHistory->save();

                $response = [
                    'system_order_id' => $addMembershipHistory->id,
                    'razorpay_order_id' => $addMembershipHistory->payment_gateway_id,
                    'razorpay_api_key' => env('R_API_KEY'),
                ];
                $user = User::findOrFail(Auth::User()->id);
                $user->role = 'athlete';
                $user->save();
                DB::commit();
                return $this->sendResponse($response, 'Payment initiated successfully.', true);
            }
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }

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
