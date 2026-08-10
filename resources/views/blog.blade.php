@extends('layouts.app')

@section('title', 'Radar FLV | VegQuality - Consultoria para Agroindústria')
@section('meta_description', 'Acompanhe as últimas notícias, tendências de mercado, inovações tecnológicas e mudanças na legislação sanitária de vegetais frescos higienizados.')

@section('content')
<section class="internal-hero" style="background: linear-gradient(135deg, var(--color-veg-dark) 0%, #0d3c0f 100%);">
  <div class="container">
    <div class="breadcrumb animate-fade-up" style="color: rgba(255, 255, 255, 0.6) !important;">
      <a href="{{ url('/') }}" style="color: rgba(255, 255, 255, 0.85) !important;">{{ __('Início') }}</a>
      <span class="breadcrumb-separator" style="color: rgba(255, 255, 255, 0.4) !important;">/</span>
      <span style="color: rgba(255, 255, 255, 0.6) !important;">{{ __('Radar FLV') }}</span>
    </div>
    <h1 class="internal-hero-title animate-fade-up delay-100" style="color: #ffffff !important; text-shadow: none !important;">
      {{ __('Radar FLV') }}
    </h1>
    <p class="internal-hero-desc animate-fade-up delay-200" style="color: rgba(255, 255, 255, 0.8) !important;">
      {{ __('Novidades, legislação, tecnologia alimentar e estratégias de mercado para impulsionar sua agroindústria.') }}
    </p>
  </div>
</section>

