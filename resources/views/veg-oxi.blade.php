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
@if(is_section_visible($hero))
<section class="subpage-hero">
  <div class="hero-bg-shape-1"></div>
  <div class="hero-bg-shape-2"></div>
  <div class="container">
    <h1 class="subpage-hero-title animate-fade-up">{{ trans_content($hero, 'title', 'Veg Oxi 200') }}</h1>
    <p class="subpage-hero-subtitle animate-fade-up delay-100">{{ trans_content($hero, 'subtitle', 'Tecnologia inovadora para conservação e qualidade de vegetais frescos.') }}</p>
  </div>
</section>
@endif<!-- Facts Section -->
@if(is_section_visible($facts) && $facts)
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
      $dynamicFacts = data_get($facts, 'cards', []);
      if (!empty($dynamicFacts) && is_array($dynamicFacts)) {
          $factCards = $dynamicFacts;
      } else {
          $factCards = [
              [
                  'icon' => 'flask-conical',
                  'title' => "Desenvolvido\nCientificamente",
                  'title_en' => "Scientifically\nDeveloped",
                  'desc' => 'Formulado com base em anos de pesquisa em tecnologia pós-colheita.',
                  'desc_en' => 'Formulated based on years of research in post-harvest food technology.',
                  'body' => 'Desenvolvido para substituir o metabissulfito de sódio sem deixar resíduos tóxicos nem alterar sabor e aroma dos alimentos.',
                  'body_en' => 'Developed to replace sodium metabisulfite without leaving toxic residues or altering taste and aroma.',
              ],
              [
                  'icon' => 'leaf',
                  'title' => "Livre de Sulfitos\n& Orgânico",
                  'title_en' => "Sulfite-Free\n& Organic",
                  'desc' => 'Elimina conservantes químicos nocivos à saúde.',
                  'desc_en' => 'Eliminates chemical preservatives harmful to health.',
                  'body' => 'Fórmula 100% natural em conformidade com as normas regulatórias sanitárias e ambientais mais exigentes.',
                  'body_en' => '100% natural formula compliant with health and environmental regulatory standards.',
              ],
              [
                  'icon' => 'trending-up',
                  'title' => "Custo-Benefício\nComprovado",
                  'title_en' => "Proven\nCost-Benefit",
                  'desc' => 'Reduz drasticamente o desperdício e perdas por quebra.',
                  'desc_en' => 'Drastically reduces waste and breakdown losses.',
                  'body' => 'Custa apenas cerca de 1 centavo por hortaliça processada, gerando lucro real ao preservar a qualidade.',
                  'body_en' => 'Costs only around 1 cent per processed vegetable, generating real profit by preserving quality.',
              ],
              [
                  'icon' => 'settings',
                  'title' => "Fácil Aplicação\nIndustrial",
                  'title_en' => "Easy Industrial\nApplication",
                  'desc' => 'Integra-se perfeitamente em linhas de lavagem existentes.',
                  'desc_en' => 'Integrates seamlessly into existing wash and sanitization lines.',
                  'body' => 'Não exige reformas estruturais em maquinários; facilmente dosado em tanques de lavagem padrão.',
                  'body_en' => 'Requires no costly machinery overhauls; easily dosed into standard processing wash tanks.',
              ],
          ];
      }
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
        @if(is_section_visible($card))
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
        @endif
      @endforeach
    </div>
  </div>
</section>

<!-- Modals for Facts -->
@foreach($factCards as $index => $card)
  @if(is_section_visible($card))
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
  @endif
@endforeach
@endif

