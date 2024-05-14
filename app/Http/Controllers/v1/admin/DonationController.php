<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\Donor;
use App\Models\Honor;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Razorpay\Api\Api;
class DonationController extends Controller
{

    public function addDonation(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'first_name' => 'required|string|max:255',
                'honoree_first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'honoree_last_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'mobile_no' => 'required|min:10|max:10',
                'address_line1' => 'required|string',
                'zip' => 'required|numeric',
                'city' => 'required|string',
                'country' => 'required|string',
                'state' => 'required|string',
                'subscription_to_news' => 'boolean',
                'text_updates' => 'boolean',
                'future_contact' => 'boolean',
                'dedicate' => 'boolean',
                'cover_fees' => 'boolean',
                'donation_type' => 'required|in:onetime,monthly',
                'currency' => 'required',
                'amount' => 'required|numeric',
                'honor_type' => 'required|in:in honor of,in memory of',
            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            DB::beginTransaction();
            $newDonor = new Donor();
            $newDonor->first_name = $request->first_name;
            $newDonor->last_name = $request->last_name;
            $newDonor->email = $request->email;
            $newDonor->mobile_no = $request->mobile_no;
            $newDonor->address_line1 = $request->address_line1;
            $newDonor->address_line2 = $request->address_line2;
            $newDonor->zip = $request->zip;
            $newDonor->city = $request->city;
            $newDonor->state = $request->state;
            $newDonor->country = $request->country;
            $newDonor->comment = $request->comment;
            $newDonor->gift_allocation = $request->gift_allocation;
            $newDonor->subscription_to_news = $request->subscription_to_news;
            $newDonor->text_updates = $request->text_updates;
            $newDonor->future_contact = $request->future_contact;
            $newDonor->dedicate = $request->dedicate;
            $newDonor->cover_fees = $request->cover_fees;
            $newDonor->save();


            if ($newDonor->dedicate == true) {
                $newHonor = new Honor();
                $newHonor->donor_id = $newDonor->id;
                $newHonor->type =  $request->honor_type;
                $newHonor->honoree_first_name =  $request->honoree_first_name;
                $newHonor->honoree_last_name =  $request->honoree_last_name;
                $newHonor->save();
            }

            $newDonation = new Donation();
            $newDonation->type = $request->donation_type;
            $newDonation->currency = $request->currency;
            $newDonation->amount = $request->amount;
            $newDonation->donor_id = $newDonor->id;
            if ($newDonation->save()) {
                $api = new Api(env('R_API_KEY'), env('R_API_SECRET'));
                $orderDetails = $api->order->create([
                    'receipt' => 'Inv-' . $newDonation->id,
                    'amount' => intval($request->amount * 100),
                    'currency' => $request->currency,
                    'notes' => [],
                ]);
                $newDonation->payment_gateway = "razor-pay";
                $newDonation->payment_gateway_id = $orderDetails->id;
                $newDonation->save();
            }
            DB::commit();
            $data = Donor::query()->where('id', $newDonor->id)->with(['donations', 'honors'])->get();
            return $this->sendResponse($data, 'Donation added successfully.', true);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }
    public function donationPaymentVerification(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'donation_id' => 'required|numeric',
                'payment_gateway_id' => 'required|string',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $payment = Donation::where('payment_gateway_id', $request->payment_gateway_id)->find($request->donation_id);
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
            return $this->sendResponse([], 'Donated successfully.', true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }
    public function getAllDonors(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'first_name' => 'string',
                'last_name' => 'string',
                'limit' => 'integer',
                'pageNo' => 'integer',
            ]);
            if ($validator->fails()) {
                return $this->sendError("Validation failed.", $validator->errors());
            }
            $query = Donor::query()->with(['donations', 'honors']);
            if ($request->has('first_name')) {
                $query->where('name', 'like', '%' . $request->name . '%');
            }
            if ($request->has('last_name')) {
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
                return $this->sendError("No data found.");
            }
            return $this->sendResponse(['count' => $count, 'data' => $data], "Donors fetched successfully.", true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
    public function getDonorById(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:donors,id'
            ]);

            if ($validator->fails()) {
                return $this->sendError("Validation failed.", $validator->errors());
            }
            $faq = Donor::query()->where('id', $request->id)->with(['donations', 'honors'])->first();
            if (!$faq) {
                return $this->sendError('No data available.');
            }
            return $this->sendResponse($faq, "Donor fetched successfully.", true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
}
