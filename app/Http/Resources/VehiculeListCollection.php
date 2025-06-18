<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;

class VehiculeListCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            // "message" => "Liste des demandes de".$user->prenom." ".$user->nom,
            "message" => "",
            "debugMessage" => "",
            "data" => $this->collection,
            "status" => Response::HTTP_ACCEPTED
        ];
    }

    public function paginationInformation($request, $paginate, $default)
    {
        return [
            "links" => $default["meta"]["links"],
            "total" => $default["meta"]["total"]
        ];
    }}
