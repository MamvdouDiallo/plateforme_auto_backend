<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Vehicule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class NewColumnVehiculeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            Log::info('Début du seeding des nouvelles colonnes pour les véhicules...');

            $colors = ['Rouge', 'Bleu', 'Vert', 'Noir', 'Blanc', 'Argent', 'Gris', 'Jaune', 'Orange', 'Bordeaux'];
            $conditions = ['Neuf', 'Occasion', 'Reconditionné', 'En démonstration'];
            $engineTypes = ['V6', 'V8', 'V12', '4 cylindres', '6 cylindres', 'Moteur électrique', 'Hybride'];
            $sizes = ['Compact', 'Berline', 'SUV', '4x4', 'Monospace', 'Utilitaire'];
            
            $vehicules = Vehicule::all();
            
            if ($vehicules->isEmpty()) {
                Log::warning('Aucun véhicule trouvé dans la base de données.');
                return;
            }

            foreach ($vehicules as $vehicule) {
                $vehicule->update([
                    'size' => $sizes[array_rand($sizes)],
                    'condition' => $conditions[array_rand($conditions)],
                    'engine' => $engineTypes[array_rand($engineTypes)],
                    'cylinders' => in_array($vehicule->engine, ['V6', 'V8', 'V12']) ? substr($vehicule->engine, 1) : rand(4, 6),
                    'color' => $colors[array_rand($colors)],
                    'vin' => 'VIN' . Str::upper(Str::random(2)) . rand(1000, 9999) . Str::upper(Str::random(3)) . rand(10000, 99999),
                    'year' => rand(2015, date('Y')),
                    'description' => $this->generateDescription($vehicule),
                    'technical_sheet' => null // Vous pourriez ajouter des PDFs plus tard
                ]);
            }

            Log::info('Seeding terminé avec succès pour ' . $vehicules->count() . ' véhicules.');
            
        } catch (\Exception $e) {
            Log::error('Erreur lors du seeding: ' . $e->getMessage());
            throw $e;
        }
    }

    protected function generateDescription(Vehicule $vehicule): string
    {
        $descriptions = [
            "Superbe {$vehicule->libelle} en excellent état",
            "{$vehicule->libelle} {$vehicule->year} bien entretenu",
            "Véhicule spacieux et confortable, modèle {$vehicule->year}",
            "{$vehicule->libelle} parfait pour famille avec options premium"
        ];
        
        return $descriptions[array_rand($descriptions)] . ". " . 
               "Moteur {$vehicule->engine}, couleur {$vehicule->color}, {$vehicule->condition}.";
    }
}
