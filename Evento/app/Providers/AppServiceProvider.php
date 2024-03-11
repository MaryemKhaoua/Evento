<?php

namespace App\Providers;

use App\Models\Category;
use App\Services\CategoryService;
use App\services\CategoryServiceInterface;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('*', function ($view) {


            $categories = Category::all();
            $view->with('categories', $categories);

    });
    Paginator::useBootstrap();
    }
}
