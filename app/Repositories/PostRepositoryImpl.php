<?php

namespace App\Repositories;

use App\Interfaces\PostRepositoryIfc;
use App\Models\Post;

class PostRepositoryImpl implements PostRepositoryIfc
{
    public function getPosts(array $request)
    {
        return Post::with(['user', 'comments'])
        ->where('title', 'LIKE', "%" . $request['search'] . "%")
        ->orWhere('body', 'LIKE', "%" . $request['search'] . "%")
        ->orderBy($request['direction'], $request['order'])
        ->paginate($request['limit']);
    }

    public function getPostById(int $id)
    {
        return Post::findOrFail($id);
    }

    public function createPost(array $request)
    {
        return Post::create($request);
    }

    public function updatePost(array $request, $id)
    {
        if (isset($request['userId'])) {
            $request['user_id'] = $request['userId'];
            unset($request['userId']);
        }

        return Post::whereId($id)->update($request);
    }

    public function deletePost(int $id)
    {
        return Post::destroy($id);
    }
}
