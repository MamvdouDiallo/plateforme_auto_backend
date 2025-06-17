<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Dans app/Models/Role.php
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
