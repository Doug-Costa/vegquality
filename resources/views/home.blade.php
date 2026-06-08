@extends('layouts.app')

@section('title', 'VegQuality | Consultoria em Biotecnologia & Segurança Alimentar para Agroindústria')
@section('meta_description', 'Soluções tecnológicas e biotecnologia para extensão de shelf-life e segurança dos alimentos na sua produção. Reduza oxidação e perdas com VegQuality.')

@section('content')
@php
    $hero = $page?->sections->where('key', 'hero')->first()?->content;
    $productHighlight = $page?->sections->where('key', 'product_highlight')->first()?->content;
    $about = $page?->sections->where('key', 'about')->first()?->content;
@endphp
<!-- Hero Section -->
    <section class="hero">
      
      <!-- Decorative BG Shapes -->
      <div class="hero-bg-shape-1"></div>
      <div class="hero-bg-shape-2"></div>
      
      <div class="container">
        <div class="hero-grid">
          
          <!-- Text Content -->
          <div class="hero-content animate-fade-up">
            
            <!-- Micro-badge -->
            <div class="micro-badge">
              <span class="micro-badge-dot"></span>
              {{ data_get($hero, 'badge', 'Biotecnologia & Agroindústria') }}
            </div>

            <!-- Title -->
            <h1 class="hero-title">
              {!! data_get($hero, 'title', 'Consultoria que gera resultados na <span class="hero-title-highlight">agroindústria</span> de vegetais frescos') !!}
            </h1>

            <!-- Description -->
            <p class="hero-desc">
              {{ data_get($hero, 'subtitle', 'Soluções tecnológicas e biotecnologia de ponta para extensão de shelf-life e segurança dos alimentos na sua produção. Substitua aditivos químicos de forma segura.') }}
            </p>

            <!-- Action Buttons -->
            <div class="hero-actions">
              <!-- Single Premium CTA Button -->
              <a href="{{ data_get($hero, 'cta_link', 'https://wa.me/551151940325?text=Ol%C3%A1%2C%20gostaria%20de%20saber%20mais%20sobre%20as%20solu%C3%A7%C3%B5es%20da%20VegQuality.') }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary hero-btn">
                <i data-lucide="message-circle"></i>
                {{ data_get($hero, 'cta_text', 'Quero Saber Mais') }}
              </a>
            </div>

            <!-- Stats/Badges inline desktop -->
            <div class="hero-stats">
              <div class="stat-item">
                <div class="stat-icon">
                  <i data-lucide="shield-check"></i>
                </div>
                <div class="stat-info">
                  <h4>{{ data_get($hero, 'stat1_title', '100% Seguro') }}</h4>
                  <p>{{ data_get($hero, 'stat1_desc', 'Rigores sanitários atendidos') }}</p>
                </div>
              </div>
              <div class="stat-item">
                <div class="stat-icon">
                  <i data-lucide="sparkles"></i>
                </div>
                <div class="stat-info">
                  <h4>{{ data_get($hero, 'stat2_title', 'Biotecnologia Pura') }}</h4>
                  <p>{{ data_get($hero, 'stat2_desc', 'Alta durabilidade natural') }}</p>
                </div>
              </div>
            </div>

          </div>

          <!-- Asymmetric Organic Hero Image with Floating Badges -->
          <div class="hero-media animate-fade-up delay-200">
            
            <!-- Organic shape background decoration -->
            <div class="hero-media-bg-shape"></div>
            
            <!-- Image Wrapper with Asymmetric organic border and sliding carousel -->
            <div class="hero-image-wrapper hero-carousel">
              @php
                $heroImages = data_get($hero, 'images');
                if (empty($heroImages) || !is_array($heroImages)) {
                    $heroImages = [
                        'assets/hero/farmer-with-crate-of-ripe-vegetables-2025-02-18-13-20-58-utc-scaled.jpg',
                        'assets/hero/Home-Veg-scaled.jpg',
                        'assets/hero/colhendo-alface.jpg'
                    ];
                    $isAsset = true;
                } else {
                    $isAsset = false;
                }
              @endphp
              <div class="carousel-slides">
                @foreach($heroImages as $index => $img)
                  <div class="carousel-slide @if($index === 0) active @endif">
                    <img src="{{ $isAsset ? asset($img) : asset('storage/' . $img) }}" alt="{{ data_get($hero, 'title', 'VegQuality') }}" class="hero-img">
                  </div>
                @endforeach
              </div>
              <div class="hero-image-overlay"></div>
              
              <!-- Carousel Controls/Dots -->
              <div class="carousel-dots">
                @foreach($heroImages as $index => $img)
                  <span class="carousel-dot @if($index === 0) active @endif" data-slide="{{ $index }}"></span>
                @endforeach
              </div>
            </div>

            <!-- Floating Badge 1: 1¢ por hortaliça -->
            <div class="badge-floating badge-1">
              <div class="badge-icon">
                <i data-lucide="trending-down"></i>
              </div>
              <div>
                <span class="badge-text-primary">1¢</span>
                <span class="badge-text-secondary">Custo por Hortaliça</span>
              </div>
            </div>

            <!-- Floating Badge 2: Segurança Alimentar -->
            <div class="badge-floating badge-2">
              <div class="badge-icon">
                <i data-lucide="shield-alert" class="badge-icon-accent"></i>
              </div>
              <div>
                <span class="badge-text-title">Segurança Alimentar</span>
                <span class="badge-text-subtitle">Livre de contaminações</span>
              </div>
            </div>

          </div>

        </div>
      </div>
    </section>

    <!-- Services Section -->
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
            <a href="{{ url('/servicos') }}" class="service-card-link">
              Saiba mais
              <i data-lucide="arrow-right"></i>
            </a>
          </div>

        </div>

      </div>
    </section>

    <!-- Veg Oxi 200 Comparison Section -->
    <section class="product-highlight-section">
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

              <!-- Badge 2: Sem Veg Oxi 200 (Convencional com Metabissulfito) -->
              <div class="product-cost-badge product-cost-badge-bad">
                <div class="cost-value-wrapper">
                  <span class="cost-number cost-number-bad">{{ data_get($productHighlight, 'cost_without', '80') }}</span>
                  <span class="cost-unit">{{ data_get($productHighlight, 'cost_without_unit', 'Cents') }}</span>
                </div>
                <p class="cost-desc">{{ data_get($productHighlight, 'cost_without_desc', 'Por Vegetal Oxidado') }}</p>
                <span class="cost-sub-badge cost-sub-badge-bad">{{ data_get($productHighlight, 'cost_without_tag', 'Com Metabissulfito (Tóxico)') }}</span>
              </div>
            </div>

            <!-- CTA direct contact -->
            <a href="{{ data_get($productHighlight, 'cta_link', 'https://wa.me/5511999999999?text=Ol%C3%A1%2C%20gostaria%20de%20saber%20mais%20sobre%20o%20Veg%20Oxi%20200%20para%20minha%20produ%C3%A7%C3%A3o.') }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary hero-btn">
              <i data-lucide="shield-check"></i>
              {{ data_get($productHighlight, 'cta_text', 'Falar com Especialista') }}
            </a>
          </div>

          <!-- Comparison Image Right -->
          <div class="compare-container animate-fade-up delay-200">
            <div class="compare-media-wrapper">
              @if(data_get($productHighlight, 'image'))
                <img src="{{ asset('storage/' . data_get($productHighlight, 'image')) }}" alt="{{ data_get($productHighlight, 'title') }}" class="compare-img">
              @else
                <img src="{{ asset('assets/images/Veg-Oxi-200-Website.jpg') }}" alt="Comparativo de batata picada sem Veg Oxi 200 (oxidada e escura) versus com Veg Oxi 200 (clara, fresca e saudável)" class="compare-img">
              @endif
            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- Por Trás da VegQuality Section -->
    <section class="about-section">
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

    <!-- Facts & Origin Section -->
    <section class="facts-section">
      <div class="container">
        
        <!-- Header -->
        <div class="services-header animate-fade-up">
          <div class="services-tag">
            <span class="micro-badge-dot"></span>
            Por Trás do Produto
          </div>
          <h2 class="services-title">
            Fatos sobre o Veg Oxi 200
          </h2>
        </div>

        <!-- Grid of 3 Cards -->
        <div class="facts-grid animate-fade-up delay-100">
          
          <!-- Card 1: Origem -->
          <div class="fact-card">
            <div class="fact-card-icon">
              <i data-lucide="history"></i>
            </div>
            <h3 class="fact-card-title">Veg Oxi 200<br>(Origem)</h3>
            <p class="fact-card-desc">
              O Veg Oxi 200 nasceu de uma necessidade real identificada no dia a dia da Dra. Roseane Bob, através da consultoria prestada a produtores rurais que processavam vegetais. Essa imersão prática na realidade do campo foi a semente que transformou-se na VegQuality...
            </p>
            <span class="fact-card-link" data-modal-target="modal-origem">
              Saiba Mais
              <i data-lucide="chevron-right"></i>
            </span>
          </div>

          <!-- Card 2: Comercialização -->
          <div class="fact-card">
            <div class="fact-card-icon">
              <i data-lucide="award"></i>
            </div>
            <h3 class="fact-card-title">Comercialização<br>(VegQuality)</h3>
            <p class="fact-card-desc">
              A gestão comercial, a distribuição e o suporte técnico estratégico do Veg Oxi 200 são realizados com exclusividade pela VegQuality. A história do produto está diretamente ligada à origem da nossa empresa, nascida a partir das necessidades no campo...
            </p>
            <span class="fact-card-link" data-modal-target="modal-comercializacao">
              Saiba Mais
              <i data-lucide="chevron-right"></i>
            </span>
          </div>

          <!-- Card 3: Produção -->
          <div class="fact-card">
            <div class="fact-card-icon">
              <i data-lucide="factory"></i>
            </div>
            <h3 class="fact-card-title">Produção<br>(Chesquimica)</h3>
            <p class="fact-card-desc">
              Para transformar a inovação científica da Dra. Roseane Bob em uma solução de alto padrão e escala para o mercado nacional, a produção e a industrialização do Veg Oxi 200 são realizadas pela Chemiquímica Ltda, localizada no Paraná...
            </p>
            <span class="fact-card-link" data-modal-target="modal-producao">
              Saiba Mais
              <i data-lucide="chevron-right"></i>
            </span>
          </div>

        </div>

      </div>
    </section>

    <!-- Modal Elements for Full Text Reading -->
    <!-- Modal 1: Origem -->
    <div id="modal-origem" class="modal-overlay">
      <div class="modal-container">
        <button class="modal-close" aria-label="Fechar Modal">
          <i data-lucide="x"></i>
        </button>
        <h3 class="modal-title">Veg Oxi 200 (Origem)</h3>
        <div class="modal-body">
          <p>O Veg Oxi 200 nasceu de uma necessidade real identificada no dia a dia da Dra. Roseane Bob, através da consultoria prestada a produtores rurais que processavam vegetais. Essa imersão prática na realidade do campo e do galpão de processamento foi a semente que, dez anos depois, transformou-se na VegQuality, hoje uma robusta consultoria especializada na agroindústria de vegetais frescos. Vivenciando de perto as dores e os desafios reais do setor, a cientista e fundadora da VegQuality percebeu a urgência do mercado por uma solução que retardasse o processo de oxidação e deterioração dos FLV, substituindo os sulfitos com total eficiência e segurança. Após intensas pesquisas no Brasil e no exterior, a Dra. Roseane desenvolveu este inovador coadjuvante de tecnologia, respeitando rigorosamente todas as exigências regulatórias.</p>
        </div>
      </div>
    </div>

    <!-- Modal 2: Comercialização -->
    <div id="modal-comercializacao" class="modal-overlay">
      <div class="modal-container">
        <button class="modal-close" aria-label="Fechar Modal">
          <i data-lucide="x"></i>
        </button>
        <h3 class="modal-title">Comercialização (VegQuality)</h3>
        <div class="modal-body">
          <p>A gestão comercial, a distribuição e o suporte técnico estratégico do Veg Oxi 200 são realizados com exclusividade pela VegQuality. A história do produto está diretamente ligada à origem da nossa empresa. O Veg Oxi 200 nasceu há uma década, a partir da necessidade real identificada no dia a dia das consultorias prestadas pela nossa fundadora, a cientista Dra. Roseane Bob, a produtores rurais que processavam vegetais. O que começou no campo, dez anos depois se consolidou na VegQuality: uma robusta consultoria especializada na agroindústria de vegetais frescos. Ao escolher o Veg Oxi 200, o seu negócio não adquire apenas um produto, mas sim toda a bagagem prática, o atendimento especializado e o respaldo técnico de quem vive e respira o mercado de FLV.</p>
        </div>
      </div>
    </div>

    <!-- Modal 3: Produção -->
    <div id="modal-producao" class="modal-overlay">
      <div class="modal-container">
        <button class="modal-close" aria-label="Fechar Modal">
          <i data-lucide="x"></i>
        </button>
        <h3 class="modal-title">Produção (Chemiquímica)</h3>
        <div class="modal-body">
          <p><strong>Chemiquímica Ltda – Rigor e Escala Industrial:</strong> Para transformar a inovação científica da Dra. Roseane Bob em uma solução de alto padrão e escala para o mercado nacional, a produção e a industrialização do Veg Oxi 200 são realizadas pela Chemiquímica Ltda. Localizada em Ponta Grossa, no Paraná, a Chemiquímica é uma indústria moderna, robusta e estruturada, responsável por garantir o rigor analítico, a padronização e a máxima qualidade em cada lote fabricado. Essa estrutura industrial robusta garante que o Veg Oxi 200 seja entregue com total regularidade, segurança regulatória e eficiência logística para atender desde o pequeno produtor até as maiores agroindústrias do país.</p>
        </div>
      </div>
    </div>

    <!-- Blog / Radar FLV Section -->
    <section class="blog-section">
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

        <!-- Grid of 7 Cards -->
        <div class="blog-grid animate-fade-up delay-100">
          
          <!-- Post 1: SP endurece inspeção -->
          <div class="blog-card">
            <div class="blog-card-img-wrapper">
              <img src="{{ asset('assets/images/blog-lei-1854.png') }}" alt="SP endurece inspeção de vegetais" class="blog-card-img">
            </div>
            <div class="blog-card-content">
              <div class="blog-card-meta">
                <span class="blog-card-meta-item">
                  <i data-lucide="calendar"></i>
                  03 mar, 2026
                </span>
                <span class="blog-card-meta-item">
                  <i data-lucide="user"></i>
                  Roseane Bob
                </span>
                <span class="blog-card-meta-item">
                  <i data-lucide="message-square"></i>
                  0
                </span>
              </div>
              <h3 class="blog-card-title">SP endurece inspeção de vegetais processados</h3>
              <p class="blog-card-desc">No último dia 10 de março de 2026, foi publicado o Decreto nº 70.447, que regulamenta a Lei nº 18.154/2025...</p>
              <a href="{{ url('/radar') }}" class="blog-card-link">
                Leia Mais
                <i data-lucide="arrow-right"></i>
              </a>
            </div>
          </div>

          <!-- Post 2: Quem Planeja Escala -->
          <div class="blog-card">
            <div class="blog-card-img-wrapper">
              <img src="{{ asset('assets/images/plano de negocios.jpg') }}" alt="Plano de negócios agrícola" class="blog-card-img">
            </div>
            <div class="blog-card-content">
              <div class="blog-card-meta">
                <span class="blog-card-meta-item">
                  <i data-lucide="calendar"></i>
                  21 jan, 2026
                </span>
                <span class="blog-card-meta-item">
                  <i data-lucide="user"></i>
                  Roseane Bob
                </span>
                <span class="blog-card-meta-item">
                  <i data-lucide="message-square"></i>
                  0
                </span>
              </div>
              <h3 class="blog-card-title">Quem Planeja Escala, Lucra. Quem Improvisa, Perde.</h3>
              <p class="blog-card-desc">Evite prejuízos na cadeia de hortifrúti. Estruturar processos operacionais de higienização de FLV com clareza...</p>
              <a href="{{ url('/radar') }}" class="blog-card-link">
                Leia Mais
                <i data-lucide="arrow-right"></i>
              </a>
            </div>
          </div>

          <!-- Post 3: Tendências e Oportunidades -->
          <div class="blog-card">
            <div class="blog-card-img-wrapper">
              <img src="{{ asset('assets/images/new_technologies_consulting.jpg') }}" alt="Tendências e oportunidades agroindustriais" class="blog-card-img">
            </div>
            <div class="blog-card-content">
              <div class="blog-card-meta">
                <span class="blog-card-meta-item">
                  <i data-lucide="calendar"></i>
                  12 dez, 2025
                </span>
                <span class="blog-card-meta-item">
                  <i data-lucide="user"></i>
                  Roseane Bob
                </span>
                <span class="blog-card-meta-item">
                  <i data-lucide="message-square"></i>
                  0
                </span>
              </div>
              <h3 class="blog-card-title">Tendências e Oportunidades para 2026</h3>
              <p class="blog-card-desc">Novas biotecnologias e exigências do mercado para embalagens sustentáveis e eliminação de metabissulfito...</p>
              <a href="{{ url('/radar') }}" class="blog-card-link">
                Leia Mais
                <i data-lucide="arrow-right"></i>
              </a>
            </div>
          </div>

          <!-- Post 4: Colheita de Grandes Resultados -->
          <div class="blog-card">
            <div class="blog-card-img-wrapper">
              <img src="{{ asset('assets/images/WhatsApp-Image-2025-09-05-at-09.27.20-1.jpeg') }}" alt="Colheita de hortaliças frescas" class="blog-card-img">
            </div>
            <div class="blog-card-content">
              <div class="blog-card-meta">
                <span class="blog-card-meta-item">
                  <i data-lucide="calendar"></i>
                  13 out, 2025
                </span>
                <span class="blog-card-meta-item">
                  <i data-lucide="user"></i>
                  Roseane Bob
                </span>
                <span class="blog-card-meta-item">
                  <i data-lucide="message-square"></i>
                  0
                </span>
              </div>
              <h3 class="blog-card-title">Colheita de Grandes Resultados</h3>
              <p class="blog-card-desc">Como a combinação de consultoria técnica customizada e o uso de antioxidantes eficientes geram colheitas lucrativas...</p>
              <a href="{{ url('/radar') }}" class="blog-card-link">
                Leia Mais
                <i data-lucide="arrow-right"></i>
              </a>
            </div>
          </div>

          <!-- Post 5: Maturidade e Desafios -->
          <div class="blog-card">
            <div class="blog-card-img-wrapper">
              <img src="{{ asset('assets/images/talk-of-farmer-and-scientist-2025-03-15-20-53-47-utc-scaled.jpg') }}" alt="Diálogo entre produtor e cientista" class="blog-card-img">
            </div>
            <div class="blog-card-content">
              <div class="blog-card-meta">
                <span class="blog-card-meta-item">
                  <i data-lucide="calendar"></i>
                  03 out, 2025
                </span>
                <span class="blog-card-meta-item">
                  <i data-lucide="user"></i>
                  Roseane Bob
                </span>
                <span class="blog-card-meta-item">
                  <i data-lucide="message-square"></i>
                  0
                </span>
              </div>
              <h3 class="blog-card-title">A maturidade e os desafios da agroindústria</h3>
              <p class="blog-card-desc">A transição operacional de produtores tradicionais para agroindústrias modernas de processamento...</p>
              <a href="{{ url('/radar') }}" class="blog-card-link">
                Leia Mais
                <i data-lucide="arrow-right"></i>
              </a>
            </div>
          </div>

          <!-- Post 6: Veg Oxi 200: mais frescor -->
          <div class="blog-card">
            <div class="blog-card-img-wrapper">
              <img src="{{ asset('assets/images/Veg-Oxi-200-Website.jpg') }}" alt="Galão de Veg Oxi 200" class="blog-card-img">
            </div>
            <div class="blog-card-content">
              <div class="blog-card-meta">
                <span class="blog-card-meta-item">
                  <i data-lucide="calendar"></i>
                  12 ago, 2025
                </span>
                <span class="blog-card-meta-item">
                  <i data-lucide="user"></i>
                  Roseane Bob
                </span>
                <span class="blog-card-meta-item">
                  <i data-lucide="message-square"></i>
                  0
                </span>
              </div>
              <h3 class="blog-card-title">Veg Oxi 200: mais frescor e durabilidade</h3>
              <p class="blog-card-desc">Descubra como o Veg Oxi 200 atua em nível molecular para reter a oxidação de morangos, batatas e alfaces...</p>
              <a href="{{ url('/radar') }}" class="blog-card-link">
                Leia Mais
                <i data-lucide="arrow-right"></i>
              </a>
            </div>
          </div>

        </div>

      </div>
    </section>

    <!-- Resources, Downloads & Contacts Section -->
    <section class="resources-section">
      <div class="container">
        
        <!-- Section Header -->
        <div class="services-header animate-fade-up">
          <div class="services-tag">
            <span class="micro-badge-dot"></span>
            Saiba Mais
          </div>
          <h2 class="services-title">
            Detalhes Adicionais
          </h2>
        </div>

        <!-- Upper Grid: Downloads -->
        <div class="download-grid animate-fade-up delay-100">
          
          <!-- Card 1: Ficha técnica -->
          <div class="download-card">
            <div class="download-card-icon">
              <i data-lucide="file-text"></i>
            </div>
            <h3>Ficha técnica</h3>
            <p>
              Conheça o Veg Oxi 200, o aliado que substitui os sulfitos, aumenta a produtividade, preserva o frescor e garante mais tempo de vida útil aos seus vegetais.
            </p>
            <a href="{{ asset('downloads/ficha-tecnica-veg-oxi.pdf') }}" download class="btn-download">
              <i data-lucide="download"></i>
              Baixe o PDF
            </a>
          </div>

          <!-- Card 2: Protocolos de uso -->
          <div class="download-card">
            <div class="download-card-icon">
              <i data-lucide="book-open"></i>
            </div>
            <h3>Protocolos de uso</h3>
            <p>
              Tem dúvidas sobre como aplicar o Veg Oxi 200? Confira nossos protocolos de uso e boas práticas para potencializar sua eficácia e garantir o máximo desempenho em seus vegetais.
            </p>
            <a href="{{ asset('downloads/protocolos-uso.pdf') }}" download class="btn-download">
              <i data-lucide="download"></i>
              Baixe o PDF
            </a>
          </div>

        </div>

        <!-- Subheader for Contacts -->
        <h3 class="resources-subheader animate-fade-up">Canais de Atendimento</h3>

        <!-- Lower Grid: Regional Contacts -->
        <div class="local-grid animate-fade-up delay-200">
          
          <!-- Card 1: SP -->
          <div class="local-card">
            <div class="local-card-icon">
              <i data-lucide="map-pin"></i>
            </div>
            <h4>Quero Adquirir em SP</h4>
            <p>Em São Paulo o tempo não para. Se você precisa do Veg Oxi 200 para ontem, é só clicar no botão abaixo!</p>
            <a href="https://wa.me/5511999999999?text=Ol%C3%A1%2C%20gostaria%20de%20adquirir%20o%20Veg%20Oxi%20200%20em%20SP." target="_blank" rel="noopener noreferrer" class="btn-local-cta">
              Fale Conosco
            </a>
          </div>

          <!-- Card 2: Sul de Minas -->
          <div class="local-card">
            <div class="local-card-icon">
              <i data-lucide="map-pin"></i>
            </div>
            <h4>No sul de Minas</h4>
            <p>Quer seus vegetais prontos para o consumo, sem sulfitos e sempre fresquinhos em Minas Gerais? Conte com a nossa solução! 👉 Clique no botão abaixo e fale com a gente agora mesmo</p>
            <a href="https://wa.me/5535999999999?text=Ol%C3%A1%2C%20gostaria%20de%20adquirir%20o%20Veg%20Oxi%20200%20no%20Sul%20de%20Minas." target="_blank" rel="noopener noreferrer" class="btn-local-cta">
              Fale conosco
            </a>
          </div>

          <!-- Card 3: Outras Localidades -->
          <div class="local-card">
            <div class="local-card-icon">
              <i data-lucide="globe"></i>
            </div>
            <h4>Outras Localidades</h4>
            <p>Está em outra região desse nosso país continental? Não tem problema! Nossa equipe está pronta para atender clientes em todo o Brasil. 👉 Clique no botão e fale com a gente!</p>
            <a href="https://wa.me/5511999999999?text=Ol%C3%A1%2C%20estou%20em%20outra%20regi%C3%A3o%20e%20gostaria%20de%20adquirir%20o%20Veg%20Oxi%20200." target="_blank" rel="noopener noreferrer" class="btn-local-cta">
              Fale conosco
            </a>
          </div>

          <!-- Card 4: Como Distribuir -->
          <div class="local-card">
            <div class="local-card-icon">
              <i data-lucide="users"></i>
            </div>
            <h4>Como Distribuir?</h4>
            <p>🤝 É distribuidor e se interessou pelo antioxidante Veg Oxi 200? Clique no botão abaixo e fale diretamente com nossa equipe para saber todos os detalhes!</p>
            <a href="https://wa.me/5511999999999?text=Ol%C3%A1%2C%20tenho%20interesse%20em%20me%20tornar%20distribuidor%20do%20Veg%20Oxi%20200." target="_blank" rel="noopener noreferrer" class="btn-local-cta">
              Fale conosco
            </a>
          </div>

        </div>

        <!-- Combo Promo Banner -->
        <div class="promo-banner animate-fade-up delay-300">
          <div class="promo-content-wrapper">
            <h3 class="promo-title">
              Compre o Veg Oxi 200 e ganhe uma consultoria técnica de 30 minutos para otimizar seu processo e estender o shelf-life dos vegetais frescos.
            </h3>
            <a href="https://wa.me/5511999999999?text=Ol%C3%A1%2C%20quero%20adquirir%20o%20Veg%20Oxi%20200%20e%20garantir%20minha%20consultoria%20t%C3%A9cnica%20de%2030%20minutos." target="_blank" rel="noopener noreferrer" class="btn-promo-action">
              <i data-lucide="gift" style="margin-right: 0.5rem; width: 1.25rem; height: 1.25rem;"></i>
              GARANTIR VEG OXI + CONSULTORIA
            </a>
          </div>
        </div>

      </div>
    </section>
@endsection
