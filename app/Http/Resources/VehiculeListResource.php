<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VehiculeListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'marque' => $this->marque,
            'modele' => $this->modele,
            'categorie' => $this->categorie,
            'prix' => $this->prix,
            'images' => $this->resource->getImages(),
            'libelle' => $this->libelle,
            "kilometrage" => $this->kilometrage,
            "type_carburant" => $this->type_carburant,
            "type_transmission" => $this->type_transmission
        ];
    }
   
    public function getImages(){
        return array_filter([
            $this->image1,
            $this->image2,
            $this->image3,
            $this->image4,
            $this->image5,
        ]);
    }

}
