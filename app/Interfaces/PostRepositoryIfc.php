<?php

namespace App\Interfaces;

interface PostRepositoryIfc
{
    public function getPosts(array $request);

    public function getPostById(int $id);

    public function getPostComments(int $id, $paginate = false);

    public function createPost(array $request);

    public function updatePost(array $request, int $id);

    public function deletePost(int $id);
}
