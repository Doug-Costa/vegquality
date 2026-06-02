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

    public function blog()
    {
        $articles = \App\Models\Article::where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->get();
        return view('blog', compact('articles'));
    }

    public function contato()
    {
        return view('contato');
    }

    public function showArticle($slug)
    {
        $article = \App\Models\Article::where('slug', $slug)->where('status', 'published')->firstOrFail();
        return view('blog-detail', compact('article'));
    }
}
