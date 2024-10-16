<?php

namespace App\Providers;

use App\Models\Status;
use App\Models\Classification;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        View::composer('layouts.sidebar', function ($view) {
            $statuses = Status::all();
            $classifications = Classification::all();

            // Use 'with' to pass each variable separately
            $view->with('statuses', $statuses)->with('classifications', $classifications);
        });
    }
}
