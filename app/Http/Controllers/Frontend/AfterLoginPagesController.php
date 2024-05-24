<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\MediaGallery;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Achievement;
use Auth;
class AfterLoginPagesController extends Controller
{
    public function mediaGallery()
    {
        try {
            $gallery = MediaGallery::query();
            $gallery = $gallery->with([])->paginate(9);

            return view('frontend.afterAuthPages.mediaGallery', compact('gallery'));
        } catch (Exception $e) {

            return redirect()->back()->with('error', 'Error fetching gallery.');
        }
        
    }
    
    public function profile()
    {
        return view('frontend.afterAuthPages.profile');
    }

}
