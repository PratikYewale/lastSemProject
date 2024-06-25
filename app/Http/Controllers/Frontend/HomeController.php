<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Association;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Session;
use Exception;
use App\Models\News;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Event;
use App\Models\User;
use App\Models\Team;
use App\Models\Plan;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        try {
            $games = Team::query()->orderBy('created_at', 'desc')->take(3)->get();
            $news = News::query()->orderBy('created_at', 'desc')->take(3)->get();
            $plan = Plan::query()->where('type', 'sponsorship')->orderBy('created_at', 'desc')->take(3)->get();
            return view('frontend.index', compact('games', 'news','plan'));
        } catch (Exception $e) {
            return view('frontend.index');
        }
    }
    public function donate()
    {


        return view('frontend.donate');
    }
    public function about()
    {
        try {
            $associations = User::where('role', 'member')->paginate(9);

            return view('frontend.about', compact('associations'));
        } catch (Exception $e) {
            return view('frontend.about');
        }
    }

    public function services()
    {
        return view('frontend.services');
    }
    public function announcement()
    {
        try {
            $news = News::query();
            $news = $news->with([])->orderBy('created_at', 'desc')->paginate(6);

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
        try {
            $events = Event::query();
            $events = $events->with([])->paginate(9);

            return view('frontend.membership', compact('events'));
        } catch (Exception $e) {

            return view('frontend.membership');
        }
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

    // public function events()
    // {
    //     try {
    //         $events = Event::query();
    //         $events = $events->with([])->orderBy('created_at', 'desc')->paginate(9);
    //         // dd($events);

    //         return view('frontend.event', compact('events'));
    //     } catch (Exception $e) {

    //         return redirect()->back()->with('error', 'Error fetching events.');
    //     }

    // }
    public function events()
    {
        try {
            $currentDate = now();

            // Fetch past events
            $pastEvents = Event::where('end_date', '<', $currentDate)->orderBy('start_date', 'desc')->paginate(9, ['*'], 'past_page');

            // Fetch upcoming events
            $upcomingEvents = Event::where('start_date', '>', $currentDate)->orderBy('start_date', 'asc')->paginate(9, ['*'], 'upcoming_page');

            // Fetch ongoing events
            $ongoingEvents = Event::where('start_date', '<=', $currentDate)
                                  ->where('end_date', '>=', $currentDate)
                                  ->orderBy('start_date', 'asc')
                                  ->paginate(9, ['*'], 'ongoing_page');

            return view('frontend.event', compact('pastEvents', 'upcomingEvents', 'ongoingEvents'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error fetching events.');
        }
    }


    public function pastevents()
    {
        try {
            $events = Event::where('end_date', '<', Carbon::now())
                ->orderBy('created_at', 'desc')
                ->paginate(9);
            // dd($events);
            return view('frontend.pastevent', compact('events'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error fetching events.');
        }

    }
}
