<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        return view('frontend.about');
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
        return view('frontend.announcement');
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

    

}
