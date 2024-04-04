<?php

use App\Models\Album;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Http\Response;

test('user can get list of photos', function () {
    Album::factory()
        ->has(User::factory())
        ->create();

    Photo::factory()
        ->has(Album::factory())
        ->count(10)
        ->create();

    $this->getJson('api/v1/photos' . "?direction=news&order=desc&limit=1")
    ->assertStatus(Response::HTTP_OK)
    ->assertJsonStructure(
        [
        'data' => [
            '*' => [
                'albumId',
                'id',
                'title',
                'url',
                'thumbnailUrl',
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

test('user can get photos by id', function () {
    Album::factory()
        ->has(User::factory())
        ->create();

    Photo::factory()
        ->has(Album::factory())
        ->count(10)
        ->create();
    $photo = Photo::first();

    $this->getJson('api/v1/photos/' . $photo->id)
    ->assertStatus(Response::HTTP_OK)
    ->assertExactJson([
        'albumId'      => $photo->album_id,
        'id'           => $photo->id,
        'title'        => $photo->title,
        'url'          => $photo->url,
        'thumbnailUrl' => $photo->thumbnail_url,
    ]);
});

test('user can create new photo', function () {
    $album = Album::factory()
        ->has(User::factory())
        ->create();

    $payload = [
        'albumId'      => $album->id,
        'title'        => 'new photo',
        'url'          => 'https://via.placeholder.com/600/92c952',
        'thumbnailUrl' => 'https://via.placeholder.com/150/92c952',
    ];

    $this->postJson('api/v1/photos/', $payload)
        ->assertStatus(Response::HTTP_CREATED)
        ->assertJsonStructure([
            'albumId',
            'id',
            'title',
            'url',
            'thumbnailUrl',
        ]);
});

test('user create new photo with missing payload', function () {
    $payload = [];

    $this->postJson('api/v1/photos/', $payload)
        ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
        ->assertJsonStructure(['message', 'errors']);
});

test('user can update existing photo with put method', function () {
    $album = Album::factory()
        ->has(User::factory())
        ->create();

    $photo = Photo::factory()
        ->has(Album::factory())
        ->create();

    $payload = [
        'albumId'      => $album->id,
        'title'        => 'new photo edit album',
        'url'          => 'https://via.placeholder.com/600/92c952',
        'thumbnailUrl' => 'https://via.placeholder.com/150/92c952',
    ];

    $this->putJson('/api/v1/photos/' . $photo->id, $payload)
        ->assertStatus(Response::HTTP_OK)
        ->assertExactJson([
            'message' => 'Successfully update data',
        ]);
});

test('user put existing photo with missing payload', function () {
    Album::factory()
        ->has(User::factory())
        ->create();

    $photo = Photo::factory()
        ->has(Album::factory())
        ->create();

    $payload = [
        'albumId'      => null,
        'title'        => 'new photo edit',
        'url'          => null,
        'thumbnailUrl' => null,
    ];

    $this->putJson('/api/v1/photos/' . $photo->id, $payload)
        ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
        ->assertJsonStructure(['message', 'errors']);
});

test('user can update existing photo with patch method', function () {
    $album = Album::factory()
        ->has(User::factory())
        ->create();

    Photo::factory()
        ->has(Album::factory())
        ->create();

    $photo = Photo::first();

    $payload = [
        'albumId'      => $album->id,
        'title'        => 'photo edit',
        'url'          => 'https://via.placeholder.com/600/92c952',
        'thumbnailUrl' => 'https://via.placeholder.com/150/92c952',
    ];

    $this->patchJson('api/v1/photos/' . $photo->id, $payload)
        ->assertStatus(Response::HTTP_OK)
        ->assertExactJson([
            'message' => 'Successfully update data',
        ]);
});

test('user patch existing photo with missing payload', function () {
    Album::factory()
        ->has(User::factory())
        ->create();

    Photo::factory()
        ->has(Album::factory())
        ->create();

    $photo = Photo::first();

    $payload = [
        'title' => 'photo edit title',
    ];

    $this->patchJson('/api/v1/photos/' . $photo->id, $payload)
        ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
        ->assertJsonStructure(['message', 'errors']);
});

test('user can delete existing photo', function () {
    $photo = Photo::factory()->create();

    $this->deleteJson('api/v1/photos/' . $photo->id)
        ->assertStatus(Response::HTTP_OK)
        ->assertExactJson([
            'message' => 'Successfully delete data',
        ]);
});
