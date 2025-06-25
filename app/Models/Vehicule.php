<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

use App\Models\Images;
use Illuminate\Support\Facades\Storage;

class Vehicule extends Model
{
    use HasFactory;



protected $fillable = [
    'type_transmission',
    'libelle',
    'etat',
    'type_carburant',
    'type_conduite',
    'version',
    'nombre_porte',
    'nombre_place',
    'traction',
    'option_interieur',
    'option_exterieur',
    'option_security',
    'option_radio',
    'autre_option',
    'kilometrage',
    'prix',
    'model_vehicule_id', // Notez le nom de la clé étrangère
    'marque_id',
    'category_id'
];


    public function images() : HasMany{
        return $this->hasMany(Images::class);
    }
    public function categorie() : BelongsTo{
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function marque() : BelongsTo{
        return $this->belongsTo(Marque::class);
    }
    public function modele() : BelongsTo{
        return $this->belongsTo(ModelVehicule::class, 'model_vehicule_id');
    }

}
