@extends('layouts.app')

@section('title', 'Blog & Radar FLV | VegQuality - Consultoria para Agroindústria')
@section('meta_description', 'Acompanhe as últimas notícias, tendências de mercado, inovações tecnológicas e mudanças na legislação sanitária de vegetais frescos higienizados.')

@section('content')
<!-- Hero Interno -->
    <section class="internal-hero">
      <div class="container">
        <div class="breadcrumb animate-fade-up">
          <a href="{{ url('/') }}">Início</a>
          <span class="breadcrumb-separator">/</span>
          <span>Blog & Radar FLV</span>
        </div>
        <h1 class="internal-hero-title animate-fade-up delay-100">
          Blog & Radar FLV
        </h1>
        <p class="internal-hero-desc animate-fade-up delay-200">
          Novidades, legislação, tecnologia alimentar e estratégias de mercado para impulsionar sua agroindústria.
        </p>
      </div>
    </section>

    <!-- Blog Section con Filtros -->
    <section class="blog-section" style="background-color: var(--color-bg-base);">
      <div class="container">
        
        <!-- Barra de Filtros -->
        <div class="filter-bar animate-fade-up">
          <button class="filter-btn active" data-filter="all">Todos</button>
          <button class="filter-btn" data-filter="tecnologia">Tecnologia</button>
          <button class="filter-btn" data-filter="planejamento">Planejamento</button>
          <button class="filter-btn" data-filter="legislacao">Legislação</button>
          <button class="filter-btn" data-filter="agricultura-familiar">Agricultura Familiar</button>
        </div>

        <!-- Grid de Posts -->
        <div class="blog-grid animate-fade-up delay-100" id="blog-grid">
          @forelse($articles as $article)
            <div class="blog-card">
              <div class="blog-card-img-wrapper">
                @if($article->cover_image)
                  <img src="{{ asset('storage/' . $article->cover_image) }}" alt="{{ $article->title }}" class="blog-card-img">
                @else
                  <img src="{{ asset('assets/images/Veg-Oxi-200-Website.jpg') }}" alt="{{ $article->title }}" class="blog-card-img">
                @endif
              </div>
              <div class="blog-card-content">
                <div class="blog-card-meta">
                  <span class="blog-card-meta-item">
                    <i data-lucide="calendar"></i> 
                    {{ $article->published_at ? $article->published_at->translatedFormat('d M, Y') : $article->created_at->translatedFormat('d M, Y') }}
                  </span>
                  <span class="blog-card-meta-item">
                    <i data-lucide="user"></i> 
                    Roseane Bob
                  </span>
                </div>
                <h3 class="blog-card-title">{{ $article->title }}</h3>
                <p class="blog-card-desc">{{ $article->excerpt }}</p>
                <a href="{{ url('/radar/' . $article->slug) }}" class="blog-card-link">Leia Mais <i data-lucide="arrow-right"></i></a>
              </div>
            </div>
          @empty
            <p style="grid-column: 1/-1; text-align: center; color: var(--color-text-base); padding: 4rem 0;">Nenhum artigo publicado no momento.</p>
          @endforelse
        </div>

      </div>
    </section>
@endsection
