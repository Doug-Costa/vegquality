@extends('layouts.app')
@section('title', $page->title)
@section('meta_description', $page->meta_description)
@section('content')
@php
    $isEn = app()->getLocale() === 'en' || str_starts_with(app()->getLocale(), 'en');

    $heroSection = $page?->sections->where('key', 'veg_oxi_hero')->first();
    $hero = $heroSection?->content;

    $productHighlightSection = $page?->sections->where('key', 'product_highlight')->first();
    $productHighlight = $productHighlightSection?->content;

    $factsSection = $page?->sections->where('key', 'veg_oxi_facts')->first();
    $facts = $factsSection?->content;

    $downloadsSection = $page?->sections->where('key', 'veg_oxi_downloads')->first();
    $downloads = $downloadsSection?->content;

    $contactsSection = $page?->sections->where('key', 'veg_oxi_contacts')->first();
    $contacts = $contactsSection?->content;
@endphp

<!-- Subpage Hero -->
@if(is_section_visible($heroSection))
<section class="subpage-hero">
  <div class="hero-bg-shape-1"></div>
  <div class="hero-bg-shape-2"></div>
  <div class="container">
    <h1 class="subpage-hero-title animate-fade-up">{{ trans_content($hero, 'title', 'Veg Oxi 200') }}</h1>
    <p class="subpage-hero-subtitle animate-fade-up delay-100">{{ trans_content($hero, 'subtitle', 'Tecnologia inovadora para conservação e qualidade de vegetais frescos.') }}</p>
  </div>
</section>
@endif

<!-- Facts Section -->
@if(is_section_visible($factsSection) && $facts)
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

    @php
      $isEn = app()->getLocale() === 'en' || str_starts_with(app()->getLocale(), 'en');
      $factCards = [
          [
              'icon' => 'flask-conical',
              'title' => $isEn ? "Scientifically\nDeveloped" : "Desenvolvido\nCientificamente",
              'desc' => $isEn ? 'Formulated based on years of research in post-harvest food technology.' : 'Formulado com base em anos de pesquisa em tecnologia pós-colheita.',
              'body' => $isEn ? 'Developed to replace sodium metabisulfite without leaving toxic residues or altering taste and aroma.' : 'Desenvolvido para substituir o metabissulfito de sódio sem deixar resíduos tóxicos nem alterar sabor e aroma dos alimentos.',
          ],
          [
              'icon' => 'leaf',
              'title' => $isEn ? "Sulfite-Free\n& Organic" : "Livre de Sulfitos\n& Orgânico",
              'desc' => $isEn ? 'Eliminates chemical preservatives harmful to health.' : 'Elimina conservantes químicos nocivos à saúde.',
              'body' => $isEn ? '100% natural formula compliant with health and environmental regulatory standards.' : 'Fórmula 100% natural em conformidade com as normas regulatórias sanitárias e ambientais mais exigentes.',
          ],
          [
              'icon' => 'trending-up',
              'title' => $isEn ? "Proven\nCost-Benefit" : "Custo-Benefício\nComprovado",
              'desc' => $isEn ? 'Drastically reduces waste and breakdown losses.' : 'Reduz drasticamente o desperdício e perdas por quebra.',
              'body' => $isEn ? 'Costs only around 1 cent per processed vegetable, generating real profit by preserving quality.' : 'Custa apenas cerca de 1 centavo por hortaliça processada, gerando lucro real ao preservar a qualidade.',
          ],
          [
              'icon' => 'settings',
              'title' => $isEn ? "Easy Industrial\nApplication" : "Fácil Aplicação\nIndustrial",
              'desc' => $isEn ? 'Integrates seamlessly into existing wash and sanitization lines.' : 'Integra-se perfeitamente em linhas de lavagem existentes.',
              'body' => $isEn ? 'Requires no costly machinery overhauls; easily dosed into standard processing wash tanks.' : 'Não exige reformas estruturais em maquinários; facilmente dosado em tanques de lavagem padrão.',
          ],
      ];
    @endphp

    <style>
      .facts-grid {
        display: grid !important;
        grid-template-columns: 1fr !important;
        gap: 1.5rem !important;
      }
      @media (min-width: 992px) {
        .facts-grid {
          grid-template-columns: repeat(4, 1fr) !important;
        }
      }
      @media (min-width: 640px) and (max-width: 991px) {
        .facts-grid {
          grid-template-columns: repeat(2, 1fr) !important;
        }
      }
      .fact-card {
        padding: 2.25rem 1.5rem !important;
      }
    </style>

    <div class="facts-grid animate-fade-up delay-100">
      @foreach($factCards as $index => $card)
        <div class="fact-card">
          <div class="fact-card-icon">
            <i data-lucide="{{ data_get($card, 'icon', 'info') }}"></i>
          </div>
          <h3 class="fact-card-title">{!! nl2br(e($card['title'])) !!}</h3>
          <p class="fact-card-desc">
            {{ $card['desc'] }}
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
@foreach($factCards as $index => $card)
  <div id="modal-fact-{{ $index }}" class="modal-overlay">
    <div class="modal-container">
      <button class="modal-close" aria-label="Fechar Modal">
        <i data-lucide="x"></i>
      </button>
      <h3 class="modal-title">{{ $card['title'] }}</h3>
      <div class="modal-body">
        <p>{!! nl2br(e($card['body'])) !!}</p>
      </div>
    </div>
  </div>
