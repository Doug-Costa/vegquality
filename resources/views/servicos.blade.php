@extends('layouts.app')

@section('title', 'Serviços Oferecidos | VegQuality - Consultoria & Tecnologia para FLV')
@section('meta_description', 'Conheça nossos serviços de planos de negócios, treinamentos direcionados e a tecnologia exclusiva do Veg Oxi 200. Tire suas dúvidas sobre o processamento de vegetais frescos.')

@section('content')
@php
    $hero = $page?->sections->where('key', 'servicos_hero')->first()?->content;
    $catalog = $page?->sections->where('key', 'servicos_catalog')->first()?->content;
    $faq = $page?->sections->where('key', 'servicos_faq')->first()?->content;
    $clientes = $page?->sections->where('key', 'servicos_clientes')->first()?->content;
    $contacts = $page?->sections->where('key', 'servicos_contacts')->first()?->content;
@endphp
<!-- Hero Interno -->
    <section class="internal-hero">
      <div class="container">
        <div class="breadcrumb animate-fade-up">
          <a href="{{ url('/') }}">Início</a>
          <span class="breadcrumb-separator">/</span>
          <span>Serviços Oferecidos</span>
        </div>
        <h1 class="internal-hero-title animate-fade-up delay-100">
          {{ data_get($hero, 'title', 'Serviços Oferecidos') }}
        </h1>
        <p class="internal-hero-desc animate-fade-up delay-200">
          {{ data_get($hero, 'subtitle', 'Soluções estratégicas e operacionais de ponta para elevar a rentabilidade e o padrão de qualidade na agroindústria.') }}
        </p>
      </div>
    </section>

    <!-- Catálogo de Serviços -->
    <section class="services-section">
      <div class="container">
        
        <div class="services-header animate-fade-up">
          <div class="services-tag">
            <span class="micro-badge-dot"></span>
            {{ data_get($catalog, 'badge', 'Nossos Serviços') }}
          </div>
          <h2 class="services-title">{{ data_get($catalog, 'title', 'Soluções Completas & Especializadas') }}</h2>
        </div>

        <div class="services-grid animate-fade-up delay-100">
          
          <!-- Card 1: Plano de Negócios / Projetos -->
          <div class="service-card">
            <div class="service-card-icon">
              <i data-lucide="briefcase"></i>
            </div>
            <span class="micro-badge" style="margin-bottom: 0.75rem; padding: 0.25rem 0.5rem; font-size: 0.65rem;">{{ data_get($catalog, 'service1_badge', 'Projetos') }}</span>
            <h3 class="service-card-title">{{ data_get($catalog, 'service1_title', 'Plano de Negócios') }}</h3>
            <p class="service-card-desc">
              {{ data_get($catalog, 'service1_desc', 'Auxiliamos empreendedores que desejam iniciar, estruturar, ampliar ou profissionalizar operações na produção de vegetais frescos processados.') }}
            </p>
            <a href="{{ data_get($catalog, 'service1_link', 'https://wa.me/551151940325?text=Ol%C3%A1%2C%20gostaria%20de%20saber%20mais%20sobre%20a%20consultoria%20em%20Plano%20de%20Neg%C3%B3cios.') }}" target="_blank" rel="noopener noreferrer" class="service-card-link">
              Solicitar Informações
              <i data-lucide="arrow-right"></i>
            </a>
          </div>

          <!-- Card 2: Treinamentos Direcionados -->
          <div class="service-card">
            <div class="service-card-icon">
              <i data-lucide="graduation-cap"></i>
            </div>
            <span class="micro-badge" style="margin-bottom: 0.75rem; padding: 0.25rem 0.5rem; font-size: 0.65rem;">{{ data_get($catalog, 'service2_badge', 'Treinamentos') }}</span>
            <h3 class="service-card-title">{{ data_get($catalog, 'service2_title', 'Treinamentos Direcionados') }}</h3>
            <p class="service-card-desc">
              {{ data_get($catalog, 'service2_desc', 'Treinamentos práticos e teóricos para auxiliar sua equipe na execução dos processos de produção de vegetais frescos processados, do campo à gôndola.') }}
            </p>
            <a href="{{ data_get($catalog, 'service2_link', 'https://wa.me/551151940325?text=Ol%C3%A1%2C%20gostaria%20de%20saber%20mais%20sobre%20os%20Treinamentos%20Direcionados.') }}" target="_blank" rel="noopener noreferrer" class="service-card-link">
              Solicitar Informações
              <i data-lucide="arrow-right"></i>
            </a>
          </div>

          <!-- Card 3: Veg Oxi 200 / Tecnologia de Ponta -->
          <div class="service-card" style="grid-column: span 2; border-color: rgba(46, 125, 50, 0.3); background: linear-gradient(to bottom right, #ffffff, var(--color-veg-light));">
            <div class="service-card-icon" style="background-color: var(--color-veg-primary); color: white;">
              <i data-lucide="shield-check"></i>
            </div>
            <span class="micro-badge" style="margin-bottom: 0.75rem; padding: 0.25rem 0.5rem; font-size: 0.65rem; background-color: var(--color-veg-dark); color: white; border-color: transparent;">{{ data_get($catalog, 'service3_badge', 'Tecnologia de Ponta') }}</span>
            <h3 class="service-card-title">{{ data_get($catalog, 'service3_title', 'Veg Oxi 200') }}</h3>
            <p class="service-card-desc" style="font-size: 0.95rem;">
              {{ data_get($catalog, 'service3_desc', 'O Veg Oxi 200 contribui para o aumento do shelf-life de FLV pós-colheita e vegetais frescos processados, contribui para a substituição definitiva do metabissulfito de sódio e demais sulfitos químicos que prejudicam a saúde.') }}
            </p>
            <a href="{{ data_get($catalog, 'service3_link', 'https://wa.me/551151940325?text=Ol%C3%A1%2C%20gostaria%20de%20saber%20mais%20sobre%20o%20Veg%20Oxi%20200.') }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary" style="margin-top: 1rem; display: inline-flex; width: fit-content; align-items: center; gap: 0.5rem; text-decoration: none;">
              <i data-lucide="shopping-cart"></i>
              Quero Adquirir
            </a>
          </div>

        </div>

      </div>
    </section>

    <!-- Seção FAQ (Perguntas Frequentes) -->
    <section class="faq-section">
      <div class="container">
        
        <div class="services-header animate-fade-up">
          <div class="services-tag">
            <span class="micro-badge-dot"></span>
            {{ data_get($faq, 'badge', 'FAQ Técnico') }}
          </div>
          <h2 class="services-title">{{ data_get($faq, 'title', 'Perguntas Frequentes') }}</h2>
          <p class="services-desc">{{ data_get($faq, 'description', 'Esclareça suas dúvidas técnicas sobre processos industriais, legislação e biotecnologia agrícola.') }}</p>
        </div>

        @php
          $faqItems = collect(data_get($faq, 'faqs', []))->groupBy('category');
        @endphp

        <div class="faq-container">
          @forelse($faqItems as $categoryName => $items)
            <div class="faq-category animate-fade-up">
              <h3 class="faq-category-title">
                @php
                  $icon = 'help-circle';
                  if (str_contains($categoryName, 'Mercado')) $icon = 'trending-up';
                  elseif (str_contains($categoryName, 'Tecnologia')) $icon = 'sprout';
                  elseif (str_contains($categoryName, 'Maquinários')) $icon = 'settings';
                  elseif (str_contains($categoryName, 'Operação')) $icon = 'award';
                  elseif (str_contains($categoryName, 'Legislação')) $icon = 'file-text';
                @endphp
                <i data-lucide="{{ $icon }}" style="width: 1.25rem; height: 1.25rem;"></i>
                {{ $categoryName }}
              </h3>
              <div class="faq-group">
                @foreach($items as $item)
                  <div class="faq-item">
                    <button class="faq-question">
                      <span>{{ data_get($item, 'question') }}</span>
                      <i data-lucide="chevron-down" class="faq-icon-chevron"></i>
                    </button>
                    <div class="faq-answer">
                      <p>{{ data_get($item, 'answer') }}</p>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          @empty
            <p class="text-center text-gray-500">Nenhuma pergunta cadastrada.</p>
          @endforelse
        </div>

      </div>
    </section>

    <!-- Seção CTA (Fale Conosco - Vamos Conversar) -->
    <section class="cta-conversar-section" style="background-color: var(--color-veg-light);">
      <div class="container">
        <div class="cta-conversar-grid">
          
          <!-- Content Left -->
          <div class="cta-conversar-content animate-fade-up">
            <h2 class="cta-conversar-title">
              {!! data_get($contacts, 'conversar_title', 'Ainda tem dúvidas sobre a adequação da sua planta ou quer aplicar a tecnologia Veg Oxi 200 no seu negócio?<br><span style="color: var(--color-veg-primary);">VAMOS CONVERSAR!</span>') !!}
            </h2>
            
            <div class="conversar-pillars">
              
              <!-- Pillar 1 -->
              <div class="conversar-pillar-item">
                <div class="conversar-pillar-icon">
                  <i data-lucide="heart"></i>
                </div>
                <div class="conversar-pillar-text">
                  <h4>{{ data_get($contacts, 'conversar_p1_title', 'Livre de Sulfitos') }}</h4>
                  <p>{{ data_get($contacts, 'conversar_p1_desc', 'Se você atua com vegetais frescos, higienizados e prontos para o consumo, o Veg Oxi 200 é a alternativa saudável e eficaz para substituir o metabissulfito e demais sulfitos.') }}</p>
                </div>
              </div>

              <!-- Pillar 2 -->
              <div class="conversar-pillar-item">
                <div class="conversar-pillar-icon">
                  <i data-lucide="trending-up"></i>
                </div>
                <div class="conversar-pillar-text">
                  <h4>{{ data_get($contacts, 'conversar_p2_title', 'Lucro Real') }}</h4>
                  <p>{{ data_get($contacts, 'conversar_p2_desc', 'Veg Oxi 200, o único antioxidante natural e eficaz que substitui os sulfitos, aumenta a vida útil dos vegetais prontos para o consumo, preserva a qualidade e a saudabilidade desses alimentos, além de reduzir perdas (quebras).') }}</p>
                </div>
              </div>

            </div>
          </div>

          <!-- Action Box Right -->
          <div class="animate-fade-up delay-100">
            <div class="conversar-action-box">
              <h3 class="action-box-title">{{ data_get($contacts, 'action_box_title', 'Transforme sua Produção') }}</h3>
              <p class="action-box-desc">
                {{ data_get($contacts, 'action_box_desc', 'Conte com a expertise e a inovação tecnológica da VegQuality para otimizar seus processos de FLV.') }}
              </p>
              
              <a href="{{ data_get($contacts, 'action_box_cta_link', 'https://wa.me/551151940325?text=Ol%C3%A1%2C%20gostaria%20de%20conversar%20sobre%20as%20solu%C3%A7%C3%B5es%20da%20VegQuality.') }}" target="_blank" rel="noopener noreferrer" class="btn-conversar" style="display: inline-flex; align-items: center; justify-content: center; gap: 0.5rem; text-decoration: none;">
                <i data-lucide="message-circle"></i>
                {{ data_get($contacts, 'action_box_cta_text', 'Falar Conosco') }}
              </a>

              <!-- Counters inline -->
              <div class="conversar-indicators">
                <div class="conversar-indicator-card">
                  <div class="conversar-indicator-number">{{ data_get($contacts, 'indicator1_num', '100%') }}</div>
                  <div class="conversar-indicator-label">{{ data_get($contacts, 'indicator1_label', 'Livre de Sulfitos') }}</div>
                </div>
                <div class="conversar-indicator-card">
                  <div class="conversar-indicator-number">{{ data_get($contacts, 'indicator2_num', '60%') }}</div>
                  <div class="conversar-indicator-label">{{ data_get($contacts, 'indicator2_label', 'Lucro sob perdas') }}</div>
                </div>
              </div>

            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- Seção Clientes -->
    <section class="faq-section" style="background-color: var(--color-bg-base);">
      <div class="container">
        
        <div class="services-header animate-fade-up">
          <div class="services-tag">
            <span class="micro-badge-dot"></span>
            {{ data_get($clientes, 'badge', 'Parcerias de Sucesso') }}
          </div>
          <h2 class="services-title">{{ data_get($clientes, 'title', 'Alguns de Nossos Clientes') }}</h2>
          <p class="services-desc">{{ data_get($clientes, 'description', 'Marcas e cooperativas agrícolas que confiam no suporte técnico e biotecnológico da VegQuality.') }}</p>
        </div>

        @php
          $clientLogos = data_get($clientes, 'logos', []);
          if (empty($clientLogos) || !is_array($clientLogos)) {
              $clientLogos = ['assets/clientes/cliente1.png', 'assets/clientes/cliente2.png', 'assets/clientes/cliente3.png'];
              $isLogoAsset = true;
          } else {
              $isLogoAsset = false;
          }
        @endphp

        <div class="clients-grid animate-fade-up delay-100">
          @foreach($clientLogos as $logo)
            <div class="client-card">
              <img src="{{ $isLogoAsset ? asset($logo) : asset('storage/' . $logo) }}" alt="Cliente VegQuality" class="client-logo-img">
            </div>
          @endforeach
        </div>

      </div>
    </section>

    <!-- Combo Promo Banner -->
    <div class="promo-banner animate-fade-up delay-300" style="margin: 4rem auto; max-width: 1200px; padding: 0 1rem;">
      <div class="promo-content-wrapper">
        <h3 class="promo-title">
          {{ data_get($contacts, 'promo_title', 'Compre o Veg Oxi 200 e ganhe uma consultoria técnica de 30 minutos para otimizar seu processo e estender o shelf-life dos vegetais frescos.') }}
        </h3>
        <a href="{{ data_get($contacts, 'promo_cta_link', 'https://wa.me/5511999999999?text=Ol%C3%A1%2C%20quero%20adquirir%20o%20Veg%20Oxi%20200%20e%20garantir%20minha%20consultoria%20t%C3%A9cnica%20de%2030%20minutos.') }}" target="_blank" rel="noopener noreferrer" class="btn-promo-action" style="display: inline-flex; align-items: center; justify-content: center; gap: 0.5rem; text-decoration: none;">
          <i data-lucide="gift" style="width: 1.25rem; height: 1.25rem;"></i>
          {{ data_get($contacts, 'promo_cta_text', 'GARANTIR VEG OXI + CONSULTORIA') }}
        </a>
      </div>
    </div>
@endsection
