<?php

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Response;

test('user can get list of posts', function () {
    Post::factory()->create();

    $this->getJson('/api/v1/posts' . "?direction=id&order=desc&limit=1")
    ->assertStatus(Response::HTTP_OK)
    ->assertJsonStructure(
        [
        'data' => [
            '*' => [
                'id',
                'userId',
                'title',
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

test('user can get post by id', function () {
    $post = Post::factory()->create();

    $this->getJson('/api/v1/posts/' . $post->id)
    ->assertStatus(Response::HTTP_OK)
    ->assertExactJson([
        'id'     => $post->id,
        'userId' => $post->user_id,
        'title'  => $post->title,
        'body'   => $post->body,
    ]);
});

test('user can create new post', function () {
    $payload = [
        'title'  => 'foo',
        'body'   => 'bar',
        'userId' => 1,
    ];

    $this->postJson('/api/v1/posts/', $payload)
        ->assertStatus(Response::HTTP_CREATED)
        ->assertJsonStructure([
            'id',
            'userId',
            'title',
            'body',
        ]);
});

test('user create new post with missing payload', function () {
    $payload = [
        'title' => 'test title',
    ];

    $this->postJson('/api/v1/posts/', $payload)
        ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
        ->assertJsonStructure(['message', 'errors']);
});

test('user can update existing post with put method', function () {
    $post = Post::factory()->create();

    $payload = [
        'title'  => 'foo',
        'body'   => 'bar',
        'userId' => 1,
    ];

    $this->putJson('/api/v1/posts/' . $post->id, $payload)
        ->assertStatus(Response::HTTP_OK)
        ->assertExactJson([
            'message' => 'Successfully update data',
        ]);
});

test('user can update existing post with patch method', function () {
    $post = Post::factory()->create();

    $payload = [
        'title' => 'foo edit',
    ];

    $this->patchJson('/api/v1/posts/' . $post->id, $payload)
        ->assertStatus(Response::HTTP_OK)
        ->assertExactJson([
            'message' => 'Successfully update data',
        ]);
});

test('user can delete existing post', function () {
    $post = Post::factory()->create();

    $this->deleteJson('/api/v1/posts/' . $post->id)
        ->assertStatus(Response::HTTP_OK)
        ->assertExactJson([
            'message' => 'Successfully delete data',
        ]);
});

test('user can get list of comments by post id', function () {
    Comment::factory()
        ->has(Post::factory())
        ->has(User::factory())
        ->count(5)
        ->create();

    $this->getJson('api/v1/posts/' . 1 . '/comments')
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
