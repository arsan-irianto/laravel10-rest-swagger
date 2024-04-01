<?php

namespace App\Interfaces;

interface AlbumRepositoryIfc
{
    public function getAlbums(array $request);

    public function getAlbumById(int $id);

    public function createAlbum(array $request);

    public function updateAlbum(array $request, int $id);

    public function deleteAlbum(int $id);
}
