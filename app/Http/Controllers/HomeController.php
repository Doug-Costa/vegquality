<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $page = \App\Models\Page::with('sections')->where('slug', 'home')->first();
        return view('home', compact('page'));
    }

    public function empresa()
    {
        $page = \App\Models\Page::with('sections')->where('slug', 'empresa')->first();
        return view('empresa', compact('page'));
    }

    public function servicos()
    {
        $page = \App\Models\Page::with('sections')->where('slug', 'servicos')->first();
        return view('servicos', compact('page'));
    }

    public function blog(Request $request)
    {
        $query = \App\Models\Article::with('columnist')
            ->where('status', 'published')
            ->where(function ($q) {
                $q->where('published_at', '<=', now())
                  ->orWhereNull('published_at');
            });

        // Apply filters
        $activeCategory = $request->query('category');
        $activeTag = $request->query('tag');

        if ($activeCategory) {
            $query->where('category', $activeCategory);
        }

        if ($activeTag) {
            $query->where(function ($q) use ($activeTag) {
                $q->where('tags', 'like', '%' . json_encode($activeTag) . '%')
                  ->orWhere('tags', 'like', '%' . $activeTag . '%');
            });
        }

        // Paginated posts (5 per page)
        $articles = $query->orderBy('published_at', 'desc')
            ->paginate(5)
            ->withQueryString();

        // Get all published articles to extract unique categories and tags
        $allArticles = \App\Models\Article::where('status', 'published')
            ->where(function ($q) {
                $q->where('published_at', '<=', now())
                  ->orWhereNull('published_at');
            })
            ->get();

        // Extract distinct categories with counts
        $categories = $allArticles->groupBy('category')
            ->map(function ($items, $key) {
                return [
                    'name' => $key ?: 'Geral',
                    'count' => $items->count(),
                ];
            })
            ->values();

        // Extract distinct tags
        $tags = $allArticles->pluck('tags')
            ->flatten()
            ->filter()
            ->unique()
            ->values();

        // Get recent posts (top 5 published posts)
        $recentArticles = \App\Models\Article::where('status', 'published')
            ->where(function ($q) {
                $q->where('published_at', '<=', now())
                  ->orWhereNull('published_at');
            })
            ->orderBy('published_at', 'desc')
            ->take(5)
            ->get();

        return view('blog', compact('articles', 'categories', 'tags', 'recentArticles', 'activeCategory', 'activeTag'));
    }

    public function contato()
    {
        return view('contato');
    }

    public function showArticle($slug)
    {
        $article = \App\Models\Article::with('columnist')
            ->where('slug', $slug)
            ->where('status', 'published')
            ->where(function ($q) {
                $q->where('published_at', '<=', now())
                  ->orWhereNull('published_at');
            })
            ->firstOrFail();
            
        $relatedArticles = $article->getRelatedArticles(2);
        
        // If there are less than 2 related articles, fill the remaining with the most recent articles
        if ($relatedArticles->count() < 2) {
            $recent = \App\Models\Article::where('id', '!=', $article->id)
                ->where('status', 'published')
                ->where(function ($q) {
                    $q->where('published_at', '<=', now())
                      ->orWhereNull('published_at');
                })
                ->whereNotIn('id', $relatedArticles->pluck('id'))
                ->latest('published_at')
                ->take(2 - $relatedArticles->count())
                ->get();
            $relatedArticles = $relatedArticles->concat($recent);
        }

        return view('blog-detail', compact('article', 'relatedArticles'));
    }
}
