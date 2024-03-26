<?php

namespace App\Providers;

use App\Interfaces\CommentRepositoryIfc;
use App\Interfaces\PostRepositoryIfc;
use App\Repositories\CommentRepositoryImpl;
use App\Repositories\PostRepositoryImpl;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(PostRepositoryIfc::class, PostRepositoryImpl::class);
        $this->app->bind(CommentRepositoryIfc::class, CommentRepositoryImpl::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
