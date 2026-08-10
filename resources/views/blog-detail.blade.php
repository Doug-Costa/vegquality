@extends('layouts.app')

@section('title', $article->display_title . ' | VegQuality - Radar FLV')
@section('meta_description', $article->display_excerpt)

@section('content')
<!-- Hero Interno -->
<section class="internal-hero" style="background: linear-gradient(135deg, var(--color-veg-dark) 0%, #0d3c0f 100%);">
  <div class="container">
    <div class="breadcrumb animate-fade-up" style="color: rgba(255, 255, 255, 0.6) !important;">
      <a href="{{ url('/') }}" style="color: rgba(255, 255, 255, 0.85) !important;">{{ __('Início') }}</a>
      <span class="breadcrumb-separator" style="color: rgba(255, 255, 255, 0.4) !important;">/</span>
      <a href="{{ url('/radar') }}" style="color: rgba(255, 255, 255, 0.85) !important;">{{ __('Radar FLV') }}</a>
      <span class="breadcrumb-separator" style="color: rgba(255, 255, 255, 0.4) !important;">/</span>
      <span style="color: rgba(255, 255, 255, 0.6) !important;">Artigo</span>
    </div>
    <h1 class="internal-hero-title animate-fade-up delay-100" style="font-size: 2.25rem; line-height: 1.2; max-width: 900px; color: #ffffff !important; text-shadow: none !important;">
      {{ $article->display_title }}
    </h1>
    <div class="blog-card-meta animate-fade-up delay-200" style="margin-top: 1rem; display: flex; flex-wrap: wrap; gap: 1.5rem; color: rgba(255, 255, 255, 0.9) !important; font-size: 0.875rem;">
      <span class="blog-card-meta-item" style="display: inline-flex; align-items: center; gap: 0.375rem; color: rgba(255, 255, 255, 0.9) !important;">
        <i data-lucide="calendar" style="width: 1rem; height: 1rem; color: var(--color-veg-accent);"></i> 
        {{ $article->published_at ? $article->published_at->translatedFormat('d \d\e M, Y') : $article->created_at->translatedFormat('d \d\e M, Y') }}
      </span>
      <span class="blog-card-meta-item" style="display: inline-flex; align-items: center; gap: 0.375rem; color: rgba(255, 255, 255, 0.9) !important;">
        <i data-lucide="user" style="width: 1rem; height: 1rem; color: var(--color-veg-accent);"></i> 
        {{ $article->columnist ? $article->columnist->name : ($article->author_name ?: 'Roseane Bob') }}
      </span>
      @if($article->category)
        <span class="blog-card-meta-item" style="display: inline-flex; align-items: center; gap: 0.375rem; color: rgba(255, 255, 255, 0.9) !important;">
          <i data-lucide="tag" style="width: 1rem; height: 1rem; color: var(--color-veg-accent);"></i> 
          {{ $article->category }}
        </span>
      @endif
    </div>
  </div>
</section>

