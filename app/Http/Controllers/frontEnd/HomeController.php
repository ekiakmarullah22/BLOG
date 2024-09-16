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
            'latest_post' => Article::with('Category')->latest()->first(),
            'articles' => Article::with('Category')->where('status', 1)->latest()->simplePaginate(4),
            'categories' => Category::latest()->get()
        ]);
    }

    public function about() {
        return view('frontend.home.about', [
            'categories' => Category::latest()->get()
        ]);
    }
}
