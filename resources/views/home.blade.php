@extends('layouts.app')

@section('title', 'VegQuality | Consultoria em Biotecnologia & Segurança Alimentar para Agroindústria')
@section('meta_description', 'Soluções tecnológicas e biotecnologia para extensão de shelf-life e segurança dos alimentos na sua produção. Reduza oxidação e perdas com VegQuality.')

@section('content')
@php
    $hero = $page?->sections->where('key', 'hero')->first()?->content;
    $productHighlight = $page?->sections->where('key', 'product_highlight')->first()?->content;
    $about = $page?->sections->where('key', 'about')->first()?->content;
    
    // Shared Veg Oxi Sections from Veg Oxi Page
    $facts = \App\Models\Section::where('key', 'veg_oxi_facts')->first()?->content;
    $downloads = \App\Models\Section::where('key', 'veg_oxi_downloads')->first()?->content;
    $contacts = \App\Models\Section::where('key', 'veg_oxi_contacts')->first()?->content;

    // Homepage specific new sections
    $homeInsights = $page?->sections->where('key', 'home_insights')->first()?->content;
    $homeWhyChoose = $page?->sections->where('key', 'home_why_choose')->first()?->content;
    $homeContactCta = $page?->sections->where('key', 'home_contact_cta')->first()?->content;
@endphp

<!-- Section 1: Hero Carousel (Dynamic Text + Image + Badges) -->
<section class="hero hero-carousel-container">
  <!-- Decorative BG Shapes -->
  <div class="hero-bg-shape-1"></div>
  <div class="hero-bg-shape-2"></div>
  
  <div class="carousel-slides">
    @php
      $slides = data_get($hero, 'slides', []);
      if (empty($slides)) {
          $slides = [
              [
                  'image' => 'assets/hero/farmer-with-crate-of-ripe-vegetables-2025-02-18-13-20-58-utc-scaled.jpg',
                  'title' => 'Soluções para a agroindústria de vegetais frescos processados.',
                  'subtitle' => 'Soluções tecnológicas e biotecnologia de ponta para extensão de shelf-life e segurança dos alimentos na sua produção. Substitua aditivos químicos de forma segura.',
                  'btn1_text' => 'Serviços',
                  'btn1_link' => '/servicos',
                  'btn2_text' => 'Veg Oxi',
                  'btn2_link' => '/veg-oxi',
                  'badge1_text' => '+20 anos de experiência.',
                  'badge2_text' => 'Segurança Alimentar',
                  'badge2_link' => '#home_contact_cta',
              ]
          ];
      }
    @endphp

    @foreach($slides as $index => $slide)
      <div class="carousel-slide @if($index === 0) active @endif" data-index="{{ $index }}">
        <div class="container">
          <div class="hero-grid">
            
            <!-- Text Content -->
            <div class="hero-content">
              @if(data_get($slide, 'badge1_text'))
                <div class="micro-badge">
                  <span class="micro-badge-dot"></span>
                  {{ data_get($slide, 'badge1_text') }}
                </div>
              @endif

              <h1 class="hero-title">
                {!! data_get($slide, 'title') !!}
              </h1>

              <p class="hero-desc">
                {{ data_get($slide, 'subtitle') }}
              </p>

              <div class="hero-actions">
                @if(data_get($slide, 'btn1_text'))
                  <a href="{{ data_get($slide, 'btn1_link') }}" class="btn btn-primary hero-btn">
                    {{ data_get($slide, 'btn1_text') }}
                  </a>
                @endif
                @if(data_get($slide, 'btn2_text'))
                  <a href="{{ data_get($slide, 'btn2_link') }}" class="btn btn-ghost hero-btn" style="border: 2px solid rgba(27, 94, 32, 0.3); background-color: transparent; color: var(--color-veg-dark);">
                    {{ data_get($slide, 'btn2_text') }}
                  </a>
                @endif
              </div>
            </div>

            <!-- Media Content with Floating Badges -->
            <div class="hero-media">
              <div class="hero-media-bg-shape"></div>
              <div class="hero-image-wrapper">
                @if(Str::startsWith(data_get($slide, 'image'), 'assets/'))
                  <img src="{{ asset(data_get($slide, 'image')) }}" alt="{{ strip_tags(data_get($slide, 'title')) }}" class="hero-img">
                @else
                  <img src="{{ asset('storage/' . data_get($slide, 'image')) }}" alt="{{ strip_tags(data_get($slide, 'title')) }}" class="hero-img">
                @endif
                <div class="hero-image-overlay"></div>
              </div>

              <!-- Badge 1 (Fade to Right) -->
              @if(data_get($slide, 'badge1_text'))
                <div class="badge-floating badge-1 animate-fade-to-right">
                  <div class="badge-icon">
                    <i data-lucide="sprout"></i>
                  </div>
                  <div>
                    <span class="badge-text-primary">Destaque</span>
                    <span class="badge-text-secondary">{{ data_get($slide, 'badge1_text') }}</span>
                  </div>
                </div>
              @endif

              <!-- Badge 2 (Fade to Left with Link) -->
              @if(data_get($slide, 'badge2_text'))
                <a href="{{ data_get($slide, 'badge2_link', '#') }}" class="badge-floating badge-2 animate-fade-to-left block-link-badge">
                  <div class="badge-icon">
                    <i data-lucide="arrow-right-circle" class="badge-icon-accent"></i>
                  </div>
                  <div>
                    <span class="badge-text-title">{{ data_get($slide, 'badge2_text') }}</span>
                    <span class="badge-text-subtitle">Saiba mais <i data-lucide="chevron-right" style="width:12px;height:12px;display:inline-block;vertical-align:middle;"></i></span>
                  </div>
                </a>
              @endif
            </div>

          </div>
        </div>
      </div>
    @endforeach
  </div>

  <!-- Dots -->
  <div class="carousel-dots">
    @foreach($slides as $index => $slide)
      <span class="carousel-dot @if($index === 0) active @endif" data-slide="{{ $index }}"></span>
    @endforeach
  </div>
