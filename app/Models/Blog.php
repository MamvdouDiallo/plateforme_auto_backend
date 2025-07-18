<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = ["id"];
    public function tags() :BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'blog_tags');
    }
    public function user() :BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function avis() :HasMany
    {
        return $this->hasMany(Avis::class);
    }

    public function getAverageRatingAttribute(): float
    {
        return round($this->avis()->avg('rate'), 1);
    }
}
