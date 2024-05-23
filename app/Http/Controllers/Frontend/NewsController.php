<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Plan;
class NewsController extends Controller
{
    public function news()
    {
        try {
            $news = News::query();
            $news = $news->with([])->paginate(9);

            return view('frontend.news.news', compact('news'));
        } catch (Exception $e) {

            return redirect()->back()->with('error', 'Error fetching news.');
        }
    }

    public function announcementDetails($id)
    {
        try {
            $recentNews = News::orderBy('created_at', 'desc')->take(5)->get();
            $news = News::findOrFail($id);

            return view('frontend.news.announcementDetails', compact('news', 'recentNews'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error fetching news details.');
        }
    }
    public function association()
    {
        return view('frontend.commonComponants.registration.associationRegistration');
    }
    public function athletes()
    {
        return view('frontend.commonComponants.registration.athletesRegistration');
    }
    public function sponsorship()
    {
        try {

            $plan = Plan::query()->where('type', 'sponsorship')->orderBy('created_at', 'desc')->take(3)->get();
            return view('frontend.commonComponants.registration.sponsorshipRegistration', compact('plan'));
        } catch (Exception $e) {
            return view('frontend.commonComponants.registration.sponsorshipRegistration');
        }
        
    }
}
