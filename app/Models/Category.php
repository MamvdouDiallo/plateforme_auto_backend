<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'libelle',
        'description'
    ];

    public function vehicules() : HasMany
    {
        return $this->hasMany(Vehicule::class);
    }
}
