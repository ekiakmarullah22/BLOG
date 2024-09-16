<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class FrontCategoryController extends Controller
{
    //
    public function index(string $slugCategory) {

        return view('frontend.category.index', [
            'articles' => Article::with('Category')->whereHas('Category', function($q) use ($slugCategory) {
                $q->where('slug', $slugCategory);
            })->whereStatus(1)->latest()->paginate(10),
            'category' => $slugCategory
        ]);

    }
}
