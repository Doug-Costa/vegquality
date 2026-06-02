@extends('layouts.app')

@section('title', $article->title . ' | VegQuality - Radar FLV')
@section('meta_description', $article->excerpt)

@section('content')
<!-- Hero Interno -->
<section class="internal-hero">
  <div class="container">
    <div class="breadcrumb animate-fade-up">
      <a href="{{ url('/') }}">Início</a>
      <span class="breadcrumb-separator">/</span>
      <a href="{{ url('/radar') }}">Blog & Radar FLV</a>
      <span class="breadcrumb-separator">/</span>
      <span>Artigo</span>
    </div>
    <h1 class="internal-hero-title animate-fade-up delay-100" style="font-size: 2.25rem; line-height: 1.2; max-width: 900px;">
      {{ $article->title }}
    </h1>
    <div class="blog-card-meta animate-fade-up delay-200" style="margin-top: 1rem; display: flex; gap: 1.5rem; color: rgba(255, 255, 255, 0.9);">
      <span class="blog-card-meta-item" style="display: inline-flex; align-items: center; gap: 0.375rem;">
        <i data-lucide="calendar" style="width: 1rem; height: 1rem;"></i> 
        {{ $article->published_at ? $article->published_at->translatedFormat('d M, Y') : $article->created_at->translatedFormat('d M, Y') }}
      </span>
      <span class="blog-card-meta-item" style="display: inline-flex; align-items: center; gap: 0.375rem;">
        <i data-lucide="user" style="width: 1rem; height: 1rem;"></i> 
        Roseane Bob
      </span>
    </div>
  </div>
</section>

<!-- Artigo Content -->
<section class="contact-section" style="background-color: var(--color-bg-base); padding: 4rem 0;">
  <div class="container" style="max-width: 800px; margin: 0 auto;">
    @if($article->cover_image)
      <div style="margin-bottom: 2.5rem; border-radius: 24px; overflow: hidden; box-shadow: var(--shadow-md); border: 4px solid #ffffff;">
        <img src="{{ asset('storage/' . $article->cover_image) }}" alt="{{ $article->title }}" style="width: 100%; height: auto; display: block;">
      </div>
    @endif
    <div class="blog-detail-body" style="font-size: 1.125rem; line-height: 1.8; color: var(--color-text-base);">
      {!! $article->content !!}
    </div>
    
    <div style="margin-top: 4rem; padding-top: 2rem; border-top: 1px solid var(--color-border); display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
      <a href="{{ url('/radar') }}" class="btn btn-ghost" style="border-radius: 9999px;">
        <i data-lucide="arrow-left"></i>
        Voltar para o Blog
      </a>
      <a href="https://wa.me/551151940325" target="_blank" rel="noopener noreferrer" class="btn btn-primary" style="border-radius: 9999px;">
        <i data-lucide="message-circle"></i>
        Fale Conosco
      </a>
    </div>
  </div>
</section>
@endsection
