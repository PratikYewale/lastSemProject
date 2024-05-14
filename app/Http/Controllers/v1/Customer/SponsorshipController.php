<?php


namespace App\Http\Controllers\v1\Customer;

use App\Http\Controllers\Controller;
use App\Models\Sponsorship;
use Illuminate\Support\Facades\File;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
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
                return back()->withErrors($validator)->withInput();
            }

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
            $data = [
                'to_name' => $request->organization_name,
                'email' => $request->organization_mail,
                'message' => $request->message,
                'query'=>$addSponsorship,
            ];

            Mail::send('emails.sponsorship', $data, function ($message) use ($data) {
                $message->to($data['email'], $data['to_name'])
                    ->subject('Confirmation email');
                $message->from(env('MAIL_FROM_ADDRESS'), 'SKI AND SNOWBOARD INDIA');
            });
            $adminData = [
                'to_name' => 'Admin',
                'email' => 'achalbhujbal2003@gmail.com', 
                'message' => 'A new sponsorship have is recived.',
            ];

            Mail::send('emails.adminSponsorship', $adminData, function ($message) use ($adminData) {
                $message->to($adminData['email'], $adminData['to_name'])
                    ->subject('New Sponsorship recived');
                $message->from(env('MAIL_FROM_ADDRESS'), 'SKI AND SNOWBOARD INDIA');
            });
            return $this->sendResponse($addSponsorship, 'Sponsorship saved successfully.', true);
        } catch (Exception $e) {
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
}
