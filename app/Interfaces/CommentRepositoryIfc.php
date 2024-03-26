<?php

namespace App\Interfaces;

interface CommentRepositoryIfc
{
    public function getComments(array $request);

    public function getCommentById(int $id);

    public function createComment(array $request);

    public function updateComment(array $request, int $id);

    public function deleteComment(int $id);
}
