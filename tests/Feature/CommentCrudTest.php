<?php

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Response;

test('user can get list of comments', function () {
    Comment::factory()
        ->has(Post::factory())
        ->has(User::factory())
        ->count(20)
        ->create();

    $this->getJson('api/v1/comments' . "?direction=news&order=desc&limit=1")
    ->assertStatus(Response::HTTP_OK)
    ->assertJsonStructure(
        [
        'data' => [
            '*' => [
                'id',
                'postId',
                'userId',
                'name',
                'email',
                'body',
            ],
        ],
        'links' => [
            'first',
            'last',
            'prev',
            'next',
        ],
        'meta' => [
            "current_page",
            "from",
            "last_page",
            "links" => [
                [
                "url",
                "label",
                "active",
                ],
            ],
            "path",
            "per_page",
            "to",
            "total",
        ],
    ],
    );
});

test('user can get comments by id', function () {
    $comment = Comment::factory()
        ->has(Post::factory())
        ->has(User::factory())
        ->create();

    $this->getJson('api/v1/comments/' . $comment->id)
    ->assertStatus(Response::HTTP_OK)
    ->assertExactJson([
        'id'     => $comment->id,
        'postId' => $comment->post_id,
        'userId' => $comment->user_id,
        'name'   => $comment->user->name,
        'email'  => $comment->user->email,
        'body'   => $comment->body,
    ]);
});

test('user can create new comment', function () {
    $post = Post::factory()->create();
    $user = User::factory()->create();

    $payload = [
        'postId' => $post->id,
        'userId' => $user->id,
        'body'   => 'new comment',
    ];

    $this->postJson('api/v1/comments/', $payload)
        ->assertStatus(Response::HTTP_CREATED)
        ->assertJsonStructure([
            'id',
            'postId',
            'userId',
            'name',
            'email',
            'body',
        ]);
});

test('user create new comment with missing payload', function () {
    $payload = [
        'body' => 'new comment',
    ];

    $this->postJson('api/v1/comments/', $payload)
        ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
        ->assertJsonStructure(['message', 'errors']);
});

test('user can update existing comment with patch method', function () {
    $comment = Comment::factory()
        ->has(Post::factory())
        ->has(User::factory())
        ->create();

    $payload = [
        'body' => 'foo edit',
    ];

    $this->patchJson('api/v1/comments/' . $comment->id, $payload)
        ->assertStatus(Response::HTTP_OK)
        ->assertExactJson([
            'message' => 'Successfully update data',
        ]);
});

test('user can delete existing comment', function () {
    $comment = Comment::factory()
        ->has(Post::factory())
        ->has(User::factory())
        ->create();

    $this->deleteJson('api/v1/comments/' . $comment->id)
        ->assertStatus(Response::HTTP_OK)
        ->assertExactJson([
            'message' => 'Successfully delete data',
        ]);
});
