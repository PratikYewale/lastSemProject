<?php

namespace App\Http\Controllers\v1\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Sponsorship;
use Illuminate\Support\Facades\File;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Exception;
use Razorpay\Api\Api;



class SponsorshipController extends Controller
{
    public function createSponsorship(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'description' => 'nullable',
                'organization_name'=>'required',
                'organization_mail'=>'required',
                'organization_contact'=>'required',
                'address'=>'nullable',
                'plan'=>'nullable',
                'amount'=>'required',
                'currency'=>'required'

            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            DB::beginTransaction();
            $addSponsorship = new Sponsorship;
            $addSponsorship->description = $request->description;
            $addSponsorship->organization_name=$request->organization_name;
            $addSponsorship->organization_mail=$request->organization_mail;
            $addSponsorship->organization_contact=$request->organization_contact;
            $addSponsorship->address=$request->address;
            $addSponsorship->plan=$request->plan;
            $addSponsorship->currency=$request->currency;
            $addSponsorship->amount=$request->amount;
            if ($addSponsorship->save()) {
                $api = new Api(env('R_API_KEY'), env('R_API_SECRET'));
                $orderDetails = $api->order->create([
                    'receipt' => 'Inv-' . $addSponsorship->id,
                    'amount' => intval($request->amount * 100),
                    'currency' => $request->currency,
                    'notes' => [],
                ]);
                $addSponsorship->payment_gateway = "razor-pay";
                $addSponsorship->payment_gateway_id = $orderDetails->id;
                $addSponsorship->save();
            }
            $addSponsorship->save();
            DB::commit();
            return $this->sendResponse($addSponsorship, 'Sponsorship saved successfully.', true);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }

    public function sponsorshipPaymentVerification(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'sponsorhip_id'=>'required|numeric',
                'payment_gateway_id' => 'required|string',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $payment = Sponsorship::where('payment_gateway_id', $request->payment_gateway_id)->find($request->sponsorhip_id);
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
            return $this->sendResponse([], 'Sponsorship saved successfully.', true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }

    public function updateSponsorship(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:sponsorships,id'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            DB::beginTransaction();
            $updateSponsorship = Sponsorship::query()->where('id', $request->id)->first();
            if ($request->filled('description')) {
                $updateSponsorship->description = $request->description;
            }
            if ($request->filled('organization_name')) {
                $updateSponsorship->organization_name = $request->organization_name;
            }
            if ($request->filled('organization_mail')) {
                $updateSponsorship->organization_mail = $request->organization_mail;
            }
            if ($request->filled('organization_contact')) {
                $updateSponsorship->organization_contact = $request->organization_contact;
            }
            if ($request->filled('amount')) {
                $updateSponsorship->amount = $request->amount;
            }
            $updateSponsorship->save();
            DB::commit();
            return $this->sendResponse($updateSponsorship, 'Sponsorship updated successfully.', true);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
    public function getAllSponsorship(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'pageNo' => 'numeric',
                'limit' => 'numeric',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors(), 400);
            }
            $query = Sponsorship::query();
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
                $response['Sponsorship'] = $data;
                return $this->sendResponse($response, 'Data fetched successfully', true);
            } else {
                return $this->sendError("No data found.");
            }
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }

    public function deleteSponsorship(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:sponsorships,id'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $deleteSponsorship = Sponsorship::query()->where('id', $request->id)->first();
            $deleteSponsorship->delete();

            return $this->sendResponse($deleteSponsorship, 'Sponsorship deleted successfully.', true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
    public function getSponsorshipById(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:sponsorships,id'
            ]);

            if ($validator->fails()) {
                return $this->sendError("Validation failed.", $validator->errors());
            }
            $sponsorship = Sponsorship::query()->where('id', $request->id)->first();
            if (!$sponsorship) {
                return $this->sendError('No data available.');
            }
            return $this->sendResponse($sponsorship, "Sponsorship fetched successfully.", true);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
}
