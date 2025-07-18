<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class BlogCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */  public function toArray(Request $request): array
{
    return [
        "message" => "",
        "debugMessage" => "",
        "data" => $this->collection,
        "status" => ResponseAlias::HTTP_ACCEPTED
    ];
}

    public function paginationInformation($request, $paginate, $default)
    {
        return [
            "links" => $default["meta"]["links"],
            "total" => $default["meta"]["total"]
        ];
    }
}