@endforeach
@endif

<!-- Downloads / Detalhes Adicionais Section -->
@if(is_section_visible($downloadsSection) && $downloads)
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

    @php
      $downloadCards = [
          [
              'title' => $isEn ? 'Technical Spec Sheet' : 'Ficha técnica',
              'desc' => $isEn ? 'Consult the Veg Oxi 200 technical data sheet and find all details on composition, application, physical-chemical properties, storage, regulation, and usage recommendations.' : 'Consulte a ficha técnica do Veg Oxi 200 e conheça todos os detalhes sobre sua composição, aplicação, propriedades físico-químicas, armazenamento, regulamentação e recomendações de uso.',
              'file' => 'downloads/ficha-tecnica-veg-oxi-200.pdf',
          ],
          [
              'title' => $isEn ? 'Usage Protocols' : 'Protocolos de uso',
              'desc' => $isEn ? 'Access the usage protocols to learn how to apply Veg Oxi 200 to each vegetable group for maximum efficiency, performance, and shelf life.' : 'Acesse os protocolos de uso e descubra como aplicar o Veg Oxi 200 em cada grupo de vegetais para obter máxima eficiência, desempenho e vida útil dos FLV minimamente processados.',
              'file' => 'downloads/protocolos-de-uso-veg-oxi-200.pdf',
          ],
          [
              'title' => $isEn ? 'MSDS (Safety Data Sheet)' : 'FDS',
              'desc' => $isEn ? 'Access the Veg Oxi 200 MSDS to consult safety, handling, storage, transport, emergency measures, and recommendations for safe product use.' : 'Acesse a FDS do Veg Oxi 200 e consulte informações sobre segurança, manuseio, armazenamento, transporte, medidas de emergência e recomendações para o uso seguro do produto.',
              'file' => 'downloads/fds-veg-oxi-200.pdf',
          ],
      ];
    @endphp

    <style>
      .download-grid {
        display: grid !important;
        grid-template-columns: 1fr !important;
        gap: 1.5rem !important;
      }
      @media (min-width: 768px) {
        .download-grid {
          grid-template-columns: repeat(3, 1fr) !important;
        }
      }
    </style>

    <div class="download-grid animate-fade-up delay-100">
      @foreach($downloadCards as $dl)
        <div class="download-card">
          <div class="download-card-icon">
            <i data-lucide="file-text"></i>
          </div>
          <h3>{{ $dl['title'] }}</h3>
          <p>{{ $dl['desc'] }}</p>
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

