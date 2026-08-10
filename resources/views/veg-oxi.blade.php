@extends('layouts.app')
@section('title', $page->title)
@section('meta_description', $page->meta_description)
@section('content')
@php
    $hero = $page?->sections->where('key', 'veg_oxi_hero')->first()?->content;
    $productHighlight = $page?->sections->where('key', 'product_highlight')->first()?->content;
    $facts = $page?->sections->where('key', 'veg_oxi_facts')->first()?->content;
    $downloads = $page?->sections->where('key::name', 'veg_oxi_downloads')->first()?->content ?? $page?->sections->where('key', 'veg_oxi_downloads')->first()?->content;
    $contacts = $page?->sections->where('key', 'veg_oxi_contacts')->first()?->content;
@endphp

<!-- Subpage Hero -->
<section class="subpage-hero">
  <div class="hero-bg-shape-1"></div>
  <div class="hero-bg-shape-2"></div>
  <div class="container">
    <h1 class="subpage-hero-title animate-fade-up">{{ trans_content($hero, 'title', 'Veg Oxi 200') }}</h1>
    <p class="subpage-hero-subtitle animate-fade-up delay-100">{{ trans_content($hero, 'subtitle', 'Tecnologia inovadora para conservação e qualidade de vegetais frescos.') }}</p>
  </div>
</section>

<!-- Facts Section -->
@if($facts)
<section class="facts-section" style="background-color: #ffffff; padding: 5rem 0;">
  <div class="container">
    <div class="services-header animate-fade-up">
      <div class="services-tag">
        <span class="micro-badge-dot"></span>
        {{ trans_content($facts, 'badge', 'Por Trás do Produto') }}
      </div>
      <h2 class="services-title">
        {{ trans_content($facts, 'title', 'Fatos sobre o Veg Oxi 200') }}
      </h2>
    </div>

    <div class="facts-grid animate-fade-up delay-100">
      @foreach(data_get($facts, 'cards', []) as $index => $card)
        <div class="fact-card">
          <div class="fact-card-icon">
            <i data-lucide="{{ data_get($card, 'icon', 'info') }}"></i>
          </div>
          <h3 class="fact-card-title">{!! nl2br(e(trans_content($card, 'title'))) !!}</h3>
          <p class="fact-card-desc">
            {{ trans_content($card, 'desc') }}
          </p>
          <span class="fact-card-link" data-modal-target="modal-fact-{{ $index }}">
            {{ __('Saiba Mais') }}
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
      <h3 class="modal-title">{{ trans_content($card, 'title') }}</h3>
      <div class="modal-body">
        <p>{!! nl2br(e(trans_content($card, 'body'))) !!}</p>
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
        {{ trans_content($downloads, 'badge', 'Saiba Mais') }}
      </div>
      <h2 class="services-title">
        {{ trans_content($downloads, 'title', 'Detalhes Adicionais') }}
      </h2>
    </div>

    <div class="download-grid animate-fade-up delay-100">
      @foreach(data_get($downloads, 'downloads', []) as $dl)
        <div class="download-card">
          <div class="download-card-icon">
            <i data-lucide="file-text"></i>
          </div>
          <h3>{{ trans_content($dl, 'title') }}</h3>
          <p>{{ trans_content($dl, 'desc') }}</p>
          @php
            $fileUrl = data_get($dl, 'file');
            $isAssetFile = Str::startsWith($fileUrl, 'downloads/');
          @endphp
          <a href="{{ $isAssetFile ? asset($fileUrl) : asset('storage/' . $fileUrl) }}" download class="btn-download">
            <i data-lucide="download"></i>
            {{ __('Baixe o PDF') }}
          </a>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endif