<!-- Artigo Content -->
<section class="blog-detail-section" style="background-color: #fcfdfc; padding: 5rem 0;">
  <div class="container" style="max-width: 900px; margin: 0 auto;">
    
    <!-- Imagem em Destaque -->
    @if($article->cover_image)
      <div style="margin-bottom: 3rem; border-radius: 32px; border-bottom-right-radius: 80px; overflow: hidden; box-shadow: var(--shadow-lg); border: 4px solid #ffffff;">
        <img src="{{ asset('storage/' . $article->cover_image) }}" alt="{{ $article->title }}" style="width: 100%; height: auto; display: block;">
      </div>
    @endif

    <!-- Corpo do Artigo -->
    <div class="blog-detail-body" style="font-size: 1.125rem; line-height: 1.8; color: var(--color-text-base);">
      {!! $article->display_content !!}
    </div>

    <!-- Tags do Artigo -->
    @if($article->tags && is_array($article->tags) && count($article->tags) > 0)
      <div style="margin-top: 3rem; padding-top: 1.5rem; border-top: 1px solid var(--color-border); display: flex; flex-wrap: wrap; gap: 0.5rem; align-items: center;">
        <span style="font-size: 0.875rem; font-weight: 700; color: var(--color-veg-dark); margin-right: 0.5rem;">Tags:</span>
        @foreach($article->tags as $tag)
          <a href="{{ url('/radar?tag=' . $tag) }}" class="text-xs font-bold text-veg-primary bg-veg-light/50 hover:bg-veg-primary hover:text-white px-3.5 py-1.5 rounded-full border border-veg-primary/10 transition-all">
            #{{ $tag }}
          </a>
        @endforeach
      </div>
    @endif

    <!-- Caixa de Autor (Colunista) Premium -->
    @php
      $hasColumnist = !empty($article->columnist);
      $authorName = $hasColumnist ? $article->columnist->name : ($article->author_name ?: 'Roseane Bob');
      $authorRole = $hasColumnist ? $article->columnist->role : 'Nutricionista & Especialista em Segurança Alimentar';
      $authorBio = $hasColumnist ? $article->columnist->bio : 'Nutricionista graduada e especializada em segurança dos alimentos e sustentabilidade, fundadora da VegQuality. Dedica-se a levar soluções de eficiência e extensão de shelf-life para a cadeia de hortifrúti.';
      $authorAvatar = $hasColumnist && $article->columnist->avatar ? asset('storage/' . $article->columnist->avatar) : asset('assets/images/Foto-Roseane-Bob-profissional.jpg');
    @endphp

    <div class="author-box-premium animate-fade-up" style="margin-top: 4rem; padding: 2.5rem; background: linear-gradient(135deg, #f7faf8 0%, #edf4f0 100%); border: 1px solid rgba(16, 185, 129, 0.15); border-radius: 24px; border-bottom-right-radius: 64px; display: flex; flex-direction: column; md:flex-direction: row; gap: 2rem; align-items: center; md:align-items: flex-start; box-shadow: var(--shadow-sm);">
      <div style="width: 100px; height: 100px; border-radius: 50%; overflow: hidden; border: 4px solid #ffffff; flex-shrink: 0; box-shadow: 0 4px 10px rgba(0,0,0,0.05); display: flex; align-items: center; justify-content: center; background-color: #ffffff;">
        <img src="{{ $authorAvatar }}" alt="{{ $authorName }}" style="width: 100%; height: 100%; object-fit: cover; display: block;">
      </div>
      <div style="flex-grow: 1; text-align: center; md:text-align: left;">
        <span style="font-size: 10px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.05em; color: var(--color-veg-primary); display: block; margin-bottom: 0.25rem;">Colunista / Autor</span>
        <h4 style="font-size: 1.25rem; font-weight: 800; color: var(--color-veg-dark); margin: 0 0 0.25rem 0;">{{ $authorName }}</h4>
        @if($authorRole)
          <p style="font-size: 0.825rem; font-weight: 700; color: #6b7280; margin: 0 0 0.75rem 0;">{{ $authorRole }}</p>
        @endif
        <p style="font-size: 0.95rem; line-height: 1.6; color: #4b5563; margin: 0;">{{ $authorBio }}</p>
      </div>
    </div>
    
    <!-- Ações e Compartilhamento -->
    <div style="margin-top: 3rem; padding-top: 2rem; border-top: 1px solid var(--color-border); display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
      <a href="{{ url('/radar') }}" class="btn btn-ghost" style="border-radius: 9999px;">
        <i data-lucide="arrow-left"></i>
        {{ __('Voltar para o Radar FLV') }}
      </a>
      <a href="https://wa.me/5511978348438" target="_blank" rel="noopener noreferrer" class="btn btn-primary" style="border-radius: 9999px;">
        <i data-lucide="message-circle"></i>
        {{ __('Fale Conosco') }}
      </a>
    </div>

    <!-- Seção de Artigos Recomendados/Relacionados -->
    <div style="margin-top: 6rem;">
      <h3 style="font-size: 1.75rem; font-weight: 800; color: var(--color-veg-dark); margin-bottom: 2rem; position: relative; display: inline-block;">
        Leituras Recomendadas
        <span style="display: block; width: 60px; height: 4px; background-color: var(--color-veg-primary); margin-top: 8px; border-radius: 2px;"></span>
      </h3>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @foreach($relatedArticles as $related)
          <div class="group bg-white rounded-3xl overflow-hidden border border-gray-100 shadow-md hover:shadow-2xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between" style="border-bottom-right-radius: 56px;">
            <div>
              <!-- Imagem da Recomendação -->
              <div style="width: 100%; aspect-ratio: 16/9; overflow: hidden; background-color: #f3f4f6; position: relative;">
                @if($related->cover_image)
                  <img src="{{ asset('storage/' . $related->cover_image) }}" alt="{{ $related->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                @else
                  <img src="{{ asset('assets/images/Veg-Oxi-200-Website.jpg') }}" alt="{{ $related->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                @endif
                
                @if($related->category)
                  <span class="category-badge-sm">
                    {{ $related->category }}
                  </span>
                @endif
              </div>

              <!-- Conteúdo da Recomendação -->
              <div style="padding: 1.5rem;">
                <div style="font-size: 11px; font-weight: 700; color: #9ca3af; margin-bottom: 0.5rem; display: flex; align-items: center; gap: 0.25rem;">
                  <i data-lucide="calendar" style="width: 0.75rem; height: 0.75rem; color: var(--color-veg-primary);"></i>
                  {{ $related->published_at ? $related->published_at->translatedFormat('d M, Y') : $related->created_at->translatedFormat('d M, Y') }}
                </div>

                <h4 style="font-size: 1.1rem; font-weight: 800; color: var(--color-veg-dark); line-height: 1.4; margin-bottom: 0.75rem;" class="group-hover:text-veg-primary transition-colors duration-300">
                  {{ $related->title }}
                </h4>

                <p style="font-size: 0.825rem; color: #6b7280; line-height: 1.5; margin-bottom: 1rem;">
                  {{ Str::limit(strip_tags($related->content), 300, '...') }}
                </p>
              </div>
            </div>

            <div style="padding: 0 1.5rem 1.5rem 1.5rem;">
              <a href="{{ url('/radar/' . $related->slug) }}" class="btn btn-ghost" style="border-radius: 9999px; width: 100%; font-size: 0.75rem; padding: 0.5rem 1rem;">
                Acessar Artigo <i data-lucide="arrow-right" class="w-4 h-4"></i>
              </a>
            </div>
          </div>
        @endforeach
      </div>
    </div>

  </div>
</section>
@endsection
