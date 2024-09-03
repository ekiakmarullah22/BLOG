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

        $keyword = request()->input('keyword');

        if($keyword) {
            $articles = Article::with('Category')
                                ->where('status', 1)
                                ->where('title', 'LIKE', '%'. $keyword .'%')
                                ->latest()
                                ->simplePaginate(4);
        } else {
            $articles = Article::with('Category')->where('status', 1)->latest()->simplePaginate(4);
        }



        return view('frontend.home.index', [
            'latest_post' => Article::with('Category')->latest()->first(),
            'articles' => $articles,
            'categories' => Category::latest()->get()
        ]);
    }
}