<!-- Section 3.5: Biotecnologia / Veg Oxi 200 Propaganda Section (As requested) -->
@if($productHighlight)
<section class="product-highlight-section" style="background-color: #ffffff;">
  <div class="container">
    <div class="product-highlight-grid">
      
      <!-- Content Left -->
      <div class="product-highlight-content animate-fade-up">
        <div class="product-tag">
          <span class="micro-badge-dot"></span>
          {{ trans_content($productHighlight, 'badge', 'Biotecnologia') }}
        </div>
        <h2 class="product-highlight-title">
          {{ trans_content($productHighlight, 'title', 'Veg Oxi 200 - Coadjuvante de tecnologia') }}
        </h2>
        <p class="product-highlight-subtitle">
          {{ trans_content($productHighlight, 'subtitle', 'Um Investimento que Vale a Pena!') }}
        </p>

        <div class="badges-container">
          <!-- Badge 1: Com Veg Oxi 200 -->
          <div class="product-cost-badge">
            <div class="cost-value-wrapper">
              <span class="cost-number">{{ data_get($productHighlight, 'cost_with', '30') }}</span>
              <span class="cost-unit">{{ trans_content($productHighlight, 'cost_with_unit', 'Cents') }}</span>
            </div>
            <p class="cost-desc">{{ trans_content($productHighlight, 'cost_with_desc', 'Por Vegetal Fresco') }}</p>
            <span class="cost-sub-badge">{{ trans_content($productHighlight, 'cost_with_tag', 'Livre de Sulfitos (Seguro)') }}</span>
          </div>

          <!-- Badge 2: Sem Veg Oxi 200 -->
          <div class="product-cost-badge product-cost-badge-bad">
            <div class="cost-value-wrapper">
              <span class="cost-number cost-number-bad">{{ data_get($productHighlight, 'cost_without', '80') }}</span>
              <span class="cost-unit">{{ trans_content($productHighlight, 'cost_without_unit', 'Cents') }}</span>
            </div>
            <p class="cost-desc">{{ trans_content($productHighlight, 'cost_without_desc', 'Por Vegetal Oxidado') }}</p>
            <span class="cost-sub-badge cost-sub-badge-bad">{{ trans_content($productHighlight, 'cost_without_tag', 'Com Metabissulfito (Tóxico)') }}</span>
          </div>
        </div>

        <a href="{{ data_get($productHighlight, 'cta_link', '#veg_oxi_contacts') }}" class="btn btn-primary hero-btn">
          <i data-lucide="shield-check"></i>
          {{ trans_content($productHighlight, 'cta_text', 'Adquirir Veg Oxi 200') }}
        </a>
      </div>

      <!-- Comparison Image Right -->
      <div class="compare-container animate-fade-up delay-200">
        <div class="compare-media-wrapper">
          @if(data_get($productHighlight, 'image'))
            <img src="{{ asset('storage/' . data_get($productHighlight, 'image')) }}" alt="{{ trans_content($productHighlight, 'title') }}" class="compare-img">
          @else
            <img src="{{ asset('assets/images/Veg-Oxi-200-Website.jpg') }}" alt="Comparativo Veg Oxi 200" class="compare-img">
          @endif
        </div>
      </div>

    </div>
  </div>
</section>
@endif

<!-- Contacts / Distribuição Section -->
@if($contacts)
<section id="veg_oxi_contacts" class="resources-section" style="background-color: #ffffff; padding: 5rem 0;">
  <div class="container">
    <div class="services-header animate-fade-up">
      <div class="services-tag">
        <span class="micro-badge-dot"></span>
        {{ trans_content($contacts, 'badge', 'Distribuição') }}
      </div>
      <h2 class="services-title">
        {{ trans_content($contacts, 'title', 'Distribuição Veg Oxi 200') }}
      </h2>
    </div>

    <div class="local-grid animate-fade-up delay-100">
      @foreach(data_get($contacts, 'contacts', []) as $contact)
        <div class="local-card">
          <div class="local-card-icon">
            <i data-lucide="map-pin"></i>
          </div>
          <h4>{{ trans_content($contact, 'title') }}</h4>
          <p>{{ trans_content($contact, 'desc') }}</p>
          <a href="{{ data_get($contact, 'link') }}" target="_blank" rel="noopener noreferrer" class="btn-local-cta">
            {{ __('Fale Conosco') }}
          </a>
        </div>
      @endforeach
    </div>

  </div>
</section>
@endif
@endsection
