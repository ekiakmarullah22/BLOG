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
            'latest_post' => Article::latest()->first(),
            'articles' => Article::latest()->get(),
            'categories' => Category::latest()->get()
        ]);
    }
}
