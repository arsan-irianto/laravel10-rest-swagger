<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\V1\PostCollection;
use App\Http\Resources\V1\PostResource;
use App\Interfaces\PostRepositoryIfc;
use Illuminate\Http\Request;

/**
 * Class PostController.
 *
 * @author Arsan <arsan.irianto@gmail.com>
 * @since 2024-03-15
 */

class PostController extends Controller
{
    private PostRepositoryIfc $postRepo;

    public function __construct(PostRepositoryIfc $postRepo)
    {
        $this->postRepo = $postRepo;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return new PostCollection($this->postRepo->getPosts($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return new PostResource($this->postRepo->getPostById($id));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        return new PostResource($this->postRepo->createPost($request->all()));
    }

    /**
     * Update the specified resource in storage with PUT method.
     */
    public function update(UpdatePostRequest $request, int $id)
    {
        return _response_updated($this->postRepo->updatePost($request->all(), $id));
    }

    /**
     * Update the specified resource in storage with PATCH method.
     */
    public function updatePatch(UpdatePostRequest $request, int $id)
    {
        $this->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        return _response_deleted($this->postRepo->deletePost($id));
    }
}
