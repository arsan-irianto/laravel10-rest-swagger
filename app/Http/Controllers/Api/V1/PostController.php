<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\V1\PostCollection;
use App\Http\Resources\V1\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

/**
 * Class PostController.
 *
 * @author Arsan <arsan.irianto@gmail.com>
 * @since 2024-03-15
 */

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return new PostCollection(Post::with(['user', 'comments'])
            ->where('title', 'LIKE', "%" . $request->search . "%")
            ->orWhere('body', 'LIKE', "%" . $request->search . "%")
            ->orderBy($request->direction, $request->order)
            ->paginate($request->limit));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return new PostResource($post);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        return new PostResource(Post::create($request->all()));
    }

    /**
     * Update the specified resource in storage with PUT method.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        return _response_updated($post->update($request->all()));
    }

    /**
     * Update the specified resource in storage with PATCH method.
     */
    public function updatePatch(UpdatePostRequest $request, Post $post)
    {
        $this->update($request, $post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        return _response_deleted(Post::destroy($post->id));
    }
}