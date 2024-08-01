<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //index
    public function index() {
        return view('backend.dashboard.index', [
            'totalArticles' => Article::count(),
            'totalCategories' => Category::count(),
            'latestArticles' => Article::with('Category')->where('status', '=', 1)->latest()->take(5)->get(),
            'popularArticles' => Article::with('Category')->where('status', '=', 1)->orderBy('views', 'DESC')->take(5)->get()
        ]);
    }
}
