<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['page_id', 'key', 'content', 'is_visible_pt', 'is_visible_en'];

    protected $casts = [
        'content' => 'array',
        'is_visible_pt' => 'boolean',
        'is_visible_en' => 'boolean',
    ];

    public function isVisible(?string $locale = null): bool
    {
        $locale = $locale ?? app()->getLocale();
        $isEn = ($locale === 'en' || str_starts_with($locale, 'en'));

        if ($isEn) {
            return (bool) ($this->is_visible_en ?? true);
        }

        return (bool) ($this->is_visible_pt ?? true);
    }

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
