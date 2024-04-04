<?php

namespace App\Providers;

use App\Interfaces\AlbumRepositoryIfc;
use App\Interfaces\CommentRepositoryIfc;
use App\Interfaces\PhotoRepositoryIfc;
use App\Interfaces\PostRepositoryIfc;
use App\Repositories\AlbumRepositoryImpl;
use App\Repositories\CommentRepositoryImpl;
use App\Repositories\PhotoRepositoryImpl;
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
        $this->app->bind(AlbumRepositoryIfc::class, AlbumRepositoryImpl::class);
        $this->app->bind(PhotoRepositoryIfc::class, PhotoRepositoryImpl::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
