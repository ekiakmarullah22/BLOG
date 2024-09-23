<?php

namespace App\Providers;

use App\Models\Config;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class TemplateProvider extends ServiceProvider
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
        // Provider Configurations
        View::composer('frontend.layout.template', function ($view) {
            $configKeys = ["logo", "blog_name", "title", "caption", "footer"];
            $config = Config::whereIn('name', $configKeys)->pluck('value', 'name');

            $view->with('config', $config);
        });

        // Provider Contact
        View::composer('frontend.home.contact', function ($view) {
            $configKeys = ["github", "twitter", "youtube"];
            $config = Config::whereIn('name', $configKeys)->pluck('value', 'name');

            $view->with('config', $config);
        });

    }
}
