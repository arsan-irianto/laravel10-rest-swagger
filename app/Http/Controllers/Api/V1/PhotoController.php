<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePhotoRequest;
use App\Http\Requests\UpdatePhotoRequest;
use App\Http\Resources\V1\PhotoCollection;
use App\Http\Resources\V1\PhotoResource;
use App\Interfaces\PhotoRepositoryIfc;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    private PhotoRepositoryIfc $photoRepo;

    public function __construct(PhotoRepositoryIfc $photoRepo)
    {
        $this->photoRepo = $photoRepo;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return new PhotoCollection($this->photoRepo->getPhotos($request->all()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePhotoRequest $request)
    {
        return new PhotoResource($this->photoRepo->createPhoto($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return new PhotoResource($this->photoRepo->getPhotoById($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePhotoRequest $request, int $id)
    {
        return _response_updated($this->photoRepo->updatePhoto($request->all(), $id));
    }

    /**
     * Update the specified resource in storage with PATCH method.
     */
    public function updatePatch(UpdatePhotoRequest $request, int $id)
    {
        $this->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        return _response_deleted($this->photoRepo->deletePhoto($id));
    }
}
