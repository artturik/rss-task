<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Service\TopWordsExtractor;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TopWordsExtractor::class, function ($app) {
            return new TopWordsExtractor();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