</section>

<!-- Section 2: O Que Oferecemos & Serviços -->
<section class="services-section">
  <div class="container">
    
    <!-- Header -->
    <div class="services-header animate-fade-up">
      <div class="services-tag">
        <span class="micro-badge-dot"></span>
        O que oferecemos
      </div>
      <h2 class="services-title">
        Soluções completas para a agroindústria de vegetais frescos
      </h2>
      <p class="services-desc">
        Há mais de duas décadas, somos referência em consultoria e soluções para a cadeia produtiva de FLV (Frutas, Legumes e Verduras).
      </p>
    </div>

    <!-- Grid -->
    <div class="services-grid animate-fade-up delay-100">
      
      <!-- Card 1: Consultoria -->
      <div class="service-card">
        <div class="service-card-icon">
          <i data-lucide="leaf"></i>
        </div>
        <h3 class="service-card-title">Consultoria</h3>
        <p class="service-card-desc">
          Diagnóstico operacional completo, extensão natural de shelf-life e aplicação de biotecnologia personalizada para eliminar perdas na sua produção de vegetais higienizados.
        </p>
        <a href="{{ url('/servicos') }}" class="service-card-link">
          Saiba mais
          <i data-lucide="arrow-right"></i>
        </a>
      </div>

      <!-- Card 2: Capacitação -->
      <div class="service-card">
        <div class="service-card-icon">
          <i data-lucide="graduation-cap"></i>
        </div>
        <h3 class="service-card-title">Capacitação</h3>
        <p class="service-card-desc">
          Treinamento especializado para equipes em Boas Práticas de Fabricação (BPF), controle sanitário e manipulação técnica, garantindo conformidade com as normas vigentes.
        </p>
        <a href="{{ url('/servicos') }}" class="service-card-link">
          Saiba mais
          <i data-lucide="arrow-right"></i>
        </a>
      </div>

      <!-- Card 3: Plano de Negócios -->
      <div class="service-card">
        <div class="service-card-icon">
          <i data-lucide="briefcase"></i>
        </div>
        <h3 class="service-card-title">Plano de Negócios</h3>
        <p class="service-card-desc">
          Desenvolvimento estratégico comercial, viabilidade econômica de plantas de processamento e estruturação de novos canais de distribuição B2B.
        </p>
        <a href="{{ url('/servicos') }}" class="service-card-link">
          Saiba mais
          <i data-lucide="arrow-right"></i>
        </a>
      </div>

      <!-- Card 4: Veg Oxi 200 -->
      <div class="service-card">
        <div class="service-card-icon">
          <i data-lucide="shield-check"></i>
        </div>
        <h3 class="service-card-title">Veg Oxi 200</h3>
        <p class="service-card-desc">
          Substituição tecnológica para sulfitos e metabissulfito de sódio. Antioxidante orgânico seguro e com excelente custo-benefício de apenas 1 centavo por hortaliça.
        </p>
        <a href="{{ url('/veg-oxi') }}" class="service-card-link">
          Saiba mais
          <i data-lucide="arrow-right"></i>
        </a>
      </div>

    </div>

  </div>
