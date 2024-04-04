<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;
use App\Http\Resources\V1\AlbumCollection;
use App\Http\Resources\V1\AlbumResource;
use App\Http\Resources\V1\PhotoCollection;
use App\Interfaces\AlbumRepositoryIfc;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    private AlbumRepositoryIfc $albumRepo;

    public function __construct(AlbumRepositoryIfc $albumRepo)
    {
        $this->albumRepo = $albumRepo;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return new AlbumCollection($this->albumRepo->getAlbums($request->all()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlbumRequest $request)
    {
        return new AlbumResource($this->albumRepo->createAlbum($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        return new AlbumResource($this->albumRepo->getAlbumById($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlbumRequest $request, int $id)
    {
        return _response_updated($this->albumRepo->updateAlbum($request->all(), $id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        return _response_deleted($this->albumRepo->deleteAlbum($id));
    }

    public function showPhotos($id)
    {
        return new PhotoCollection($this->albumRepo->getAlbumPhotos($id, true));
    }
}
