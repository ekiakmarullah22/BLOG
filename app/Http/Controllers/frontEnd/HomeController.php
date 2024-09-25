<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index() {

        return view('frontend.home.index', [
            'latest_post' => Article::with(['User','Category'])->latest()->first(),
            'articles' => Article::with(['User','Category'])->where('status', 1)->latest()->simplePaginate(4),
            
        ]);
    }

    public function about() {
        return view('frontend.home.about');
    }

    public function contact() {
        return view('frontend.home.contact');
    }

    public function sitemap() {
        return response()->view('frontend.sitemap', [
            'articles' => Article::latest()->get()
        ])->header('Content-Type', 'text/xml');
    }
}
