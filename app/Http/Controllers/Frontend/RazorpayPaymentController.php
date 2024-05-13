<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Session;
use Exception;

class RazorpayPaymentController extends Controller
{
    public function index()
    {
        return view('frontend.razorpayView');
    }

    public function payment(Request $request)
    {
        $input = $request->all();

        $api = new Api(env('RAZORPAY_KEY_ID'), env('RAZORPAY_KEY_SECRET'));

        if (isset($input['razorpay_payment_id']) && !empty($input['razorpay_payment_id'])) {
            try {
                $payment = $api->payment->fetch($input['razorpay_payment_id']);
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));
            } catch (Exception $e) {
                Session::flash('error', $e->getMessage());
                return redirect()->back();
            }
        }

        Session::flash('success', 'Payment successful');
        return redirect()->back();
    }
}
