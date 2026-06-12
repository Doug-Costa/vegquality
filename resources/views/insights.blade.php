@extends('layouts.app')
@section('title', $page->title)
@section('meta_description', $page->meta_description)
@section('content')
@php
    $hero = $page?->sections->where('key', 'insights_hero')->first()?->content;
    $cards = $page?->sections->where('key', 'insights_cards')->first()?->content;
    $whyChoose = $page?->sections->where('key', 'insights_why_choose')->first()?->content;
@endphp

<!-- Subpage Hero -->
<section class="subpage-hero">
  <div class="hero-bg-shape-1"></div>
  <div class="hero-bg-shape-2"></div>
  <div class="container">
    <h1 class="subpage-hero-title animate-fade-up">{{ data_get($hero, 'title', 'Insights VegQuality') }}</h1>
    <p class="subpage-hero-subtitle animate-fade-up delay-100">{{ data_get($hero, 'subtitle', 'Conhecimento e vivência na cadeia produtiva de vegetais frescos.') }}</p>
  </div>
</section>

<!-- Cards Section -->
@if($cards)
<section class="home-insights-section">
  <div class="container">
    <div class="services-header animate-fade-up">
      <div class="services-tag">
        <span class="micro-badge-dot"></span>
        {{ data_get($cards, 'badge', 'Insights') }}
      </div>
      <h2 class="services-title">
        {{ data_get($cards, 'title', 'Áreas de Atuação Técnica') }}
      </h2>
    </div>

    <div class="home-insights-grid animate-fade-up delay-100">
      @foreach(data_get($cards, 'cards', []) as $card)
        <div class="home-insight-card">
          <div class="home-insight-icon-box">
            <i data-lucide="{{ data_get($card, 'icon', 'settings') }}"></i>
          </div>
          <h3 class="home-insight-title">{{ data_get($card, 'title') }}</h3>
          <p class="home-insight-desc">
            {{ data_get($card, 'description') }}
          </p>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endif

<!-- Why Choose Section -->
@if($whyChoose)
<section class="why-choose-section">
  <div class="container">
    <div class="why-choose-banner animate-fade-up">
      <span class="why-choose-badge">{{ data_get($whyChoose, 'badge', 'Diferencial') }}</span>
      <h2 class="why-choose-title">{{ data_get($whyChoose, 'title', 'Por que nos Escolher?') }}</h2>
      <p class="why-choose-text">
        {{ data_get($whyChoose, 'description') }}
      </p>
    </div>
  </div>
</section>
@endif
@endsection
