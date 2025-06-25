<?php

namespace App\Observers;

use App\Models\Vehicule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class VehiculeObserver
{
    // public function created(Vehicule $vehicule)
    // {
    //    $tempImages = session()->pull('temp_vehicule_images', []);

    //     if (empty($tempImages)) {
    //         Log::warning('Aucune image trouvée dans la session', ['vehicule_id' => $vehicule->id]);
    //         return;
    //     }


    //     Storage::disk('public')->makeDirectory('vehicules/images');

    //     foreach ($tempImages as $index => $tempPath) {
    //         try {
    //             if (!Storage::disk('public')->exists($tempPath)) {
    //                 Log::error("Fichier temporaire introuvable", ['path' => $tempPath]);
    //                 continue;
    //             }

    //             $filename = basename($tempPath);
    //             $newPath = 'vehicules/images/'.$filename;

    //             Storage::disk('public')->move($tempPath, $newPath);

    //             $vehicule->images()->create([
    //                 'url' => $newPath,
    //                 'is_first' => $index === 0,
    //             ]);

    //             Log::info("Image déplacée avec succès", [
    //                 'from' => $tempPath,
    //                 'to' => $newPath
    //             ]);

    //         } catch (\Exception $e) {
    //             Log::error("Erreur traitement image", [
    //                 'error' => $e->getMessage(),
    //                 'trace' => $e->getTraceAsString()
    //             ]);
    //         }
    //     }

    // }
    public function created(Vehicule $vehicule)
{
    $images = session()->pull('temp_vehicule_images', []);
Log::info("Images récupérées :", ['images' => $images]);

    // Convertit en tableau si ce n'est pas déjà le cas
   // $images = is_array($images) ? $images : [$images];



// 1. Crée le dossier si inexistant
Storage::disk('public')->makeDirectory('vehicules/images');

foreach ($images as $index => $imagePath) {
    try {
        // 2. Vérification renforcée
        if (!Storage::disk('public')->exists($imagePath)) {
            Log::error("Fichier introuvable: $imagePath");
            continue;
        }

        // 3. Génération d'un nom unique
        $filename = 'vehicule_'.$vehicule->id.'_'.$index.'_'.time().'.'.pathinfo($imagePath, PATHINFO_EXTENSION);
        $newPath = 'vehicules/images/'.$filename;

        // 4. Déplacement avec vérification
        if (!Storage::disk('public')->move($imagePath, $newPath)) {
            throw new Exception("Échec du déplacement de $imagePath");
        }

        // 5. Création dans la base
        $vehicule->images()->create([
            'url' => $newPath,
            'is_first' => $index === 0,
        ]);

        Log::info("Image traitée", [
            'from' => $imagePath,
            'to' => $newPath
        ]);

    } catch (Exception $e) {
        Log::error("Erreur traitement image", [
            'file' => $imagePath,
            'error' => $e->getMessage()
        ]);
    }
}

}
}