</section>

<!-- Section 3: Por Trás da VegQuality -->
<section class="about-section" style="background-color: #f9fafb;">
  <div class="container">
    <div class="about-grid">
      
      <!-- Image Left -->
      <div class="about-media animate-fade-up">
        <div class="about-image-bg-shape"></div>
        <div class="about-image-wrapper">
          @if(data_get($about, 'image'))
            <img src="{{ asset('storage/' . data_get($about, 'image')) }}" alt="{{ data_get($about, 'title') }}" class="about-img">
          @else
            <img src="{{ asset('assets/images/Foto-Roseane-Bob-profissional.jpg') }}" alt="Dra. Roseane Bob - Fundadora da VegQuality" class="about-img">
          @endif
        </div>
      </div>

      <!-- Content Right -->
      <div class="about-content animate-fade-up delay-100">
        <div class="about-tag">
          <span class="micro-badge-dot"></span>
          {{ data_get($about, 'badge', 'Por Trás da VegQuality') }}
        </div>
        <h2 class="about-title">
          {{ data_get($about, 'title', 'Paixão que Gera Resultados!') }}
        </h2>
        
        <p class="about-highlight-text">
          {{ data_get($about, 'highlight_text', 'Como transformar a ciência em uma aliada do campo e da mesa do consumidor?') }}
        </p>

        <p class="about-desc-paragraph">
          {{ data_get($about, 'desc1', 'Essa foi a pergunta que moveu a trajetória da Dra. Roseane Bob.') }}
        </p>

        <p class="about-desc-paragraph">
          {{ data_get($about, 'desc2', 'Nutricionista especialista em segurança de alimentos e sustentabilidade, Roseane sempre “mergulhou de cabeça” na rotina de produtores e agroindústrias. Nessas vivências, a dura realidade do desperdício e os desafios para o processamento de vegetais frescos no Brasil pós-colheita saltaram aos seus olhos, evidenciando um prejuízo gigantesco para toda a cadeia de hortifrúti.') }}
        </p>

        <p class="about-desc-paragraph">
          {{ data_get($about, 'desc3', 'A resposta para esse desafio veio em duas frentes complementares:') }}
        </p>

        <div class="about-features-container">
          <!-- Feature 1 -->
          <div class="about-feature-item">
            <div class="about-feature-icon">
              <i data-lucide="sprout"></i>
            </div>
            <div class="about-feature-text">
              <h4>{{ data_get($about, 'feature1_title', 'VegQuality') }}</h4>
              <p>{{ data_get($about, 'feature1_desc', 'Uma consultoria prática, altamente especializada e financeiramente acessível, desenhada para levar soluções de eficiência e segurança do pequeno ao grande produtor.') }}</p>
            </div>
          </div>

          <!-- Feature 2 -->
          <div class="about-feature-item">
            <div class="about-feature-icon">
              <i data-lucide="sparkles"></i>
            </div>
            <div class="about-feature-text">
              <h4>{{ data_get($about, 'feature2_title', 'Veg Oxi 200') }}</h4>
              <p>{{ data_get($about, 'feature2_desc', 'Uma inovação exclusiva no mundo. Este coadjuvante de tecnologia reduz drasticamente as perdas de vegetais frescos processados prontos para o consumo e dispensa o uso de aditivos nocivos à saúde, tais como os sulfitos.') }}</p>
            </div>
          </div>
        </div>

        <p class="about-desc-paragraph">
          {{ data_get($about, 'desc4', 'Com esse ecossistema de soluções, a Dra. Roseane e sua equipe de colaboradores e parceiros unem o crescimento sustentável de negócios agrícolas ao direito do consumidor de ter vegetais mais frescos, duráveis e seguros em casa.') }}
        </p>

        <!-- CTA direct contact -->
        <a href="{{ data_get($about, 'cta_link', '/empresa') }}" class="btn btn-primary hero-btn">
          {{ data_get($about, 'cta_text', 'Conheça mais') }}
        </a>

      </div>

    </div>
  </div>
