<?php

namespace App\Repositories;

use App\Interfaces\CommentRepositoryIfc;
use App\Models\Comment;

class CommentRepositoryImpl implements CommentRepositoryIfc
{
    public function getComments(array $request)
    {
        $request['search'] = isset($request['search']) ?? '';

        return Comment::select([
                'comments.id',
                'comments.post_id',
                'comments.user_id',
                'comments.body',
                'users.name',
                'users.email',
            ])->with(['user'])
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->where('users.name', 'LIKE', "%" . $request['search'] . "%")
            ->orWhere('users.email', 'LIKE', "%" . $request['search'] . "%")
            ->orWhere('body', 'LIKE', "%" . $request['search'] . "%")
            ->orderBy($request['direction'], $request['order'])
            ->paginate($request['limit']);
    }

    public function getCommentById(int $id)
    {
        return Comment::findOrFail($id);
    }

    public function createComment(array $request)
    {
        return Comment::create($request);
    }

    public function updateComment(array $request, $id)
    {
        if (isset($request['userId'])) {
            $request['user_id'] = $request['userId'];
            unset($request['userId']);
        }

        return Comment::whereId($id)->update($request);
    }

    public function deleteComment(int $id)
    {
        return Comment::destroy($id);
    }
}
