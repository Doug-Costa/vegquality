@extends('layouts.app')

@section('title', 'A Empresa | VegQuality - Consultoria em Biotecnologia & Segurança Alimentar')
@section('meta_description', 'Saiba mais sobre a VegQuality, fundada pela Dra. Roseane Bob. Oferecemos consultoria científica para estender o shelf-life e eliminar o metabissulfito de sódio na agroindústria.')

@section('content')
@php
    $hero = $page?->sections->where('key', 'empresa_hero')->first()?->content;
    $sulfito = $page?->sections->where('key', 'empresa_sulfito')->first()?->content;
    $frescor = $page?->sections->where('key', 'empresa_frescor')->first()?->content;
    $quemSomos = $page?->sections->where('key', 'empresa_quem_somos')->first()?->content;
@endphp
<!-- Hero Interno -->
    <section class="internal-hero">
      <div class="container">
        <div class="breadcrumb animate-fade-up">
          <a href="{{ url('/') }}">{{ __('Início') }}</a>
          <span class="breadcrumb-separator">/</span>
          <span>{{ __('A Empresa') }}</span>
        </div>
        <h1 class="internal-hero-title animate-fade-up delay-100">
          {{ trans_content($hero, 'title', 'Consultoria e Soluções para a Agroindústria') }}
        </h1>
        <p class="internal-hero-desc animate-fade-up delay-200">
          {{ trans_content($hero, 'subtitle', 'Ciência e tecnologia aliadas para garantir alimentos mais seguros, saudáveis e lucrativos.') }}
        </p>
      </div>
    </section>

    <!-- Seção Mantendo o Frescor da Colheita (Consultoria 360) -->
    <section class="about-section">
      <div class="container">
        <div class="about-grid about-grid-7-5">
          
          <!-- Content Left -->
          <div class="about-content animate-fade-up">
            <div class="about-tag">
              <span class="micro-badge-dot"></span>
              {{ trans_content($frescor, 'badge', 'VegQuality') }}
            </div>
            <h2 class="about-title">
              {{ trans_content($frescor, 'title', 'Consultoria 360°') }}
            </h2>
            <p class="about-highlight-text">
              {{ trans_content($frescor, 'highlight_text', 'Transforme sua linha de vegetais frescos prontos para o consumo!') }}
            </p>
            <p class="about-desc-paragraph">
              {{ trans_content($frescor, 'description', 'Na Veg Quality, oferecemos soluções personalizadas e consultoria especializada para impulsionar a eficiência técnica e a segurança operacional da sua planta de processamento.') }}
            </p>
            
            <div class="about-features-container" style="width: 100%;">
              <div class="about-feature-item">
                <div class="about-feature-icon">
                  <i data-lucide="trending-up"></i>
                </div>
                <div class="about-feature-text">
                  <h4>{{ trans_content($frescor, 'feature1_title', 'Aumentar a durabilidade') }}</h4>
                  <p>{{ trans_content($frescor, 'feature1_desc', 'Amplie consideravelmente o shelf-life e mantenha o frescor natural dos produtos por mais tempo.') }}</p>
                </div>
              </div>

              <div class="about-feature-item">
                <div class="about-feature-icon">
                  <i data-lucide="dollar-sign"></i>
                </div>
                <div class="about-feature-text">
                  <h4>{{ trans_content($frescor, 'feature2_title', 'Reduzir custos e perdas') }}</h4>
                  <p>{{ trans_content($frescor, 'feature2_desc', 'Minimize desperdícios na produção por meio de processos padronizados e tecnologia de ponta.') }}</p>
                </div>
              </div>

              <div class="about-feature-item">
                <div class="about-feature-icon">
                  <i data-lucide="award"></i>
                </div>
                <div class="about-feature-text">
                  <h4>{{ trans_content($frescor, 'feature3_title', 'Elevar os padrões') }}</h4>
                  <p>{{ trans_content($frescor, 'feature3_desc', 'Garanta conformidade estrita com normas sanitárias e entregue máxima qualidade ao mercado.') }}</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Image Right -->
          @php
            $frescorImage = data_get($frescor, 'image');
            $frescorImageSrc = $frescorImage ? (str_starts_with($frescorImage, 'assets') ? asset($frescorImage) : asset('storage/' . $frescorImage)) : asset('assets/hero/Home-Veg-scaled.jpg');
          @endphp
          <div class="about-media animate-fade-up delay-100">
            <div class="about-image-bg-shape" style="border-radius: 40px; border-bottom-right-radius: 120px; transform: rotate(3deg) scale(1.02);"></div>
            <div class="about-image-wrapper" style="border-radius: 40px; border-bottom-right-radius: 100px;">
              <img src="{{ $frescorImageSrc }}" alt="{{ trans_content($frescor, 'title') }}" class="about-img">
            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- Seção Livre de Sulfitos (Veg Oxi 200) -->
    <section class="sulfito-section" style="background-color: var(--color-veg-light);">
      <div class="container">
        <div class="sulfito-grid">
          
          <!-- Content Left -->
          <div class="sulfito-content animate-fade-up">
            <div class="product-tag">
              <span class="micro-badge-dot"></span>
              {{ trans_content($sulfito, 'badge', 'VegQuality') }}
            </div>
            <h2 class="sulfito-title">
              {{ trans_content($sulfito, 'title', '100% Livre de sulfitos') }}
            </h2>
            <p class="sulfito-desc">
              {!! trans_content($sulfito, 'description', 'Você sabia que o metabissulfito de sódio (dióxido de enxofre) é amplamente usado como conservante nos vegetais frescos processados? 🌱 Com o <strong>Veg Oxi 200</strong>, isso fica definitivamente no passado! Oferecemos um coadjuvante de tecnologia inovador que substitui aditivos químicos nocivos com total eficácia.') !!}
            </p>
          </div>

          <!-- Card Checklist Right -->
          <div class="animate-fade-up delay-100">
            <div class="checklist-card">
              <ul class="checklist-list">
                <li class="checklist-item">
                  <i data-lucide="shield-check"></i>
                  <span>{{ trans_content($sulfito, 'check1', 'Livre de dióxido de enxofre.') }}</span>
                </li>
                <li class="checklist-item">
                  <i data-lucide="leaf"></i>
                  <span>{{ trans_content($sulfito, 'check2', 'Preserva alimentos de forma natural.') }}</span>
                </li>
                <li class="checklist-item">
                  <i data-lucide="heart"></i>
                  <span>{{ trans_content($sulfito, 'check3', 'Respeita a saúde do consumidor e do operador.') }}</span>
                </li>
              </ul>
            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- Seção Quem Somos / História -->
    <section class="product-highlight-section">
      <div class="container">
        
        <div class="services-header animate-fade-up" style="margin-bottom: 5rem;">
          <div class="services-tag">
            <span class="micro-badge-dot"></span>
            {{ trans_content($quemSomos, 'badge', 'Fundadora') }}
          </div>
          <h2 class="services-title">{!! trans_content($quemSomos, 'title', 'História da VegQuality') !!}</h2>
          <p class="services-desc">{{ trans_content($quemSomos, 'description1', 'A VegQuality é mais que uma consultoria: é uma parceira estratégica para empresas que atuam na agroindústria de vegetais frescos, do campo aos pontos de distribuição.') }}</p>
          <p class="services-desc" style="margin-top: 1rem;">{{ trans_content($quemSomos, 'description2', 'Combinando ciência, inovação, experiência prática e propósito, entregamos soluções personalizadas que fortalecem a qualidade, a segurança, a sustentabilidade e a rentabilidade da agroindústria de vegetais frescos higienizados.') }}</p>
        </div>

        <div class="about-grid">
          
          <!-- Image Left (Dra. Roseane Bob) -->
          @php
            $qsImage = data_get($quemSomos, 'image');
            $qsImageSrc = $qsImage ? (str_starts_with($qsImage, 'assets') ? asset($qsImage) : asset('storage/' . $qsImage)) : asset('assets/images/Foto-Roseane-Bob-profissional.jpg');
          @endphp
          <div class="about-media animate-fade-up">
            <div class="about-image-bg-shape"></div>
            <div class="about-image-wrapper">
              <img src="{{ $qsImageSrc }}" alt="{{ strip_tags(data_get($quemSomos, 'image_caption')) }}" class="about-img">
            </div>
            <p style="text-align: center; margin-top: 1.5rem; font-size: 0.9rem; font-weight: 600; color: var(--color-veg-dark);">
              {{ data_get($quemSomos, 'image_caption', 'Drª Roseane Bob, fundadora e diretora           <!-- Content Right -->
          <div class="about-content animate-fade-up delay-100">
            <div class="about-tag">
              <span class="micro-badge-dot"></span>
              {{ trans_content($quemSomos, 'badge', 'Liderança e Ciência') }}
            </div>
            <h2 class="about-title" style="font-size: 2.25rem;">
              {!! trans_content($quemSomos, 'title', 'História da VegQuality<br><span style="color: var(--color-veg-primary);">Consultoria que gera resultados!</span>') !!}
            </h2>
            <p class="about-desc-paragraph">
              {{ trans_content($quemSomos, 'description1', 'A VegQuality é mais que uma consultoria: é uma parceira estratégica para empresas que atuam na agroindústria de vegetais frescos, do campo aos pontos de distribuição.') }}
            </p>
            <p class="about-desc-paragraph">
              {{ trans_content($quemSomos, 'description2', 'Combinando ciência, inovação, experiência prática e propósito, entregamos soluções personalizadas que fortalecem a qualidade, a segurança, a sustentabilidade e a rentabilidade da agroindústria de vegetais frescos higienizados.') }}
            </p>

            <!-- Indicators Grid -->
            <div class="indicators-grid">
              <div class="indicator-card">
                <div class="indicator-number">{{ data_get($quemSomos, 'card1_num', '100%') }}</div>
                <div class="indicator-label">{{ trans_content($quemSomos, 'card1_label', 'Expertise') }}</div>
              </div>
              <div class="indicator-card">
                <div class="indicator-number">{{ data_get($quemSomos, 'card2_num', '100%') }}</div>
                <div class="indicator-label">{{ trans_content($quemSomos, 'card2_label', 'Experiência') }}</div>
              </div>
              <div class="indicator-card">
                <div class="indicator-number">{{ data_get($quemSomos, 'card3_num', '100%') }}</div>
                <div class="indicator-label">{{ trans_content($quemSomos, 'card3_label', 'Resultados') }}</div>
              </div>
            </div>
          </div>tados') }}</div>
              </div>
            </div>

          </div>

        </div>
      </div>
    </section>
@endsection
