<?php

namespace Database\Seeders;

use App\Models\ModelVehicule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelVehiculeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $modeles = [
            ['libelle' => 'Corolla', 'description' => 'Modèle populaire de Toyota'],
            ['libelle' => '208', 'description' => 'Modèle compact de Peugeot'],
            ['libelle' => 'Focus', 'description' => 'Modèle phare de Ford'],
            ['libelle' => 'X5', 'description' => 'SUV de luxe de BMW'],
            ['libelle' => 'Elantra', 'description' => 'Berline de Hyundai'],
            ['libelle' => 'Rio', 'description' => 'Modèle compact de Kia'],
            ['libelle' => 'Clio', 'description' => 'Citadine de Renault'],
            ['libelle' => 'Golf', 'description' => 'Compacte allemande célèbre'],
            ['libelle' => 'A4', 'description' => 'Berline premium Audi'],
            ['libelle' => 'Civic', 'description' => 'Voiture populaire de Honda'],
        ];

        DB::table('model_vehicules')->insert($modeles);
    }
}
