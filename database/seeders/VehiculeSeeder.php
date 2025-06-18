<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Marque;
use App\Models\ModelVehicule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehiculeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transmissions = ['Automatique', 'Manuelle'];
        $etats = ['Neuf', 'Occasion'];
        $carburants = ['Essence', 'Diesel', 'Hybride', 'Électrique'];
        $conduites = ['Gauche', 'Droite'];
        $versions = ['Standard', 'Deluxe', 'Sport', 'Premium'];
        $options = ['Oui', 'Non'];
        $kilometrages = ['0', '5000', '15000', '30000', '60000', '90000'];

        $modelIds = ModelVehicule::pluck('id')->all();
        $marqueIds = Marque::pluck('id')->all();
        $categorieIds = Category::pluck('id')->all();

        for ($i = 0; $i < 30; $i++) {
            DB::table('vehicules')->insert([
                'type_transmission' => $transmissions[array_rand($transmissions)],
                'libelle' => 'Véhicule ' . ($i + 1),
                'etat' => $etats[array_rand($etats)],
                'type_carburant' => $carburants[array_rand($carburants)],
                'type_conduite' => $conduites[array_rand($conduites)],
                'version' => $versions[array_rand($versions)],
                'nombre_porte' => rand(2, 5),
                'nombre_place' => rand(2, 7),
                'traction' => 'Avant',
                'option_interieur' => $options[array_rand($options)],
                'option_exterieur' => $options[array_rand($options)],
                'option_security' => $options[array_rand($options)],
                'option_radio' => $options[array_rand($options)],
                'autre_option' => 'Climatisation, Bluetooth',
                'kilometrage' => $kilometrages[array_rand($kilometrages)],
                'prix' => rand(3_000_000, 15_000_000),
                'model_vehicule_id' => $modelIds[array_rand($modelIds)],
                'marque_id' => $marqueIds[array_rand($marqueIds)],
                'category_id' => $categorieIds[array_rand($categorieIds)],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
