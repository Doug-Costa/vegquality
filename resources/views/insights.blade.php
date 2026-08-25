@extends('layouts.app')
@section('title', $page->title)
@section('meta_description', $page->meta_description)
@section('content')
@php
    $heroSection = $page?->sections->where('key', 'insights_hero')->first();
    $hero = $heroSection?->content;

    $cardsSection = $page?->sections->where('key', 'insights_cards')->first();
    $cards = $cardsSection?->content;

    $whyChooseSection = $page?->sections->where('key', 'insights_why_choose')->first();
    $whyChoose = $whyChooseSection?->content;
@endphp

<!-- Subpage Hero -->
@if(is_section_visible($heroSection))
<section class="subpage-hero">
  <div class="hero-bg-shape-1"></div>
  <div class="hero-bg-shape-2"></div>
  <div class="container">
    <h1 class="subpage-hero-title animate-fade-up">{{ trans_content($hero, 'title', 'Insights VegQuality') }}</h1>
    <p class="subpage-hero-subtitle animate-fade-up delay-100">{{ trans_content($hero, 'subtitle', 'Conhecimento e vivência na cadeia produtiva de vegetais frescos.') }}</p>
  </div>
</section>
@endif

<!-- Cards Section -->
@if(is_section_visible($cardsSection) && $cards)
<section class="home-insights-section">
  <div class="container">
    <div class="services-header animate-fade-up">
      <div class="services-tag">
        <span class="micro-badge-dot"></span>
        {{ trans_content($cards, 'badge', 'Insights') }}
      </div>
      <h2 class="services-title">
        {{ trans_content($cards, 'title', 'Áreas de Atuação Técnica') }}
      </h2>
    </div>

    <div class="home-insights-grid animate-fade-up delay-100">
      @foreach(data_get($cards, 'cards', []) as $card)
        <div class="home-insight-card">
          <div class="home-insight-icon-box">
            <i data-lucide="{{ data_get($card, 'icon', 'settings') }}"></i>
          </div>
          <h3 class="home-insight-title">{{ trans_content($card, 'title') }}</h3>
          <p class="home-insight-desc">
            {{ Str::limit(trans_content($card, 'description'), 300, '...') }}
            @if(strlen(trans_content($card, 'description')) > 300)
              <button type="button" class="leia-mais-btn" data-title="{{ trans_content($card, 'title') }}" data-text="{{ trans_content($card, 'description') }}">{{ __('Leia mais') }}</button>
            @endif
          </p>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endif

<!-- Why Choose Section -->
@if(is_section_visible($whyChooseSection) && $whyChoose)
<section class="why-choose-section">
  <div class="container">
    <div class="why-choose-banner animate-fade-up">
      <span class="why-choose-badge">{{ trans_content($whyChoose, 'badge', 'Diferencial') }}</span>
      <h2 class="why-choose-title">{{ trans_content($whyChoose, 'title', 'Por que nos Escolher?') }}</h2>
      <p class="why-choose-text">
        {{ trans_content($whyChoose, 'description') }}
      </p>
    </div>
  </div>
</section>
@endif

<!-- Modal de "Leia Mais" -->
<div id="leia-mais-modal" class="custom-modal">
  <div class="custom-modal-content">
    <button type="button" class="custom-modal-close" id="close-modal-btn">&times;</button>
    <h3 id="modal-title" class="custom-modal-title"></h3>
    <div id="modal-body" class="custom-modal-body"></div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('leia-mais-modal');
    const modalTitle = document.getElementById('modal-title');
    const modalBody = document.getElementById('modal-body');
    const closeBtn = document.getElementById('close-modal-btn');

    document.querySelectorAll('.leia-mais-btn').forEach(btn => {
      btn.addEventListener('click', function () {
        const title = this.getAttribute('data-title');
        const text = this.getAttribute('data-text');

        modalTitle.textContent = title;
        modalBody.textContent = text;

        modal.classList.add('active');
      });
    });

    if (closeBtn && modal) {
      closeBtn.addEventListener('click', function () {
        modal.classList.remove('active');
      });
      
      modal.addEventListener('click', function (e) {
        if (e.target === modal) {
          modal.classList.remove('active');
        }
      });
    }
  });
</script>
@endsection
