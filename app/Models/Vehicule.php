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
    'category_id',
    'path',
    'image1',
    'image2',
    'image3',
    'image4',
    'image5',
    'image6',
    'image7',
    'image8',
    'image9',
    'image10',
    'image11',
    'image12',
    'size',
    'condition',
    'engine',
    'cylinders',
    'color',
    'vin',
    'year',
    'description',
    'technical_sheet',
];
    
    public function getUrlAttribute()
    {
        return Storage::url($this->path);
    }
// Dans app/Models/Vehicule.php
public function getTempImagesAttribute()
{
    return $this->images->map(function($image) {
        return ['path' => $image->path];
    })->toArray();
}
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


    public function getImageUrlsAttribute()
    {
        return $this->images->map(function($image) {
            return Storage::url($image->path);
        });
    }


    public function getImages(){
        return array_filter([
            $this->image1,
            $this->image2,
            $this->image3,
            $this->image4,
            $this->image5,
            $this->image6,
            $this->image7,
            $this->image8,
            $this->image9,
            $this->image10,
            $this->image11,
            $this->image12
        ]);
    }

}
