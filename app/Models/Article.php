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
     * Get clean array of tags (splitting concatenated comma-separated tags and stripping extra hashes).
     */
    public function getCleanTagsAttribute(): array
    {
        $tags = $this->tags;
        if (!$tags) {
            return [];
        }

        if (is_string($tags)) {
            $tags = json_decode($tags, true) ?? [$tags];
        }

        if (!is_array($tags)) {
            return [];
        }

        $result = [];
        foreach ($tags as $item) {
            if (!is_string($item)) {
                continue;
            }
            // Split by comma or semicolon or newline
            $parts = preg_split('/[,;\n\r]+/', $item, -1, PREG_SPLIT_NO_EMPTY);
            foreach ($parts as $part) {
                $cleaned = trim($part, "# \t\n\r\0\x0B");
                if (!empty($cleaned)) {
                    $result[] = $cleaned;
                }
            }
        }

        return array_values(array_unique($result));
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
