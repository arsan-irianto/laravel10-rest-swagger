<?php

namespace App\Repositories;

use App\Interfaces\AlbumRepositoryIfc;
use App\Models\Album;

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
}