<!-- Downloads / Detalhes Adicionais Section -->
@if(is_section_visible($downloads) && $downloads)
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
      $downloadCards = [];
      $dynamicList = data_get($downloads, 'downloads');
      
      if (!empty($dynamicList) && is_array($dynamicList)) {
          foreach ($dynamicList as $dl) {
              if (!is_section_visible($dl)) {
                  continue;
              }
              $file = data_get($dl, 'file');
              if ($file) {
                  $downloadCards[] = [
                      'title' => trans_content($dl, 'title'),
                      'desc' => trans_content($dl, 'desc'),
                      'file' => $file,
                      'is_dynamic' => true,
                  ];
              }
          }
      }

      if (empty($downloadCards) && empty($dynamicList)) {
          $downloadCards = [
              [
                  'title' => $isEn ? 'Technical Spec Sheet' : 'Ficha técnica',
                  'desc' => $isEn ? 'Consult the Veg Oxi 200 technical data sheet and find all details on composition, application, physical-chemical properties, storage, regulation, and usage recommendations.' : 'Consulte a ficha técnica do Veg Oxi 200 e conheça todos os detalhes sobre sua composição, aplicação, propriedades físico-químicas, armazenamento, regulamentação e recomendações de uso.',
                  'file' => 'downloads/ficha-tecnica-veg-oxi-200.pdf',
                  'is_dynamic' => false,
              ],
              [
                  'title' => $isEn ? 'Usage Protocols' : 'Protocolos de uso',
                  'desc' => $isEn ? 'Access the usage protocols to learn how to apply Veg Oxi 200 to each vegetable group for maximum efficiency, performance, and shelf life.' : 'Acesse os protocolos de uso e descubra como aplicar o Veg Oxi 200 em cada grupo de vegetais para obter máxima eficiência, desempenho e vida útil dos FLV minimamente processados.',
                  'file' => 'downloads/protocolos-de-uso-veg-oxi-200.pdf',
                  'is_dynamic' => false,
              ],
              [
                  'title' => $isEn ? 'MSDS (Safety Data Sheet)' : 'FDS',
                  'desc' => $isEn ? 'Access the Veg Oxi 200 MSDS to consult safety, handling, storage, transport, emergency measures, and recommendations for safe product use.' : 'Acesse a FDS do Veg Oxi 200 e consulte informações sobre segurança, manuseio, armazenamento, transporte, medidas de emergência e recomendações para o uso seguro do produto.',
                  'file' => 'downloads/fds-veg-oxi-200.pdf',
                  'is_dynamic' => false,
              ],
          ];
      }
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
            
            if (str_starts_with($fileUrl, 'http://') || str_starts_with($fileUrl, 'https://')) {
                $finalUrl = $fileUrl;
            } elseif (str_starts_with($fileUrl, 'downloads/')) {
                if (empty($dl['is_dynamic']) && file_exists(public_path($fileUrl))) {
                    $finalUrl = asset($fileUrl);
                } else {
                    $finalUrl = asset('storage/' . $fileUrl);
                }
            } else {
                $finalUrl = asset('storage/' . $fileUrl);
            }
          @endphp
          <a href="{{ $finalUrl }}" download class="btn-download">
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
@if(is_section_visible($productHighlight) && $productHighlight)
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

        @php
          $showCardGreen = $isEn
              ? (bool) data_get($productHighlight, 'show_cost_with_en', true)
              : (bool) data_get($productHighlight, 'show_cost_with', true);

          $showCardRed = $isEn
              ? (bool) data_get($productHighlight, 'show_cost_without_en', true)
              : (bool) data_get($productHighlight, 'show_cost_without', true);
        @endphp

        @if($showCardGreen || $showCardRed)
        <div class="badges-container">
          <!-- Badge 1: Com Veg Oxi 200 -->
          @if($showCardGreen)
          <div class="product-cost-badge">
            <div class="cost-value-wrapper">
              <span class="cost-number">{{ trans_content($productHighlight, 'cost_with', '30') }}</span>
              <span class="cost-unit">{{ trans_content($productHighlight, 'cost_with_unit', $isEn ? 'Cents' : 'Centavos') }}</span>
            </div>
            <p class="cost-desc">{{ trans_content($productHighlight, 'cost_with_desc', $isEn ? 'Per Fresh Vegetable' : 'Por Vegetal Fresco') }}</p>
            <span class="cost-sub-badge">{{ trans_content($productHighlight, 'cost_with_tag', $isEn ? 'Sulfite-Free (Safe)' : 'Livre de Sulfitos (Seguro)') }}</span>
          </div>
          @endif

          <!-- Badge 2: Sem Veg Oxi 200 -->
          @if($showCardRed)
          <div class="product-cost-badge product-cost-badge-bad">
            <div class="cost-value-wrapper">
              <span class="cost-number cost-number-bad" style="color: #dc2626 !important;">{{ trans_content($productHighlight, 'cost_without', '80') }}</span>
              <span class="cost-unit" style="color: #dc2626 !important;">{{ trans_content($productHighlight, 'cost_without_unit', $isEn ? 'Cents' : 'Centavos') }}</span>
            </div>
            <p class="cost-desc">{{ trans_content($productHighlight, 'cost_without_desc', $isEn ? 'Per Oxidized Vegetable' : 'Por Vegetal Oxidado') }}</p>
            <span class="cost-sub-badge cost-sub-badge-bad">{{ trans_content($productHighlight, 'cost_without_tag', $isEn ? 'With Metabisulfite (Toxic)' : 'Com Metabissulfito (Tóxico)') }}</span>
          </div>
          @endif
        </div>
        @endif

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
@if(is_section_visible($contacts) && $contacts)
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

    @php
      $dynamicContacts = data_get($contacts, 'contacts', []);
      if (!empty($dynamicContacts) && is_array($dynamicContacts)) {
          $contactCards = $dynamicContacts;
      } else {
          $contactCards = [
              [
                  'title' => 'Quero Adquirir em SP',
                  'title_en' => 'Purchase in SP',
                  'desc' => 'Na agroindústria, cada hora conta. Se o Veg Oxi 200 é urgente para sua produção, clique no botão abaixo e solicite seu atendimento.',
                  'desc_en' => 'In agro-industry, every hour counts. If Veg Oxi 200 is urgent for your production, click below and request support.',
                  'link' => 'https://wa.me/5511978348438',
              ],
              [
                  'title' => 'No Sul de Minas Gerais',
                  'title_en' => 'South of Minas Gerais',
                  'desc' => 'Também em Minas Gerais: mais frescor, mais qualidade e menos perdas. Clique e fale conosco!',
                  'desc_en' => 'Also in Minas Gerais: more freshness, higher quality, and reduced losses. Click to contact us!',
                  'link' => 'https://wa.me/5511978348438',
              ],
              [
                  'title' => 'Outras Localidades',
                  'title_en' => 'Other Locations',
                  'desc' => 'Está em outra região do Brasil? Sem problema! Nossa equipe atende clientes em todo o país. Clique no botão abaixo e fale conosco!',
                  'desc_en' => 'Located in another region of Brazil? No problem! Our team serves clients nationwide. Click below and contact us!',
                  'link' => 'https://wa.me/5511978348438',
              ],
              [
                  'title' => 'Como Distribuir?',
                  'title_en' => 'How to Distribute?',
                  'desc' => 'É distribuidor e quer levar o Veg Oxi 200 para sua região? Clique no botão abaixo e fale com nossa equipe!',
                  'desc_en' => 'Are you a distributor looking to carry Veg Oxi 200 in your region? Click below and talk to our team!',
                  'link' => 'https://wa.me/5511978348438',
              ],
          ];
      }
    @endphp

    <div class="local-grid animate-fade-up delay-100">
      @foreach($contactCards as $contact)
        @if(is_section_visible($contact))
        <div class="local-card">
          <div class="local-card-icon">
            <i data-lucide="map-pin"></i>
          </div>
          <h4>{{ trans_content($contact, 'title') }}</h4>
          <p>{{ trans_content($contact, 'desc') }}</p>
          <a href="{{ data_get($contact, 'link', 'https://wa.me/5511978348438') }}" target="_blank" rel="noopener noreferrer" class="btn-local-cta">
            {{ __('Fale Conosco') }}
          </a>
        </div>
        @endif
      @endforeach
    </div>

  </div>
</section>
@endif
@endsection
