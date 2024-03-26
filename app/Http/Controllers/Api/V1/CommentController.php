<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Http\Resources\V1\CommentCollection;
use App\Http\Resources\V1\CommentResource;
use App\Interfaces\CommentRepositoryIfc;
use App\Models\Comment;
use Illuminate\Http\Request;

/**
 * Class CommentController.
 *
 * @author Arsan <arsan.irianto@gmail.com>
 * @since 2024-03-15
 */

class CommentController extends Controller
{
    private CommentRepositoryIfc $commentRepo;

    public function __construct(CommentRepositoryIfc $commentRepo)
    {
        $this->commentRepo = $commentRepo;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return new CommentCollection($this->commentRepo->getComments($request->all()));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request)
    {
        return new CommentResource($this->commentRepo->createComment($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        return new CommentResource($comment);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, int $id)
    {
        return _response_updated($this->commentRepo->updateComment($request->all(), $id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        return _response_deleted($this->commentRepo->deleteComment($id));
    }
}