<!-- Blog Section -->
<section class="blog-section" style="background-color: #fcfdfc; padding: 5rem 0;">
  <div class="container">
    
    <!-- Filtro Ativo Banner -->
    @if($activeCategory || $activeTag)
      <div class="blog-filter-banner animate-fade-up">
        <span class="text-veg-dark font-medium" style="display: inline-flex; align-items: center; gap: 0.5rem;">
          <i data-lucide="filter" style="width: 1.25rem; height: 1.25rem; color: var(--color-veg-primary);"></i>
          Filtrado por: 
          <strong>
            @if($activeCategory) Categoria: {{ $activeCategory }} @endif
            @if($activeTag) Tag: #{{ $activeTag }} @endif
          </strong>
        </span>
        <a href="{{ url('/radar') }}" class="text-sm text-veg-primary hover:text-veg-primary-hover underline font-bold" style="display: inline-flex; align-items: center; gap: 0.25rem; color: var(--color-veg-primary); font-weight: 700;">
          Limpar Filtro <i data-lucide="x" style="width: 1rem; height: 1rem;"></i>
        </a>
      </div>
    @endif

    <!-- Main Grid Layout (2 colunas em telas grandes) -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
      
      <!-- Coluna Principal (Posts - 8/12 da grade) -->
      <div class="lg:col-span-8 flex flex-col gap-12">
        
        @forelse($articles as $article)
          <!-- Card de Artigo Grande -->
          <article class="group bg-white rounded-[32px] overflow-hidden border border-gray-100 shadow-md hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 flex flex-col md:flex-row md:min-h-[320px]">
            
            <!-- Imagem do Artigo -->
            <div class="w-full md:w-[320px] relative overflow-hidden bg-gray-50 aspect-video md:aspect-auto md:self-stretch flex-shrink-0">
              @if($article->cover_image)
                <img src="{{ asset('storage/' . $article->cover_image) }}" alt="{{ $article->title }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
              @else
                <img src="{{ asset('assets/images/Veg-Oxi-200-Website.jpg') }}" alt="{{ $article->title }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
              @endif
              
              <!-- Categoria Flutuante -->
              @if($article->category)
                <span class="category-badge">
                  {{ $article->category }}
                </span>
              @endif
            </div>

            <!-- Conteúdo do Artigo -->
            <div class="blog-large-card-content">
              <div>
                <!-- Metadados -->
                <div class="flex flex-wrap items-center gap-5 text-xs font-semibold text-gray-400 mb-4">
                  <span class="flex items-center gap-1">
                    <i data-lucide="calendar" class="w-4 h-4 text-veg-primary"></i> 
                    {{ $article->published_at ? $article->published_at->translatedFormat('d \d\e M \d\e Y') : $article->created_at->translatedFormat('d \d\e M \d\e Y') }}
                  </span>
                  <span class="flex items-center gap-1">
                    <i data-lucide="user" class="w-4 h-4 text-veg-primary"></i> 
                    {{ $article->columnist ? $article->columnist->name : ($article->author_name ?: 'Roseane Bob') }}
                  </span>
                </div>

                <!-- Título -->
                <h2 class="text-xl md:text-2xl lg:text-[1.6rem] font-extrabold text-veg-dark mb-4 group-hover:text-veg-primary transition-colors duration-300 leading-tight">
                  <a href="{{ url('/radar/' . $article->slug) }}">
                    {{ $article->display_title }}
                  </a>
                </h2>

                <!-- Resumo -->
                <p class="text-sm md:text-base text-gray-500 leading-relaxed mb-5">
                  {{ Str::limit($article->display_excerpt, 240, '...') }}
                </p>
              </div>

              <div>
                <!-- Tags -->
                @if($article->tags && is_array($article->tags) && count($article->tags) > 0)
                  <div class="flex flex-wrap gap-1.5 mb-5">
                    @foreach($article->tags as $tag)
                      <a href="{{ url('/radar?tag=' . $tag) }}" class="text-[10px] font-bold text-veg-primary bg-veg-light/50 hover:bg-veg-light px-2.5 py-1 rounded-full border border-veg-primary/10 transition-colors">
                        #{{ $tag }}
                      </a>
                    @endforeach
                  </div>
                @endif

                <!-- Link Ler Mais -->
                <a href="{{ url('/radar/' . $article->slug) }}" class="inline-flex items-center gap-1.5 text-sm font-bold text-veg-primary hover:text-veg-primary-hover group-hover:translate-x-1 transition-transform duration-300">
                  Ler Artigo Completo 
                  <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </a>
              </div>
            </div>

          </article>
        @empty
          <div class="blog-empty-state">
            <i data-lucide="book-open" class="blog-empty-state-icon"></i>
            <h3 style="font-size: 1.25rem; font-weight: 800; color: var(--color-veg-dark); margin-bottom: 0.5rem;">Nenhum artigo encontrado</h3>
            <p style="color: #6b7280; font-size: 0.95rem;">Tente buscar por outras categorias ou tags.</p>
          </div>
        @endforelse

        <!-- Paginação Customizada -->
        @if($articles->hasPages())
          <nav class="flex flex-wrap justify-center items-center gap-2 mt-8">
            <!-- Números da página 1 a 5 (ou até a página final) -->
            @for($i = 1; $i <= min(5, $articles->lastPage()); $i++)
              <a href="{{ $articles->url($i) }}" 
                 class="w-12 h-12 rounded-full flex items-center justify-center font-bold transition-all duration-300 border-2 
                        {{ $articles->currentPage() === $i 
                           ? 'bg-veg-primary text-white border-veg-primary shadow-md shadow-veg-primary/20 scale-105' 
                           : 'bg-white text-gray-700 border-gray-100 hover:border-veg-primary hover:text-veg-primary hover:scale-105' }}">
                {{ $i }}
              </a>
            @endfor

            <!-- Próxima Página Link -->
            @if($articles->hasMorePages())
              <a href="{{ $articles->nextPageUrl() }}" 
                 class="px-5 h-12 rounded-full flex items-center justify-center font-bold bg-white text-veg-primary border-2 border-gray-100 hover:border-veg-primary hover:bg-veg-light transition-all duration-300 hover:scale-105 gap-1 text-sm shadow-sm">
                próxima página <i data-lucide="chevrons-right" class="w-4 h-4"></i>
              </a>
            @endif
          </nav>
        @endif

      </div>

      <!-- Coluna Lateral (Sidebar - 4/12 da grade) -->
      <aside class="lg:col-span-4 flex flex-col gap-12">
        
        <!-- Widget: Artigos Recentes -->
        <div class="bg-white rounded-[32px] border border-gray-100 shadow-md" style="padding: 2.25rem 2rem;">
          <h3 class="text-base font-extrabold text-veg-dark mb-6 pb-4 border-b border-veg-primary/10 flex items-center gap-2">
            <i data-lucide="sparkles" class="w-5 h-5 text-veg-primary animate-pulse"></i>
            Artigos Recentes
          </h3>
          <div style="height: 1.5rem;"></div>
          <div class="flex flex-col gap-6">
            @forelse($recentArticles as $recent)
              <a href="{{ url('/radar/' . $recent->slug) }}" class="group flex items-start gap-6 pb-6 border-b border-gray-100 last:border-b-0 last:pb-0 first:pt-0">
                <div class="w-16 h-16 rounded-2xl overflow-hidden bg-gray-50 flex-shrink-0 relative">
                  @if($recent->cover_image)
                    <img src="{{ asset('storage/' . $recent->cover_image) }}" alt="{{ $recent->title }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                  @else
                    <img src="{{ asset('assets/images/Veg-Oxi-200-Website.jpg') }}" alt="{{ $recent->title }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                  @endif
                </div>
                <div class="flex-grow pt-0.5">
                  <h4 class="text-xs font-extrabold text-gray-700 group-hover:text-veg-primary transition-colors leading-snug line-clamp-2">
                    {{ $recent->title }}
                  </h4>
                  <span class="text-[10px] text-gray-400 mt-2 block font-semibold">
                    {{ $recent->published_at ? $recent->published_at->translatedFormat('d M, Y') : $recent->created_at->translatedFormat('d M, Y') }}
                  </span>
                </div>
              </a>
            @empty
              <p class="text-xs text-gray-400">Nenhum artigo recente.</p>
            @endforelse
          </div>
        </div>

        <!-- Widget: Categorias -->
        <div class="bg-white rounded-[32px] border border-gray-100 shadow-md" style="padding: 2.25rem 2rem;">
          <h3 class="text-base font-extrabold text-veg-dark mb-5 pb-3 border-b border-veg-primary/10 flex items-center gap-2">
            <i data-lucide="tag" class="w-5 h-5 text-veg-primary"></i>
            Categorias
          </h3>
          
          <ul class="flex flex-col gap-3 list-none">
            @forelse($categories as $category)
              <li>
                <a href="{{ url('/radar?category=' . $category['name']) }}" 
                   class="flex items-center justify-between text-xs font-bold px-4 py-3 rounded-2xl transition-all duration-300 group
                          {{ $activeCategory === $category['name'] 
                             ? 'bg-veg-primary text-white shadow-md' 
                             : 'text-gray-600 bg-gray-50 hover:bg-veg-light hover:text-veg-primary hover:translate-x-1.5' }}">
                  <span>{{ $category['name'] }}</span>
                  <span class="w-5 h-5 text-[10px] rounded-full flex items-center justify-center font-extrabold transition-colors
                               {{ $activeCategory === $category['name'] 
                                  ? 'bg-white/20 text-white' 
                                  : 'bg-gray-200 text-gray-500 group-hover:bg-veg-primary group-hover:text-white' }}">
                    {{ $category['count'] }}
                  </span>
                </a>
              </li>
            @empty
              <li class="text-xs text-gray-400">Nenhuma categoria cadastrada.</li>
            @endforelse
          </ul>
        </div>

        <!-- Widget: Tags Principais -->
        <div class="bg-white rounded-[32px] border border-gray-100 shadow-md" style="padding: 2.25rem 2rem;">
          <h3 class="text-base font-extrabold text-veg-dark mb-5 pb-3 border-b border-veg-primary/10 flex items-center gap-2">
            <i data-lucide="hash" class="w-5 h-5 text-veg-primary"></i>
            Tags Principais
          </h3>
          
          <div class="flex flex-wrap gap-2">
            @forelse($tags as $tag)
              <a href="{{ url('/radar?tag=' . $tag) }}" 
                 class="text-xs font-bold px-4 py-2 rounded-full border transition-all duration-300 hover:scale-105
                        {{ $activeTag === $tag 
                           ? 'bg-veg-primary text-white border-veg-primary shadow-md' 
                           : 'bg-gray-50 text-gray-600 border-gray-100 hover:border-veg-primary hover:text-veg-primary hover:bg-veg-light' }}">
                #{{ $tag }}
              </a>
            @empty
              <p class="text-xs text-gray-400">Nenhuma tag cadastrada.</p>
            @endforelse
          </div>
        </div>

      </aside>

    </div>

  </div>
</section>
@endsection
