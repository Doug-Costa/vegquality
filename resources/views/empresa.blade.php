@extends('layouts.app')

@section('title', 'A Empresa | VegQuality - Consultoria em Biotecnologia & Segurança Alimentar')
@section('meta_description', 'Saiba mais sobre a VegQuality, fundada pela Dra. Roseane Bob. Oferecemos consultoria científica para estender o shelf-life e eliminar o metabissulfito de sódio na agroindústria.')

@section('content')
<!-- Hero Interno -->
    <section class="internal-hero">
      <div class="container">
        <div class="breadcrumb animate-fade-up">
          <a href="{{ url('/') }}">Início</a>
          <span class="breadcrumb-separator">/</span>
          <span>A Empresa</span>
        </div>
        <h1 class="internal-hero-title animate-fade-up delay-100">
          Consultoria e Soluções para a Agroindústria
        </h1>
        <p class="internal-hero-desc animate-fade-up delay-200">
          Ciência e tecnologia aliadas para garantir alimentos mais seguros, saudáveis e lucrativos.
        </p>
      </div>
    </section>

    <!-- Stats Banner -->
    <section class="stats-banner">
      <div class="container">
        <div class="stats-banner-container animate-fade-up">
          <span class="stats-banner-number">25 M</span>
          <span class="stats-banner-text">de Toneladas Salvas do Desperdício</span>
        </div>
      </div>
    </section>

    <!-- Seção Livre de Sulfitos -->
    <section class="sulfito-section">
      <div class="container">
        <div class="sulfito-grid">
          
          <!-- Content Left -->
          <div class="sulfito-content animate-fade-up">
            <div class="product-tag">
              <span class="micro-badge-dot"></span>
              VegQuality
            </div>
            <h2 class="sulfito-title">
              100% Livre de sulfitos
            </h2>
            <p class="sulfito-desc">
              Você sabia que o metabissulfito de sódio (dióxido de enxofre) é amplamente usado como conservante nos vegetais frescos processados? 🌱 Com o <strong>Veg Oxi 200</strong>, isso fica definitivamente no passado! Oferecemos um coadjuvante de tecnologia inovador que substitui aditivos químicos nocivos com total eficácia.
            </p>
          </div>

          <!-- Card Checklist Right -->
          <div class="animate-fade-up delay-100">
            <div class="checklist-card">
              <ul class="checklist-list">
                <li class="checklist-item">
                  <i data-lucide="shield-check"></i>
                  <span>Livre de dióxido de enxofre.</span>
                </li>
                <li class="checklist-item">
                  <i data-lucide="leaf"></i>
                  <span>Preserva alimentos de forma natural.</span>
                </li>
                <li class="checklist-item">
                  <i data-lucide="heart"></i>
                  <span>Respeita a saúde do consumidor e do operador.</span>
                </li>
              </ul>
            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- Seção Mantendo o Frescor da Colheita -->
    <section class="about-section" style="background-color: var(--color-veg-light);">
      <div class="container">
        <div class="about-grid" style="grid-template-columns: 7fr 5fr;">
          
          <!-- Content Left -->
          <div class="about-content animate-fade-up">
            <div class="about-tag">
              <span class="micro-badge-dot"></span>
              VegQuality
            </div>
            <h2 class="about-title">
              Mantendo o frescor da colheita
            </h2>
            <p class="about-highlight-text">
              Transforme sua linha de vegetais frescos prontos para o consumo!
            </p>
            <p class="about-desc-paragraph">
              Na Veg Quality, oferecemos soluções personalizadas e consultoria especializada para impulsionar a eficiência técnica e a segurança operacional da sua planta de processamento.
            </p>
            
            <div class="about-features-container" style="width: 100%;">
              <div class="about-feature-item">
                <div class="about-feature-icon">
                  <i data-lucide="trending-up"></i>
                </div>
                <div class="about-feature-text">
                  <h4>Aumentar a durabilidade</h4>
                  <p>Amplie consideravelmente o shelf-life e mantenha o frescor natural dos produtos por mais tempo.</p>
                </div>
              </div>

              <div class="about-feature-item">
                <div class="about-feature-icon">
                  <i data-lucide="dollar-sign"></i>
                </div>
                <div class="about-feature-text">
                  <h4>Reduzir custos e perdas</h4>
                  <p>Minimize desperdícios na produção por meio de processos padronizados e tecnologia de ponta.</p>
                </div>
              </div>

              <div class="about-feature-item">
                <div class="about-feature-icon">
                  <i data-lucide="award"></i>
                </div>
                <div class="about-feature-text">
                  <h4>Elevar os padrões</h4>
                  <p>Garanta conformidade estrita com normas sanitárias e entregue máxima qualidade ao mercado.</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Image Right -->
          <div class="about-media animate-fade-up delay-100">
            <div class="about-image-bg-shape" style="border-radius: 40px; border-bottom-right-radius: 120px; transform: rotate(3deg) scale(1.02);"></div>
            <div class="about-image-wrapper" style="border-radius: 40px; border-bottom-right-radius: 100px;">
              <img src="{{ asset('assets/hero/Home-Veg-scaled.jpg') }}" alt="Vegetais frescos processados com VegQuality" class="about-img">
            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- Seção Quem Somos -->
    <section class="product-highlight-section">
      <div class="container">
        
        <div class="services-header animate-fade-up" style="margin-bottom: 5rem;">
          <div class="services-tag">
            <span class="micro-badge-dot"></span>
            Fundadora
          </div>
          <h2 class="services-title">Quem Somos</h2>
        </div>

        <div class="about-grid">
          
          <!-- Image Left (Dra. Roseane Bob) -->
          <div class="about-media animate-fade-up">
            <div class="about-image-bg-shape"></div>
            <div class="about-image-wrapper">
              <img src="{{ asset('assets/images/Foto-Roseane-Bob-profissional.jpg') }}" alt="Dra. Roseane Bob - Fundadora da VegQuality" class="about-img">
            </div>
            <p style="text-align: center; margin-top: 1.5rem; font-size: 0.9rem; font-weight: 600; color: var(--color-veg-dark);">
              Drª Roseane Bob, fundadora e diretora da VegQuality
            </p>
          </div>

          <!-- Content Right -->
          <div class="about-content animate-fade-up delay-100">
            <div class="about-tag">
              <span class="micro-badge-dot"></span>
              Liderança e Ciência
            </div>
            <h2 class="about-title" style="font-size: 2.25rem;">
              VegQuality<br><span style="color: var(--color-veg-primary);">Consultoria que gera resultados!</span>
            </h2>
            <p class="about-desc-paragraph">
              A VegQuality é mais que uma consultoria: é uma parceira estratégica para empresas que atuam na agroindústria de vegetais frescos, do campo aos pontos de distribuição.
            </p>
            <p class="about-desc-paragraph">
              Combinando ciência, inovação, experiência prática e propósito, entregamos soluções personalizadas que fortalecem a qualidade, a segurança, a sustentabilidade e a rentabilidade da agroindústria de vegetais frescos higienizados.
            </p>

            <!-- Indicators Grid -->
            <div class="indicators-grid">
              <div class="indicator-card">
                <div class="indicator-number">100%</div>
                <div class="indicator-label">Expertise</div>
              </div>
              <div class="indicator-card">
                <div class="indicator-number">100%</div>
                <div class="indicator-label">Experiência</div>
              </div>
              <div class="indicator-card">
                <div class="indicator-number">100%</div>
                <div class="indicator-label">Resultados</div>
              </div>
            </div>

          </div>

        </div>
      </div>
    </section>
@endsection
