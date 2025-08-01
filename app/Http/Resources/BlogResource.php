<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=>$this->id,
            "title"=>$this->title,
            "description"=>$this->description,
            "image"=>$this->image,
            "user"=>$this->user,
            "tags"=>$this->tags->map(fn ($tag) => [
                "id"=>$tag->id,
                "name"=>$tag->name
            ]),
            "date" => $this->created_at->format('Y-m-d'),
            "rate" => $this->average_rating
        ];
    }
}
