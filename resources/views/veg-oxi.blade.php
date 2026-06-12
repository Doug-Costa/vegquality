@extends('layouts.app')
@section('title', $page->title)
@section('meta_description', $page->meta_description)
@section('content')
@php
    $hero = $page?->sections->where('key', 'veg_oxi_hero')->first()?->content;
    $facts = $page?->sections->where('key', 'veg_oxi_facts')->first()?->content;
    $downloads = $page?->sections->where('key', 'veg_oxi_downloads')->first()?->content;
    $contacts = $page?->sections->where('key', 'veg_oxi_contacts')->first()?->content;
@endphp

<!-- Subpage Hero -->
<section class="subpage-hero">
  <div class="hero-bg-shape-1"></div>
  <div class="hero-bg-shape-2"></div>
  <div class="container">
    <h1 class="subpage-hero-title animate-fade-up">{{ data_get($hero, 'title', 'Veg Oxi 200') }}</h1>
    <p class="subpage-hero-subtitle animate-fade-up delay-100">{{ data_get($hero, 'subtitle', 'Tecnologia inovadora para conservação e qualidade de vegetais frescos.') }}</p>
  </div>
</section>

<!-- Facts Section -->
@if($facts)
<section class="facts-section" style="background-color: #ffffff; padding: 5rem 0;">
  <div class="container">
    <div class="services-header animate-fade-up">
      <div class="services-tag">
        <span class="micro-badge-dot"></span>
        {{ data_get($facts, 'badge', 'Por Trás do Produto') }}
      </div>
      <h2 class="services-title">
        {{ data_get($facts, 'title', 'Fatos sobre o Veg Oxi 200') }}
      </h2>
    </div>

    <div class="facts-grid animate-fade-up delay-100">
      @foreach(data_get($facts, 'cards', []) as $index => $card)
        <div class="fact-card">
          <div class="fact-card-icon">
            <i data-lucide="{{ data_get($card, 'icon', 'info') }}"></i>
          </div>
          <h3 class="fact-card-title">{!! nl2br(e(data_get($card, 'title'))) !!}</h3>
          <p class="fact-card-desc">
            {{ data_get($card, 'desc') }}
          </p>
          <span class="fact-card-link" data-modal-target="modal-fact-{{ $index }}">
            Saiba Mais
            <i data-lucide="chevron-right"></i>
          </span>
        </div>
      @endforeach
    </div>
  </div>
</section>

<!-- Modals for Facts -->
@foreach(data_get($facts, 'cards', []) as $index => $card)
  <div id="modal-fact-{{ $index }}" class="modal-overlay">
    <div class="modal-container">
      <button class="modal-close" aria-label="Fechar Modal">
        <i data-lucide="x"></i>
      </button>
      <h3 class="modal-title">{{ data_get($card, 'title') }}</h3>
      <div class="modal-body">
        <p>{!! nl2br(e(data_get($card, 'body'))) !!}</p>
      </div>
    </div>
  </div>
@endforeach
@endif

<!-- Downloads / Detalhes Adicionais Section -->
@if($downloads)
<section class="resources-section" style="background-color: #f9fafb; padding: 5rem 0;">
  <div class="container">
    <div class="services-header animate-fade-up">
      <div class="services-tag">
        <span class="micro-badge-dot"></span>
        {{ data_get($downloads, 'badge', 'Saiba Mais') }}
      </div>
      <h2 class="services-title">
        {{ data_get($downloads, 'title', 'Detalhes Adicionais') }}
      </h2>
    </div>

    <div class="download-grid animate-fade-up delay-100">
      @foreach(data_get($downloads, 'downloads', []) as $dl)
        <div class="download-card">
          <div class="download-card-icon">
            <i data-lucide="file-text"></i>
          </div>
          <h3>{{ data_get($dl, 'title') }}</h3>
          <p>{{ data_get($dl, 'desc') }}</p>
          @php
            $fileUrl = data_get($dl, 'file');
            $isAssetFile = Str::startsWith($fileUrl, 'downloads/');
          @endphp
          <a href="{{ $isAssetFile ? asset($fileUrl) : asset('storage/' . $fileUrl) }}" download class="btn-download">
            <i data-lucide="download"></i>
            Baixe o PDF
          </a>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endif

<!-- Contacts / Distribuição Section -->
@if($contacts)
<section class="resources-section" style="background-color: #ffffff; padding: 5rem 0;">
  <div class="container">
    <div class="services-header animate-fade-up">
      <div class="services-tag">
        <span class="micro-badge-dot"></span>
        {{ data_get($contacts, 'badge', 'Distribuição') }}
      </div>
      <h2 class="services-title">
        {{ data_get($contacts, 'title', 'Distribuição Veg Oxi 200') }}
      </h2>
    </div>

    <div class="local-grid animate-fade-up delay-100">
      @foreach(data_get($contacts, 'contacts', []) as $contact)
        <div class="local-card">
          <div class="local-card-icon">
            <i data-lucide="map-pin"></i>
          </div>
          <h4>{{ data_get($contact, 'title') }}</h4>
          <p>{{ data_get($contact, 'desc') }}</p>
          <a href="{{ data_get($contact, 'link') }}" target="_blank" rel="noopener noreferrer" class="btn-local-cta">
            Fale Conosco
          </a>
        </div>
      @endforeach
    </div>

    <!-- Combo Promo Banner -->
    @if(data_get($contacts, 'promo_title'))
      <div class="promo-banner animate-fade-up delay-200" style="margin-top: 4rem;">
        <div class="promo-content-wrapper">
          <h3 class="promo-title">
            {{ data_get($contacts, 'promo_title') }}
          </h3>
          <a href="{{ data_get($contacts, 'promo_cta_link') }}" target="_blank" rel="noopener noreferrer" class="btn-promo-action">
            <i data-lucide="gift" style="margin-right: 0.5rem; width: 1.25rem; height: 1.25rem;"></i>
            {{ data_get($contacts, 'promo_cta_text') }}
          </a>
        </div>
      </div>
    @endif

  </div>
</section>
@endif
@endsection
