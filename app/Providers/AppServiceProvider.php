<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\User;
use App\Observers\BlogObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        Blog::observe(BlogObserver::class);

        \Illuminate\Pagination\Paginator::useBootstrap();
    }
}
