<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'libelle' => 'Pick-up',
            'description' => 'Véhicules sortis d\'usine'
        ]);

        Category::create([
            'libelle' => '4x4',
            'description' => 'Véhicules ayant déjà eu un propriétaire'
        ]);
    }
}
