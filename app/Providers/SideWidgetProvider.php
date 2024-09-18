<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder;

class SideWidgetProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('frontend.layout.side-widget', function ($view) {
            // $category = Category::latest()->get();
            $category = Category::whereHas('Articles', function (Builder $query) {
                $query->where('status', 1);
            })->withCount(['Articles' => function($query) {
                $query->where('status', 1);
            }])->take(5)->latest()->get();
            

            $view->with('categories', $category);
        });

        // Provider Popular Post
        View::composer('frontend.layout.side-widget', function ($view) {
            $popular_post = Article::whereStatus('1')->orderBy('views', 'desc')->take(3)->get();

            $view->with('posts', $popular_post);
        });
    }
}
