<?php

namespace App\Providers;

use App\Models\About;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models\Category;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Paginator::useBootstrap();
        View::share('topCategories',Category::withCount('posts')->orderBy('posts_count','desc')->take(5)->get());
        View::share('about',About::first());
    }
}
