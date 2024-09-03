<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    //
    public function show(string $slug) {
        return view ('frontend.post.show', [
            'article' => Article::where('slug', '=', $slug)->first(),
            'categories' => Category::latest()->get()
        ]);
    }
}