</section>

<!-- Section 3.5: Biotecnologia / Veg Oxi 200 Propaganda Section (As requested) -->
@if($productHighlight)
<section class="product-highlight-section" style="background-color: #ffffff;">
  <div class="container">
    <div class="product-highlight-grid">
      
      <!-- Content Left -->
      <div class="product-highlight-content animate-fade-up">
        <div class="product-tag">
          <span class="micro-badge-dot"></span>
          {{ data_get($productHighlight, 'badge', 'Biotecnologia') }}
        </div>
        <h2 class="product-highlight-title">
          {{ data_get($productHighlight, 'title', 'Veg Oxi 200 - Coadjuvante de tecnologia') }}
        </h2>
        <p class="product-highlight-subtitle">
          {{ data_get($productHighlight, 'subtitle', 'Um Investimento que Vale a Pena!') }}
        </p>

        <div class="badges-container">
          <!-- Badge 1: Com Veg Oxi 200 -->
          <div class="product-cost-badge">
            <div class="cost-value-wrapper">
              <span class="cost-number">{{ data_get($productHighlight, 'cost_with', '30') }}</span>
              <span class="cost-unit">{{ data_get($productHighlight, 'cost_with_unit', 'Cents') }}</span>
            </div>
            <p class="cost-desc">{{ data_get($productHighlight, 'cost_with_desc', 'Por Vegetal Fresco') }}</p>
            <span class="cost-sub-badge">{{ data_get($productHighlight, 'cost_with_tag', 'Livre de Sulfitos (Seguro)') }}</span>
          </div>

          <!-- Badge 2: Sem Veg Oxi 200 -->
          <div class="product-cost-badge product-cost-badge-bad">
            <div class="cost-value-wrapper">
              <span class="cost-number cost-number-bad">{{ data_get($productHighlight, 'cost_without', '80') }}</span>
              <span class="cost-unit">{{ data_get($productHighlight, 'cost_without_unit', 'Cents') }}</span>
            </div>
            <p class="cost-desc">{{ data_get($productHighlight, 'cost_without_desc', 'Por Vegetal Oxidado') }}</p>
            <span class="cost-sub-badge cost-sub-badge-bad">{{ data_get($productHighlight, 'cost_without_tag', 'Com Metabissulfito (Tóxico)') }}</span>
          </div>
        </div>

        <a href="{{ url('/veg-oxi') }}" class="btn btn-primary hero-btn">
          <i data-lucide="shield-check"></i>
          {{ data_get($productHighlight, 'cta_text', 'Conhecer Veg Oxi 200') }}
        </a>
      </div>

      <!-- Comparison Image Right -->
      <div class="compare-container animate-fade-up delay-200">
        <div class="compare-media-wrapper">
          @if(data_get($productHighlight, 'image'))
            <img src="{{ asset('storage/' . data_get($productHighlight, 'image')) }}" alt="{{ data_get($productHighlight, 'title') }}" class="compare-img">
          @else
            <img src="{{ asset('assets/images/Veg-Oxi-200-Website.jpg') }}" alt="Comparativo Veg Oxi 200" class="compare-img">
          @endif
        </div>
      </div>

    </div>
  </div>
