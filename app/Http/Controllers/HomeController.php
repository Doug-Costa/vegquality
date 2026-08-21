<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $page = \App\Models\Page::with('sections')->where('slug', 'home')->first();
        
        $articles = \App\Models\Article::with('columnist')
            ->where('status', 'published')
            ->where(function ($q) {
                $q->where('published_at', '<=', now())
                  ->orWhereNull('published_at');
            })
            ->orderBy('published_at', 'desc')
            ->get();
            
        $homepageArticles = $articles->count() >= 6 ? $articles->take(6) : $articles->take(3);
        
        return view('home', compact('page', 'homepageArticles'));
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
        $page = \App\Models\Page::with('sections')->where('slug', 'contato')->first();
        return view('contato', compact('page'));
    }

    public function submitContato(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:30',
            'company' => 'nullable|string|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        try {
            \Illuminate\Support\Facades\Mail::send([], [], function ($message) use ($validated) {
                $message->to('vegquality@vegquality.com.br')
                    ->subject('Novo Contato do Site - Assunto: ' . $validated['subject'])
                    ->html(
                        '<h3>Novo contato recebido pelo site:</h3>' .
                        '<p><strong>Nome:</strong> ' . e($validated['name']) . '</p>' .
                        '<p><strong>E-mail:</strong> ' . e($validated['email']) . '</p>' .
                        '<p><strong>Telefone/WhatsApp:</strong> ' . e($validated['phone']) . '</p>' .
                        '<p><strong>Empresa/Agroindústria:</strong> ' . e($validated['company'] ?? 'Não informada') . '</p>' .
                        '<p><strong>Assunto:</strong> ' . e($validated['subject']) . '</p>' .
                        '<p><strong>Mensagem:</strong><br>' . nl2br(e($validated['message'])) . '</p>'
                    );
            });

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            \Log::error('Erro ao enviar e-mail de contato: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'error' => 'Ocorreu um erro ao enviar sua mensagem. Por favor, tente novamente mais tarde.'
            ], 500);
        }
    }

    public function vegOxi()
    {
        $page = \App\Models\Page::with('sections')->where('slug', 'veg-oxi')->first();
        return view('veg-oxi', compact('page'));
    }

    public function insights()
    {
        $page = \App\Models\Page::with('sections')->where('slug', 'insights')->first();
        return view('insights', compact('page'));
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

    public function switchLang($locale)
    {
        if (in_array($locale, ['pt', 'pt_BR', 'en'])) {
            $appLocale = $locale === 'en' ? 'en' : 'pt_BR';
            session(['locale' => $appLocale]);
        }
        return redirect()->back();
    }

    public function handleLocalizedRoute($lang, $any = null)
    {
        $appLocale = $lang === 'en' ? 'en' : 'pt_BR';
        session(['locale' => $appLocale]);

        $cleanPath = trim((string) $any, '/');
        $aliasMap = [
            'about-us' => 'empresa',
            'about' => 'empresa',
            'services' => 'servicos',
            'contact' => 'contato',
            'contact-us' => 'contato',
        ];

        if (isset($aliasMap[$cleanPath])) {
            $cleanPath = $aliasMap[$cleanPath];
        }

        return redirect($cleanPath ? '/' . $cleanPath : '/');
    }
}
