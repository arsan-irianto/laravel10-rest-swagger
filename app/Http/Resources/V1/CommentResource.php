<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'postId' => $this->post_id,
            'id'     => $this->id,
            'name'   => $this->user->name,
            'email'  => $this->user->email,
            'body'   => $this->body,
        ];
    }
}
