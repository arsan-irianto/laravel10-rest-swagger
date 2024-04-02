<?php

use App\Models\Album;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Http\Response;

test('user can get list of albums', function () {
    Album::factory()
    ->has(User::factory())
    ->count(10)
    ->create();

    $this->getJson('api/v1/albums' . "?direction=news&order=desc&limit=1")
    ->assertStatus(Response::HTTP_OK)
    ->assertJsonStructure(
        [
        'data' => [
            '*' => [
                'userId',
                'id',
                'title',
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

test('user can get albums by id', function () {
    $album = Album::factory()
        ->has(User::factory())
        ->create();

    $this->getJson('api/v1/albums/' . $album->id)
    ->assertStatus(Response::HTTP_OK)
    ->assertExactJson([
        'userId' => $album->user_id,
        'id'     => $album->id,
        'title'  => $album->title,
    ]);
});

test('user can create new album', function () {
    $user = User::factory()->create();
    Album::factory()->create();

    $payload = [
        'userId' => $user->id,
        'title'  => 'new album',
    ];

    $this->postJson('api/v1/albums/', $payload)
        ->assertStatus(Response::HTTP_CREATED)
        ->assertJsonStructure([
            'userId',
            'title',
        ]);
});

test('user create new album with missing payload', function () {
    $payload = [
        'title' => 'new album',
    ];

    $this->postJson('api/v1/albums/', $payload)
        ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
        ->assertJsonStructure(['message', 'errors']);
});

test('user can update existing album with patch method', function () {
    $album = Album::factory()
        ->has(User::factory())
        ->create();

    $payload = [
        'title' => 'foo edit',
    ];

    $this->patchJson('api/v1/albums/' . $album->id, $payload)
        ->assertStatus(Response::HTTP_OK)
        ->assertExactJson([
            'message' => 'Successfully update data',
        ]);
});

test('user can delete existing album', function () {
    $album = Album::factory()
        ->has(User::factory())
        ->create();

    $this->deleteJson('api/v1/albums/' . $album->id)
        ->assertStatus(Response::HTTP_OK)
        ->assertExactJson([
            'message' => 'Successfully delete data',
        ]);
});

test('user can get list of photos by album id', function () {
    Album::factory()
        ->has(User::factory())
        ->create();

    Photo::factory()
        ->has(Album::factory())
        ->count(10)
        ->create();

    $this->getJson('api/v1/albums/' . 10 . '/photos')
    ->assertStatus(Response::HTTP_OK)
    ->assertJsonStructure([
        'data' => [
            '*' => [
                'albumId',
                'id',
                'title',
                'url',
                'thumbnailUrl',
            ],
        ],
    ])
    ->assertJsonStructure(
        [
            'data' => [
                '*' => [],
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
