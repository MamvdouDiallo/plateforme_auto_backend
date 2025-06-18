<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $marques = [
            ['libelle' => 'Toyota', 'description' => 'Marque japonaise réputée pour sa fiabilité'],
            ['libelle' => 'Peugeot', 'description' => 'Constructeur automobile français'],
            ['libelle' => 'Ford', 'description' => 'Marque américaine historique'],
            ['libelle' => 'BMW', 'description' => 'Marque allemande haut de gamme'],
            ['libelle' => 'Hyundai', 'description' => 'Marque coréenne populaire'],
            ['libelle' => 'Kia', 'description' => 'Constructeur sud-coréen'],
            ['libelle' => 'Renault', 'description' => 'Constructeur français grand public'],
            ['libelle' => 'Volkswagen', 'description' => 'Marque allemande très connue'],
            ['libelle' => 'Audi', 'description' => 'Marque de luxe allemande'],
            ['libelle' => 'Honda', 'description' => 'Marque japonaise de voitures et motos'],
        ];

        DB::table('marques')->insert($marques);
    }
}
