<?php

use App\Models\Post;
use Illuminate\Http\Response;

const API_ENDPOINT = '/api/v1/posts';

test('user can get list of posts', function () {
    Post::factory()->create();

    $this->json('get', API_ENDPOINT . "?direction=id&order=desc&limit=1")
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

    $this->json('get', API_ENDPOINT . "/" . $post->id)
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

    $this->json('post', API_ENDPOINT, $payload)
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

    $this->json('post', API_ENDPOINT, $payload)
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

    $this->json('put', API_ENDPOINT . "/" . $post->id, $payload)
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

    $this->json('patch', API_ENDPOINT . "/" . $post->id, $payload)
        ->assertStatus(Response::HTTP_OK)
        ->assertExactJson([
            'message' => 'Successfully update data',
        ]);
});

test('user can delete existing post', function () {
    $post = Post::factory()->create();

    $this->json('delete', API_ENDPOINT . "/" . $post->id)
        ->assertStatus(Response::HTTP_OK)
        ->assertExactJson([
            'message' => 'Successfully delete data',
        ]);
});
