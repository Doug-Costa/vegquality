<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Columnist extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'avatar',
        'role',
        'bio',
    ];

    /**
     * Get the articles associated with the columnist.
     */
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
}
