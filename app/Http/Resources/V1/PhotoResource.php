<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PhotoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'albumId'      => $this->album_id,
            'id'           => $this->id,
            'title'        => $this->title,
            'url'          => $this->url,
            'thumbnailUrl' => $this->thumbnail_url,
        ];
    }
}