<!-- Section 3.5: Biotecnologia / Veg Oxi 200 Propaganda Section -->
@if(is_section_visible($productHighlightSection) && $productHighlight)
<section class="product-highlight-section" style="background-color: #ffffff;">
  <div class="container">
    <div class="product-highlight-grid">
      
      <!-- Content Left -->
      <div class="product-highlight-content animate-fade-up">
        <div class="product-tag">
          <span class="micro-badge-dot"></span>
          {{ $isEn ? 'Biotechnology' : trans_content($productHighlight, 'badge', 'Biotecnologia') }}
        </div>
        <h2 class="product-highlight-title">
          {{ $isEn ? 'Veg Oxi 200 - Processing Aid' : trans_content($productHighlight, 'title', 'Veg Oxi 200 - Coadjuvante de tecnologia') }}
        </h2>
        <p class="product-highlight-subtitle">
          {{ $isEn ? 'An Investment Worth Making!' : trans_content($productHighlight, 'subtitle', 'Um Investimento que Vale a Pena!') }}
        </p>

        <div class="badges-container">
          <!-- Badge 1: Com Veg Oxi 200 -->
          <div class="product-cost-badge">
            <div class="cost-value-wrapper">
              <span class="cost-number">{{ trans_content($productHighlight, 'cost_with', '30') }}</span>
              <span class="cost-unit">{{ trans_content($productHighlight, 'cost_with_unit', $isEn ? 'Cents' : 'Centavos') }}</span>
            </div>
            <p class="cost-desc">{{ trans_content($productHighlight, 'cost_with_desc', $isEn ? 'Per Fresh Vegetable' : 'Por Vegetal Fresco') }}</p>
            <span class="cost-sub-badge">{{ trans_content($productHighlight, 'cost_with_tag', $isEn ? 'Sulfite-Free (Safe)' : 'Livre de Sulfitos (Seguro)') }}</span>
          </div>

          <!-- Badge 2: Sem Veg Oxi 200 -->
          <div class="product-cost-badge product-cost-badge-bad">
            <div class="cost-value-wrapper">
              <span class="cost-number cost-number-bad" style="color: #dc2626 !important;">{{ trans_content($productHighlight, 'cost_without', '80') }}</span>
              <span class="cost-unit" style="color: #dc2626 !important;">{{ trans_content($productHighlight, 'cost_without_unit', $isEn ? 'Cents' : 'Centavos') }}</span>
            </div>
            <p class="cost-desc">{{ trans_content($productHighlight, 'cost_without_desc', $isEn ? 'Per Oxidized Vegetable' : 'Por Vegetal Oxidado') }}</p>
            <span class="cost-sub-badge cost-sub-badge-bad">{{ trans_content($productHighlight, 'cost_without_tag', $isEn ? 'With Metabisulfite (Toxic)' : 'Com Metabissulfito (Tóxico)') }}</span>
          </div>
        </div>

        <a href="{{ trans_content($productHighlight, 'cta_link', '#veg_oxi_contacts') }}" class="btn btn-primary hero-btn">
          <i data-lucide="shield-check"></i>
          {{ trans_content($productHighlight, 'cta_text', $isEn ? 'Acquire Veg Oxi 200' : 'Adquirir Veg Oxi 200') }}
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
@if(is_section_visible($contactsSection) && $contacts)
<section id="veg_oxi_contacts" class="resources-section" style="background-color: #ffffff; padding: 5rem 0;">
  <div class="container">
    <div class="services-header animate-fade-up">
      <div class="services-tag">
        <span class="micro-badge-dot"></span>
        {{ $isEn ? 'Distribution' : trans_content($contacts, 'badge', 'Distribuição') }}
      </div>
      <h2 class="services-title">
        {{ $isEn ? 'Veg Oxi 200 Distribution' : trans_content($contacts, 'title', 'Distribuição Veg Oxi 200') }}
      </h2>
    </div>

    @php
      $contactCards = [
          [
              'title' => $isEn ? 'Purchase in SP' : 'Quero Adquirir em SP',
              'desc' => $isEn ? 'In agro-industry, every hour counts. If Veg Oxi 200 is urgent for your production, click below and request support.' : 'Na agroindústria, cada hora conta. Se o Veg Oxi 200 é urgente para sua produção, clique no botão abaixo e solicite seu atendimento.',
              'link' => 'https://wa.me/5511978348438',
          ],
          [
              'title' => $isEn ? 'South of Minas Gerais' : 'No Sul de Minas Gerais',
              'desc' => $isEn ? 'Also in Minas Gerais: more freshness, higher quality, and reduced losses. Click to contact us!' : 'Também em Minas Gerais: mais frescor, mais qualidade e menos perdas. Clique e fale conosco!',
              'link' => 'https://wa.me/5511978348438',
          ],
          [
              'title' => $isEn ? 'Other Locations' : 'Outras Localidades',
              'desc' => $isEn ? 'Located in another region of Brazil? No problem! Our team serves clients nationwide. Click below and contact us!' : 'Está em outra região do Brasil? Sem problema! Nossa equipe atende clientes em todo o país. Clique no botão abaixo e fale conosco!',
              'link' => 'https://wa.me/5511978348438',
          ],
          [
              'title' => $isEn ? 'How to Distribute?' : 'Como Distribuir?',
              'desc' => $isEn ? 'Are you a distributor looking to carry Veg Oxi 200 in your region? Click below and talk to our team!' : 'É distribuidor e quer levar o Veg Oxi 200 para sua região? Clique no botão abaixo e fale com nossa equipe!',
              'link' => 'https://wa.me/5511978348438',
          ],
      ];
    @endphp

    <div class="local-grid animate-fade-up delay-100">
      @foreach($contactCards as $contact)
        <div class="local-card">
          <div class="local-card-icon">
            <i data-lucide="map-pin"></i>
          </div>
          <h4>{{ $contact['title'] }}</h4>
          <p>{{ $contact['desc'] }}</p>
          <a href="{{ data_get($contact, 'link', 'https://wa.me/5511978348438') }}" target="_blank" rel="noopener noreferrer" class="btn-local-cta">
            {{ __('Fale Conosco') }}
          </a>
        </div>
      @endforeach
    </div>

  </div>
</section>
@endif
@endsection
