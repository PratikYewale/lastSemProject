<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function news()
    {
        try {
            $news = News::query();
            $news = $news->with([])->paginate(9);

            return view('frontend.news.news', compact('news'));
        } catch (Exception $e) {
           
            return redirect()->back()->with('error', 'Error fetching blogs.');
        }
    }
    
}
