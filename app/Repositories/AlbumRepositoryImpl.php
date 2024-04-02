<?php

namespace App\Repositories;

use App\Interfaces\AlbumRepositoryIfc;
use App\Models\Album;
use App\Models\Photo;

class AlbumRepositoryImpl implements AlbumRepositoryIfc
{
    public function getAlbums(array $request)
    {
        $request['search'] = isset($request['search']) ?? '';

        return Album::select([
                'albums.id',
                'albums.title',
                'users.id as user_id',
                'users.name',
            ])
            ->with('user')
            ->join('users', 'albums.user_id', '=', 'users.id')
            ->where('users.name', 'LIKE', "%" . $request['search'] . "%")
            ->orWhere('users.email', 'LIKE', "%" . $request['search'] . "%")
            ->orWhere('title', 'LIKE', "%" . $request['search'] . "%")
            ->orderBy($request['direction'], $request['order'])
            ->paginate($request['limit']);
    }

    public function getAlbumById(int $id)
    {
        return Album::findOrFail($id);
    }

    public function createAlbum(array $request)
    {
        return Album::create($request);
    }

    public function updateAlbum(array $request, $id)
    {
        if (isset($request['userId'])) {
            $request['user_id'] = $request['userId'];
            unset($request['userId']);
        }

        return Album::whereId($id)->update($request);
    }

    public function deleteAlbum(int $id)
    {
        return Album::destroy($id);
    }

    public function getAlbumPhotos(int $id, $paginate = false)
    {
        $photos = Photo::select([
            'photos.id',
            'photos.album_id',
            'photos.title',
            'photos.url',
            'photos.thumbnail_url',
        ])->with(['album'])
        ->join('albums', 'photos.album_id', '=', 'albums.id')
        ->join('users', 'albums.user_id', '=', 'users.id')
        ->where('album_id', $id);

        if ($paginate == true) {
            return $photos->paginate(10);
        }

        return $photos->get();
    }
}
