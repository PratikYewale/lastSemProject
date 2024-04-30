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
    public function programs()
    {
        return view('frontend.programs');
    }
    public function competition()
    {
        return view('frontend.competition');
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
