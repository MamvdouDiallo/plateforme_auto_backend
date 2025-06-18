<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['libelle' => 'Berline', 'description' => 'Voiture à 4 portes avec coffre'],
            ['libelle' => 'SUV', 'description' => 'Véhicule utilitaire sport'],
            ['libelle' => 'Coupé', 'description' => 'Voiture 2 portes sportive'],
            ['libelle' => 'Cabriolet', 'description' => 'Voiture décapotable'],
            ['libelle' => 'Pick-up', 'description' => 'Véhicule avec benne à l’arrière'],
            ['libelle' => 'Hatchback', 'description' => 'Voiture compacte avec hayon'],
            ['libelle' => 'Monospace', 'description' => 'Véhicule familial spacieux'],
            ['libelle' => 'Break', 'description' => 'Voiture allongée avec grand coffre'],
            ['libelle' => '4x4', 'description' => 'Véhicule à transmission intégrale'],
            ['libelle' => 'Utilitaire', 'description' => 'Véhicule pour usage professionnel'],
        ];

        DB::table('categories')->insert($categories);
    }
}
