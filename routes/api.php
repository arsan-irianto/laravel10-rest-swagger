<?php

use App\Http\Controllers\Api\V1\AlbumController;
use App\Http\Controllers\Api\V1\CommentController;
use App\Http\Controllers\Api\V1\PhotoController;
use App\Http\Controllers\Api\V1\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function () {

    Route::apiResource('posts', PostController::class);
    Route::get('posts/{id}/comments', [PostController::class, 'showComments'])->name('posts.showComments');
    Route::apiResource('comments', CommentController::class);
    Route::apiResource('albums', AlbumController::class);
    Route::get('albums/{id}/photos', [AlbumController::class, 'showPhotos'])->name('posts.showPhotos');
    Route::apiResource('photos', PhotoController::class);
});
