<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\ProfileMadrasah;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        // Share variabel $madrasah ke semua view
        View::composer('*', function ($view) {
            $madrasah = ProfileMadrasah::first();
            $view->with('madrasah', $madrasah);
        });
    }
}
