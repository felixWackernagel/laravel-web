<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Quiz;
use App\Observers\QuizObserver;
use Illuminate\Support\Facades\Blade;

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
        $this->registerEloquentObservers();
        $this->registerBladeDirectives();
    }

    private function registerEloquentObservers()
    {
        Quiz::observe( QuizObserver::class );
    }


    private function registerBladeDirectives()
    {
        Blade::if('env', function( $env ) {
            return app()->environment( $env );
        });
    }
}
