<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    //

    public function index() {

        $keyword = request()->input('keyword');

        if($keyword) {
            $articles = Article::with('Category')
                                ->where('status', 1)
                                ->where('title', 'LIKE', '%'. $keyword .'%')
                                ->latest()
                                ->paginate(10);
        } else {
            $articles = Article::with('Category')->where('status', 1)->latest()->paginate(10);
        }

        return view ('frontend.post.index', [
            'articles' => $articles,
            'keyword' => $keyword
        ]);
    }

    public function show(string $slug) {

        $article = Article::with('Category')->where('slug', '=', $slug)->firstOrFail();
        $article->increment('views');

        return view ('frontend.post.show', [
            'article' => $article,
        ]);
    }
}
