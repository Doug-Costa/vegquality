<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'title_en',
        'slug',
        'excerpt',
        'excerpt_en',
        'content',
        'content_en',
        'cover_image',
        'published_at',
        'status',
        'category',
        'tags',
        'author_name',
        'columnist_id',
    ];

    public function getDisplayTitleAttribute(): string
    {
        if (app()->getLocale() === 'en' && !empty($this->title_en)) {
            return $this->title_en;
        }
        return $this->title ?? '';
    }

    public function getDisplayExcerptAttribute(): string
    {
        if (app()->getLocale() === 'en' && !empty($this->excerpt_en)) {
            return $this->excerpt_en;
        }
        return $this->excerpt ?? '';
    }

    public function getDisplayContentAttribute(): string
    {
        if (app()->getLocale() === 'en' && !empty($this->content_en)) {
            return $this->content_en;
        }
        return $this->content ?? '';
    }

    protected $casts = [
        'published_at' => 'datetime',
        'tags' => 'array',
    ];

    /**
     * Get the columnist associated with the article.
     */
    public function columnist()
    {
        return $this->belongsTo(Columnist::class);
    }

    /**
     * Get related articles that share the same category or tags, excluding the current article.
     */
    public function getRelatedArticles($limit = 2)
    {
        return self::where('id', '!=', $this->id)
            ->where('status', 'published')
            ->where(function ($query) {
                $query->where('published_at', '<=', now())
                      ->orWhereNull('published_at');
            })
            ->where(function ($query) {
                if ($this->category) {
                    $query->where('category', $this->category);
                }
                if ($this->tags && is_array($this->tags) && count($this->tags) > 0) {
                    foreach ($this->tags as $tag) {
                        $query->orWhere('tags', 'like', '%' . json_encode($tag) . '%')
                              ->orWhere('tags', 'like', '%' . $tag . '%');
                    }
                }
            })
            ->latest('published_at')
            ->take($limit)
            ->get();
    }
}