</section>
@endif

<!-- Section 4: Fatos sobre o Veg Oxi -->
@if($facts)
<section class="facts-section" style="background-color: #f9fafb; padding: 5rem 0;">
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

<!-- Section 5: Distribuição Veg Oxi 200 -->
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

<!-- Section 6: Detalhes Adicionais (Saiba Mais) -->
@if($downloads)
<section class="resources-section" style="background-color: #f9fafb; padding: 5rem 0; border-top: 1px solid var(--color-border);">
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

<!-- Section 7: Insights VegQuality (NEW) -->
@if($homeInsights)
<section class="home-insights-section">
  <div class="container">
    
    <div class="services-header animate-fade-up">
      <div class="services-tag">
        <span class="micro-badge-dot"></span>
        {{ data_get($homeInsights, 'badge', 'Insights VegQuality') }}
      </div>
      <h2 class="services-title">
        {{ data_get($homeInsights, 'title', 'Conhecimento que Transforma o Negócio') }}
      </h2>
      <p class="services-desc">
        {{ data_get($homeInsights, 'description') }}
      </p>
    </div>

    <div class="home-insights-grid animate-fade-up delay-100">
      @foreach(data_get($homeInsights, 'cards', []) as $card)
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

    <div class="text-center" style="margin-top: 3rem; text-align: center;">
      <a href="{{ url('/insights') }}" class="btn btn-ghost" style="border: 2px solid rgba(27, 94, 32, 0.3); background-color: transparent; color: var(--color-veg-dark);">
        Ver Todos os Insights
        <i data-lucide="arrow-right" style="width: 1.25rem; height: 1.25rem; display: inline-block; vertical-align: middle; margin-left: 0.25rem;"></i>
      </a>
    </div>

  </div>
</section>
@endif

<!-- Section 8: Por que nos Escolher? (NEW) -->
@if($homeWhyChoose)
<section class="why-choose-section" style="background-color: #ffffff;">
  <div class="container">
    <div class="why-choose-banner animate-fade-up">
      <span class="why-choose-badge">{{ data_get($homeWhyChoose, 'badge', 'Diferencial') }}</span>
      <h2 class="why-choose-title">{{ data_get($homeWhyChoose, 'title', 'Por que nos Escolher?') }}</h2>
      <p class="why-choose-text">
        {{ data_get($homeWhyChoose, 'description') }}
      </p>
    </div>
  </div>
</section>
@endif

<!-- Section 9: Radar FLV -->
<section class="blog-section" style="background-color: #f9fafb;">
  <div class="container">
    
    <!-- Header -->
    <div class="services-header animate-fade-up">
      <div class="services-tag">
        <span class="micro-badge-dot"></span>
        Radar FLV
      </div>
      <h2 class="services-title">
        Acompanhe as tendências que estão moldando a agroindústria de vegetais frescos
      </h2>
    </div>

    <!-- Grid of Cards -->
    <div class="blog-grid animate-fade-up delay-100">
      @forelse($homepageArticles as $article)
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
                {{ $article->columnist ? $article->columnist->name : ($article->author_name ?: 'Roseane Bob') }}
              </span>
            </div>
            <h3 class="blog-card-title">{{ $article->title }}</h3>
            <p class="blog-card-desc">
              {{ Str::limit(strip_tags($article->excerpt), 120, '...') }}
            </p>
            <a href="{{ url('/radar/' . $article->slug) }}" class="blog-card-link">
              Leia Mais
              <i data-lucide="arrow-right"></i>
            </a>
          </div>
        </div>
      @empty
        <p class="text-center text-gray-500" style="grid-column: span 3; padding: 2rem 0;">Nenhum artigo publicado no momento.</p>
      @endforelse
    </div>

    <!-- Action Button -->
    <div class="animate-fade-up delay-200" style="margin-top: 3.5rem; text-align: center;">
      <a href="{{ url('/radar') }}" class="btn btn-primary" style="display: inline-flex; align-items: center; gap: 0.5rem; text-decoration: none;">
        Veja Mais
        <i data-lucide="arrow-right"></i>
      </a>
    </div>

  </div>
