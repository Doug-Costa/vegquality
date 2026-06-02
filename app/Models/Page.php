<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['slug', 'title', 'meta_description'];

    public function sections()
    {
        return $this->hasMany(Section::class);
    }
}
