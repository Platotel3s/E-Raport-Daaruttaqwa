<?php

namespace App\Providers;

use App\Http\Middleware\Authenticate;
use Illuminate\Support\ServiceProvider;
use App\Models\Tugas;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        View::composer('layouts.navigation', function ($view) {
            $view->with('tugas', Tugas::latest()->first());
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void {}
}