</section>

<!-- Section 10: Chamada Final para Contato (NEW) -->
@if($homeContactCta)
<section class="contact-cta-section" id="home_contact_cta">
  <div class="container">
    <div class="contact-cta-grid">
      
      <div class="contact-cta-content animate-fade-up">
        <div class="micro-badge">
          <span class="micro-badge-dot"></span>
          {{ data_get($homeContactCta, 'badge', 'Fale Conosco') }}
        </div>
        <h2 class="contact-cta-title">
          {{ data_get($homeContactCta, 'title', 'Pronto para transformar a sua produção?') }}
        </h2>
        <p class="contact-cta-desc">
          {{ data_get($homeContactCta, 'subtitle', 'Entre em contato conosco hoje mesmo e fale diretamente com um especialista técnico da VegQuality.') }}
        </p>
        <a href="{{ data_get($homeContactCta, 'whatsapp_link', 'https://wa.me/5511978348438') }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary hero-btn">
          <i data-lucide="message-circle"></i>
          Falar no WhatsApp
        </a>
      </div>

      <div class="contact-cta-info animate-fade-up delay-100">
        <h3 class="contact-cta-info-title">Canais de Contato</h3>
        <ul class="contact-cta-list">
          @if(data_get($homeContactCta, 'phone'))
            <li class="contact-cta-item">
              <i data-lucide="phone-call" class="contact-cta-icon"></i>
              <div class="contact-cta-details">
                <span class="contact-cta-label">Telefone</span>
                <a href="tel:{{ preg_replace('/[^0-9+]/', '', data_get($homeContactCta, 'phone')) }}" class="contact-cta-value">
                  {{ data_get($homeContactCta, 'phone') }}
                </a>
              </div>
            </li>
          @endif
          @if(data_get($homeContactCta, 'whatsapp'))
            <li class="contact-cta-item">
              <i data-lucide="message-square" class="contact-cta-icon"></i>
              <div class="contact-cta-details">
                <span class="contact-cta-label">WhatsApp</span>
                <a href="{{ data_get($homeContactCta, 'whatsapp_link') }}" target="_blank" rel="noopener noreferrer" class="contact-cta-value">
                  {{ data_get($homeContactCta, 'whatsapp') }}
                </a>
              </div>
            </li>
          @endif
          @if(data_get($homeContactCta, 'email'))
            <li class="contact-cta-item">
              <i data-lucide="mail" class="contact-cta-icon"></i>
              <div class="contact-cta-details">
                <span class="contact-cta-label">E-mail</span>
                <a href="mailto:{{ data_get($homeContactCta, 'email') }}" class="contact-cta-value">
                  {{ data_get($homeContactCta, 'email') }}
                </a>
              </div>
            </li>
          @endif
          @if(data_get($homeContactCta, 'address'))
            <li class="contact-cta-item">
              <i data-lucide="map-pin" class="contact-cta-icon"></i>
              <div class="contact-cta-details">
                <span class="contact-cta-label">Endereço</span>
                <span class="contact-cta-value" style="font-weight: 500;">
                  {{ data_get($homeContactCta, 'address') }}
                </span>
              </div>
            </li>
          @endif
        </ul>
      </div>

    </div>
  </div>
</section>
@endif

@endsection
