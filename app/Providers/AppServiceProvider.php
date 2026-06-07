<?php

namespace App\Providers;

use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }
    public function boot()
    {
        Validator::extend('video_size', function ($attribute, $value, $parameters, $validator) {
            $maxSize = config('app.max_video_size', 100 * 1024); // Default 100MB in KB
            return $value->getSize() <= ($maxSize * 1024);
        });

        Validator::replacer('video_size', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':max', config('app.max_video_size', 100), $message);
        });
    }

    /**
     * Bootstrap any application services.
     */
    // public function boot(): void
    // {
    //     Vite::prefetch(concurrency: 3);
    // }
}
