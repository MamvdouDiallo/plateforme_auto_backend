<?php

namespace Database\Seeders;

use App\Models\ModelVehicule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModelVehiculeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run()
{
    ModelVehicule::create([
        'libelle' => 'Peugeot 208',
        'description' => 'Compacte citadine populaire'
    ]);

    ModelVehicule::create([
        'libelle' => 'Renault Clio',
        'description' => 'Polyvalente et économique'
    ]);
}

}
