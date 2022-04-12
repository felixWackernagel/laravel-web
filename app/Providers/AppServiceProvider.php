<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Quiz;
use App\Observers\QuizObserver;

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
        Quiz::observe( QuizObserver::class );
    }
}
