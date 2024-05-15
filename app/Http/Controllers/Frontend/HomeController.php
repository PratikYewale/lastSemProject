<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Association;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Session;
use Exception;
use App\Models\News;


class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }
    public function donate()
    {
        return view('frontend.donate');
    }
    public function about()
    {
        try {
            $associations = Association::query();
            $associations = $associations->with([])->paginate(9);

            return view('frontend.about', compact('associations'));
        } catch (Exception $e) {

            return view('frontend.about');
        }
        // return view('frontend.about');
    }
    public function teams()
    {
        return view('frontend.teams');
    }
    public function services()
    {
        return view('frontend.services');
    }
    public function announcement()
    {
        try {
            $news = News::query();
            $news = $news->with([])->paginate(9);

            return view('frontend.announcement', compact('news'));
        } catch (Exception $e) {

            return redirect()->back()->with('error', 'Error fetching news.');
        }
        // return view('frontend.announcement');
    }
    public function registration()
    {
        return view('frontend.registration');
    }
    public function membership()
    {
        return view('frontend.membership');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function storeAssoction(Request $request)
    {
        $input = $request->all();

        if (!empty($input['razorpay_payment_id'])) {
            try {
                $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
                $payment = $api->payment->fetch($input['razorpay_payment_id']);

                // Capture payment
                $response = $api->payment->fetch($input['razorpay_payment_id'])
                    ->capture(['amount' => $payment['amount']]);
            } catch (Exception $e) {
                Session::put('error', $e->getMessage());
                return redirect()->back();
            }
        }

        Session::put('success', 'Payment successful');
        return redirect()->back();
    }
}
