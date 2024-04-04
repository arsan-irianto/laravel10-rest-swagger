<?php

namespace App\Repositories;

use App\Interfaces\PhotoRepositoryIfc;
use App\Models\Photo;

class PhotoRepositoryImpl implements PhotoRepositoryIfc
{
    public function getPhotos(array $request)
    {
        $request['search'] = isset($request['search']) ?? '';

        return Photo::select([
                'photos.id',
                'photos.album_id',
                'photos.title',
                'photos.url',
                'photos.thumbnail_url',
            ])
            ->with(['album'])
            ->where('title', 'LIKE', "%" . $request['search'] . "%")
            ->orWhere('url', 'LIKE', "%" . $request['search'] . "%")
            ->orWhere('thumbnail_url', 'LIKE', "%" . $request['search'] . "%")
            ->orderBy($request['direction'], $request['order'])
            ->paginate($request['limit']);
    }

    public function getPhotoById(int $id)
    {
        return Photo::findOrFail($id);
    }

    public function createPhoto(array $request)
    {
        return Photo::create($request);
    }

    public function updatePhoto(array $request, $id)
    {
        if (isset($request['albumId'])) {
            $request['album_id'] = $request['albumId'];
            unset($request['albumId']);
        }

        if (isset($request['thumbnailUrl'])) {
            $request['thumbnail_url'] = $request['thumbnailUrl'];
            unset($request['thumbnailUrl']);
        }

        return Photo::whereId($id)->update($request);
    }

    public function deletePhoto(int $id)
    {
        return Photo::destroy($id);
    }
}
