<?php

namespace App\Providers;

use App\Http\Resources\V1\PostCollection;
use App\Http\Resources\V1\PostResource;
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
        PostResource::withoutWrapping();
    }
}
