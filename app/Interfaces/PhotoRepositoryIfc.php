<?php

namespace App\Interfaces;

interface PhotoRepositoryIfc
{
    public function getPhotos(array $request);

    public function getPhotoById(int $id);

    public function createPhoto(array $request);

    public function updatePhoto(array $request, int $id);

    public function deletePhoto(int $id);
}
