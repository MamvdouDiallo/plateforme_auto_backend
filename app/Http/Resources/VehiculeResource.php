<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VehiculeResource extends JsonResource
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
            'libelle' => $this->libelle,
            "kilometrage" => $this->kilometrage,
            "type_carburant" => $this->type_carburant,
            "type_transmission" => $this->type_transmission,
            "images" => $this->getImages(),
            "type_conduite" => $this->type_conduite,
            "version" => $this->version,
            "nombre_porte" => $this->nombre_porte,
            "nombre_place" => $this->nombre_place,
            "traction" => $this->traction,
            "option_interieur" => $this->option_interieur,
            "option_exterieur" => $this->option_exterieur,
            "option_security" => $this->option_security,
            "option_radio" => $this->option_radio,
            "autre_option" => $this->autre_option,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            'size' => $this->size,
            'condition' => $this->condition,
            'engine' => $this->engine,
            'cylinders' => $this->cylinders,
            'color' => $this->color,
            'vin' => $this->vin,
            'year' => $this->year,
            'description' => $this->description,
            'technical_sheet' => $this->technical_sheet,
        ];
    }

}

