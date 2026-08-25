@extends('layouts.app')

@section('title', 'Serviços Oferecidos | VegQuality - Consultoria & Tecnologia para FLV')
@section('meta_description', 'Conheça nossos serviços de planos de negócios, treinamentos direcionados e a tecnologia exclusiva do Veg Oxi 200. Tire suas dúvidas sobre o processamento de vegetais frescos.')

@section('content')
<style>
  /* Overrides para melhorar a legibilidade e contraste na página de Serviços */
  
  /* Títulos Principais (Hero) */
  .internal-hero-title {
    color: #111827 !important; /* Cinza quase preto para máximo contraste */
    font-weight: 800 !important; /* Peso extra para destaque visual */
    letter-spacing: -0.02em;
    line-height: 1.2 !important;
  }
  
  .internal-hero-desc {
    color: #374151 !important; /* Cinza chumbo escuro */
    font-weight: 450 !important; /* Um pouco mais encorpada que o normal */
    line-height: 1.75 !important; /* Mais espaçamento entre linhas */
    font-size: 1.15rem !important;
  }

  /* Cabeçalho das Seções */
  .services-title {
    color: #111827 !important;
    font-weight: 800 !important;
    letter-spacing: -0.01em;
  }
  
  .services-desc {
    color: #4b5563 !important;
    font-size: 1.05rem !important;
    line-height: 1.7 !important;
  }

  /* Cards de Serviços */
  .service-card-title {
    color: var(--color-veg-dark) !important;
    font-weight: 700 !important;
    font-size: 1.35rem !important;
  }

  .service-card-desc {
    color: #2d3748 !important; /* Tom mais escuro de cinza para leitura confortável */
    font-size: 0.95rem !important; /* Fonte ligeiramente maior */
    line-height: 1.7 !important; /* Mais respiro visual */
    font-weight: 400;
  }

  /* Perguntas Frequentes (FAQ) */
  .faq-category-title {
    color: var(--color-veg-dark) !important;
    font-weight: 700 !important;
    border-bottom: 2px solid var(--color-veg-light);
    padding-bottom: 0.5rem;
  }

  .faq-question {
    color: #1f2937 !important;
    font-weight: 600 !important;
    font-size: 1rem !important;
  }

  .faq-answer p {
    color: #374151 !important;
    font-size: 0.95rem !important;
    line-height: 1.75 !important;
  }


</style>

@php
    $hero = $page?->sections->where('key', 'servicos_hero')->first()?->content;
    $catalog = $page?->sections->where('key', 'servicos_catalog')->first()?->content;
    $faq = $page?->sections->where('key', 'servicos_faq')->first()?->content;
    $clientes = $page?->sections->where('key', 'servicos_clientes')->first()?->content;
    $contacts = $page?->sections->where('key', 'servicos_contacts')->first()?->content;
@endphp
<!-- Hero Interno -->
  @if(is_section_visible($hero))
    <section class="internal-hero">
      <div class="container">
        <div class="breadcrumb animate-fade-up">
          <a href="{{ url('/') }}">{{ __('Início') }}</a>
          <span class="breadcrumb-separator">/</span>
          <span>{{ __('Serviços') }}</span>
        </div>
        <h1 class="internal-hero-title animate-fade-up delay-100">
          {{ trans_content($hero, 'title', 'Serviços Oferecidos') }}
        </h1>
        <p class="internal-hero-desc animate-fade-up delay-200">
          {{ trans_content($hero, 'subtitle', 'Soluções estratégicas e operacionais de ponta para elevar a rentabilidade e o padrão de qualidade na agroindústria.') }}
        </p>
      </div>
    </section>
  @endif

    <!-- Catálogo de Serviços -->
  @if(is_section_visible($catalog))
    <section class="services-section">
      <div class="container">
        
        <div class="services-header animate-fade-up">
          <div class="services-tag">
            <span class="micro-badge-dot"></span>
            {{ trans_content($catalog, 'badge', 'Nossos Serviços') }}
          </div>
          <h2 class="services-title">{{ trans_content($catalog, 'title', 'Soluções Completas & Especializadas') }}</h2>
        </div>

        <div class="services-grid animate-fade-up delay-100">
          
          <!-- Card 1: Consultoria -->
          <div class="service-card">
            <div class="service-card-icon">
              <i data-lucide="leaf"></i>
            </div>
            <span class="micro-badge" style="margin-bottom: 0.75rem; padding: 0.25rem 0.5rem; font-size: 0.65rem;">{{ trans_content($catalog, 'service1_badge', 'Consultoria') }}</span>
            <h3 class="service-card-title">{{ trans_content($catalog, 'service1_title', 'Consultoria') }}</h3>
            <p class="service-card-desc">
              {{ Str::limit(trans_content($catalog, 'service1_desc'), 300, '...') }}
              @if(strlen(trans_content($catalog, 'service1_desc')) > 300)
                <button type="button" class="leia-mais-btn" data-title="{{ trans_content($catalog, 'service1_title') }}" data-text="{{ trans_content($catalog, 'service1_desc') }}">{{ __('Leia mais') }}</button>
              @endif
            </p>
            <a href="{{ url('/contato?subject=consultoria') }}" class="service-card-link">
              {{ __('Solicitar Informações') }}
              <i data-lucide="arrow-right"></i>
            </a>
          </div>

          <!-- Card 2: Treinamentos -->
          <div class="service-card">
            <div class="service-card-icon">
              <i data-lucide="graduation-cap"></i>
            </div>
            <span class="micro-badge" style="margin-bottom: 0.75rem; padding: 0.25rem 0.5rem; font-size: 0.65rem;">{{ trans_content($catalog, 'service2_badge', 'Treinamentos') }}</span>
            <h3 class="service-card-title">{{ trans_content($catalog, 'service2_title', 'Treinamentos') }}</h3>
            <p class="service-card-desc">
              {{ Str::limit(trans_content($catalog, 'service2_desc'), 300, '...') }}
              @if(strlen(trans_content($catalog, 'service2_desc')) > 300)
                <button type="button" class="leia-mais-btn" data-title="{{ trans_content($catalog, 'service2_title') }}" data-text="{{ trans_content($catalog, 'service2_desc') }}">{{ __('Leia mais') }}</button>
              @endif
            </p>
            <a href="{{ url('/contato?subject=treinamento') }}" class="service-card-link">
              {{ __('Solicitar Informações') }}
              <i data-lucide="arrow-right"></i>
            </a>
          </div>

          <!-- Card 3: Plano de Negócios -->
          <div class="service-card">
            <div class="service-card-icon">
              <i data-lucide="briefcase"></i>
            </div>
            <span class="micro-badge" style="margin-bottom: 0.75rem; padding: 0.25rem 0.5rem; font-size: 0.65rem;">{{ trans_content($catalog, 'service3_badge', 'Projetos') }}</span>
            <h3 class="service-card-title">{{ trans_content($catalog, 'service3_title', 'Plano de Negócios') }}</h3>
            <p class="service-card-desc">
              {{ Str::limit(trans_content($catalog, 'service3_desc'), 300, '...') }}
              @if(strlen(trans_content($catalog, 'service3_desc')) > 300)
                <button type="button" class="leia-mais-btn" data-title="{{ trans_content($catalog, 'service3_title') }}" data-text="{{ trans_content($catalog, 'service3_desc') }}">{{ __('Leia mais') }}</button>
              @endif
            </p>
            <a href="{{ url('/contato?subject=plano-de-negocios') }}" class="service-card-link">
              {{ __('Solicitar Informações') }}
              <i data-lucide="arrow-right"></i>
            </a>
          </div>

        </div>

      </div>
    </section>
  @endif

    <!-- Seção FAQ (Perguntas Frequentes) -->
  @if(is_section_visible($faq))
    <section class="faq-section">
      <div class="container">
        
        <div class="services-header animate-fade-up">
          <div class="services-tag">
            <span class="micro-badge-dot"></span>
            {{ trans_content($faq, 'badge', 'FAQ Técnico') }}
          </div>
          <h2 class="services-title">{{ trans_content($faq, 'title', 'Perguntas Frequentes') }}</h2>
          <p class="services-desc">{{ trans_content($faq, 'description', 'Esclareça suas dúvidas técnicas sobre processos industriais, legislação e biotecnologia agrícola.') }}</p>
        </div>

        @php
          $isEn = app()->getLocale() === 'en' || str_starts_with(app()->getLocale(), 'en');
          $rawFaqs = data_get($faq, 'faqs', []);

          $categoryMapEn = [
              'Categoria 1: Mercado e Estratégia' => 'Category 1: Market & Strategy',
              'Categoria 2: Tecnologia e Conservação (Veg Oxi 200)' => 'Category 2: Technology & Shelf-Life (Veg Oxi 200)',
              'Categoria 3: Maquinários e Layout' => 'Category 3: Machinery & Plant Layout',
              'Categoria 4: Operação e Qualidade' => 'Category 4: Operations & Quality Control',
              'Categoria 5: Legislação (SISP-POV)' => 'Category 5: Legislation & Food Safety (SISP-POV)',
          ];

          $qaMapEn = [
              'Já produzo no campo, vale a pena industrializar meus vegetais?' => [
                  'q' => 'I already produce in the field, is it worth processing my vegetables?',
                  'a' => 'Yes. Processing adds value to fresh vegetables, increases business profitability, and lets you meet the growing demand for convenient, ready-to-eat foods.'
              ],
              'O que são vegetais frescos higienizados processados e por que esse mercado está crescendo tanto?' => [
                  'q' => 'What are processed fresh vegetables and why is this market growing so fast?',
                  'a' => 'They are fresh produce subjected to selection, cutting, technical washing/sanitizing, centrifugal drying, and proper packaging, preserving natural freshness for immediate consumption. The market grows rapidly as it solves time constraints in modern routines and reduces domestic waste.'
              ],
              'Preciso de um nutricionista ou engenheiro de alimentos fixo na minha pequena fábrica?' => [
                  'q' => 'Do I need a full-time nutritionist or food engineer in my small processing facility?',
                  'a' => 'A full-time professional is not mandatory initially. You can rely on periodic external consulting or specialized technical advisory (such as VegQuality) to implement Good Manufacturing Practices (GMP) cost-effectively.'
              ],
              'O Veg Oxi 200 substitui o metabissulfito? Ele é aceito pela fiscalização?' => [
                  'q' => 'Does Veg Oxi 200 replace metabisulfite? Is it accepted by regulatory authorities?',
                  'a' => 'Completely. Veg Oxi 200 is a natural Vitamin C-based processing aid specifically formulated to replace sodium metabisulfite, fully compliant with ANVISA and MAPA standards for clean label products.'
              ],
              'Como garantir que o vegetal picado não escureça na prateleira?' => [
                  'q' => 'How do I ensure cut vegetables do not brown on the shelf?',
                  'a' => 'To prevent enzymatic browning, maintain a cold chain below 5°C, use proper gas-permeable packaging, and apply a safe antioxidant like Veg Oxi 200 post-wash.'
              ],
              'É possível processar vegetais e manter o sabor original sem conservantes químicos?' => [
                  'q' => 'Is it possible to process vegetables while preserving original taste without chemical preservatives?',
                  'a' => 'Yes, through clean biotechnology. Veg Oxi 200 controls enzymatic oxidative browning without leaving residual taste or altering texture.'
              ],
              'Preciso de máquinas caríssimas para começar a processar?' => [
                  'q' => 'Do I need extremely expensive machinery to start processing?',
                  'a' => 'Not necessarily. Success depends on correct technical sizing based on production volume rather than high machinery costs.'
              ],
              'Qual a diferença entre uma cortadora industrial e um processador comum?' => [
                  'q' => 'What is the difference between an industrial cutter and a common processor?',
                  'a' => 'Industrial cutters use ultra-sharp blades and precise cutting shapes that minimize tissue stress, whereas common processors crush plant cells and release fluids that accelerate browning.'
              ],
              'Como saber se minha centrífuga está danificando as folhosas?' => [
                  'q' => 'How do I know if my centrifuge is damaging leafy greens?',
                  'a' => 'If leaves emerge bruised, translucent, or spotted after centrifugation, the RPM speed or cycle duration is too high. Proper calibration is crucial.'
              ],
              'Vale a pena comprar máquinas usadas para começar a agroindústria?' => [
                  'q' => 'Is it worth buying used machinery to launch an agro-industry?',
                  'a' => 'Yes, provided the frame is AISI 304 stainless steel without porous welds that accumulate bacteria. Technical inspection is essential for food safety and NR-12 compliance.'
              ],
              'Existe uma ordem correta para a disposição das máquinas (Layout)?' => [
                  'q' => 'Is there a correct machinery layout order?',
                  'a' => 'Yes. Layout must follow a linear or U-shaped unidirectional flow without backtracking to prevent cross-contamination between raw and sanitized produce.'
              ],
              'Como reduzir o desperdício (quebra) na minha linha de produção?' => [
                  'q' => 'How can I reduce waste and losses on my processing line?',
                  'a' => 'Waste typically originates from cutting/sanitizing flaws, cold chain breaks, or improper respiration-control packaging. Our technical assessment identifies and resolves these bottlenecks.'
              ],
              'O que é o "Calor de Campo" e como as máquinas ajudam a retirá-lo?' => [
                  'q' => 'What is "Field Heat" and how is it removed?',
                  'a' => 'Field heat is internal thermal energy accumulated from pre-harvest sun exposure. It is rapidly removed via cold water hydro-cooling or forced-air cooling post-harvest to slow down respiration.'
              ],
              'Qual a importância da "Cadeia do Frio" na industrialização de vegetais?' => [
                  'q' => 'Why is the "Cold Chain" so critical in fresh produce processing?',
                  'a' => 'Temperature control at 2°C–5°C throughout processing, transport, and retail slows metabolism and microbial growth, tripling shelf life.'
              ],
              'Como escolher a embalagem correta para o meu mix de produtos?' => [
                  'q' => 'How do I choose the correct packaging for my product mix?',
                  'a' => 'Selection depends on crop respiration rates. Technical films with controlled permeability (such as passive MAP) establish ideal oxygen/CO2 equilibrium to delay senescence.'
              ],
              'O que muda com o novo Decreto nº 70.447 em São Paulo?' => [
                  'q' => 'What changes under the new Decree No. 70,447 in São Paulo?',
                  'a' => 'Decree 70,447 introduced strict regulatory enforcement in SP, requiring formal sanitary registration (SISP-POV) for all processed fresh produce facilities.'
              ],
              'O que é o SISP-POV e como funciona o registro oficial?' => [
                  'q' => 'What is SISP-POV and how does official registration work?',
                  'a' => 'SISP-POV is São Paulo\'s Plant Product Inspection Service. Registration certifies facility safety and requires architectural layout approval, proper labeling, and audited process documentation.'
              ],
              'Quais os riscos de operar uma planta de vegetais frescos processados sem registro regulatório?' => [
                  'q' => 'What are the risks of operating an uninspected fresh produce plant?',
                  'a' => 'Operating without registration risks severe administrative fines, facility shutdown, and product seizure. Major supermarket chains are legally barred from purchasing uninspected goods.'
              ],
          ];

          $mappedFaqs = [];
          foreach ($rawFaqs as $f) {
              $cat = data_get($f, 'category', 'Geral');
              $q = data_get($f, 'question', '');
              $a = data_get($f, 'answer', '');

              if ($isEn) {
                  $cat = $categoryMapEn[$cat] ?? (data_get($f, 'category_en') ?: $cat);
                  $qEn = data_get($f, 'question_en');
                  $aEn = data_get($f, 'answer_en');

                  if (empty($qEn) && isset($qaMapEn[$q])) {
                      $qEn = $qaMapEn[$q]['q'];
                  }
                  if (empty($aEn) && isset($qaMapEn[$q])) {
                      $aEn = $qaMapEn[$q]['a'];
                  }

                  $f['category'] = $cat;
                  $f['question'] = $qEn ?: $q;
                  $f['answer'] = $aEn ?: $a;
              }

              $mappedFaqs[] = $f;
          }

          $faqItems = collect($mappedFaqs)->groupBy('category');
        @endphp

        <div class="faq-container">
          @forelse($faqItems as $categoryName => $items)
            <div class="faq-category animate-fade-up">
              <h3 class="faq-category-title">
                @php
                  $icon = 'help-circle';
                  if (str_contains($categoryName, 'Mercado') || str_contains($categoryName, 'Market')) $icon = 'trending-up';
                  elseif (str_contains($categoryName, 'Tecnologia') || str_contains($categoryName, 'Technology')) $icon = 'sprout';
                  elseif (str_contains($categoryName, 'Maquinários') || str_contains($categoryName, 'Machinery')) $icon = 'settings';
                  elseif (str_contains($categoryName, 'Operação') || str_contains($categoryName, 'Operations')) $icon = 'award';
                  elseif (str_contains($categoryName, 'Legislação') || str_contains($categoryName, 'Legislation')) $icon = 'file-text';
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
            <p class="text-center text-gray-500">{{ __('Nenhuma pergunta cadastrada.') }}</p>
          @endforelse
        </div>

      </div>
    </section>
  @endif

    <!-- Seção CTA (Fale Conosco - Vamos Conversar) -->
  @if(is_section_visible($contacts))
    <section class="cta-conversar-section" style="background-color: var(--color-veg-light);">
      <div class="container">
        <div class="cta-conversar-grid">
          
          <!-- Content Left -->
          <div class="cta-conversar-content animate-fade-up">
            <h2 class="cta-conversar-title">
              {!! $isEn ? 'Still have questions about adjusting your processing plant or applying Veg Oxi 200 to your business?<br><span style="color: var(--color-veg-primary);">LET\'S TALK!</span>' : trans_content($contacts, 'conversar_title', 'Ainda tem dúvidas sobre a adequação da sua planta ou quer aplicar a tecnologia Veg Oxi 200 no seu negócio?<br><span style="color: var(--color-veg-primary);">VAMOS CONVERSAR!</span>') !!}
            </h2>
            
            <div class="conversar-pillars">
              
              <!-- Pillar 1 -->
              <div class="conversar-pillar-item">
                <div class="conversar-pillar-icon">
                  <i data-lucide="heart"></i>
                </div>
                <div class="conversar-pillar-text">
                  <h4>{{ $isEn ? 'Sulfite-Free' : trans_content($contacts, 'conversar_p1_title', 'Livre de Sulfitos') }}</h4>
                  <p>{{ $isEn ? 'If you work with fresh, sanitized, ready-to-eat vegetables, Veg Oxi 200 is the healthy, effective alternative to sodium metabisulfite and other sulfites.' : trans_content($contacts, 'conversar_p1_desc', 'Se você atua com vegetais frescos, higienizados e prontos para o consumo, o Veg Oxi 200 é a alternativa saudável e eficaz para substituir o metabissulfito e demais sulfitos.') }}</p>
                </div>
              </div>

              <!-- Pillar 2 -->
              <div class="conversar-pillar-item">
                <div class="conversar-pillar-icon">
                  <i data-lucide="trending-up"></i>
                </div>
                <div class="conversar-pillar-text">
                  <h4>{{ $isEn ? 'Real Profit' : trans_content($contacts, 'conversar_p2_title', 'Lucro Real') }}</h4>
                  <p>{{ $isEn ? 'Veg Oxi 200, the unique natural antioxidant that replaces sulfites, extends fresh produce shelf life, preserves quality and healthiness, and reduces breakdown losses.' : trans_content($contacts, 'conversar_p2_desc', 'Veg Oxi 200, o único antioxidante natural e eficaz que substitui os sulfitos, aumenta a vida útil dos vegetais prontos para o consumo, preserva a qualidade e a saudabilidade desses alimentos, além de reduzir perdas (quebras).') }}</p>
                </div>
              </div>

            </div>
          </div>

          <!-- Action Box Right -->
          <div class="animate-fade-up delay-100">
            <div class="conversar-action-box">
              <h3 class="action-box-title">{{ $isEn ? 'Transform Your Production' : trans_content($contacts, 'action_box_title', 'Transforme sua Produção') }}</h3>
              <p class="action-box-desc">
                {{ $isEn ? 'Rely on VegQuality expertise and technological innovation to optimize your fresh produce processes.' : trans_content($contacts, 'action_box_desc', 'Conte com a expertise e a inovação tecnológica da VegQuality para otimizar seus processos de FLV.') }}
              </p>
              
              <a href="{{ data_get($contacts, 'action_box_cta_link', 'https://wa.me/5511978348438?text=Ol%C3%A1%2C%20gostaria%20de%20conversar%20sobre%20as%20solu%C3%A7%C3%B5es%20da%20VegQuality.') }}" target="_blank" rel="noopener noreferrer" class="btn-conversar" style="display: inline-flex; align-items: center; justify-content: center; gap: 0.5rem; text-decoration: none;">
                <i data-lucide="message-circle"></i>
                {{ $isEn ? 'Talk to Us' : trans_content($contacts, 'action_box_cta_text', 'Falar Conosco') }}
              </a>

              <!-- Counters inline -->
              <div class="conversar-indicators">
                <div class="conversar-indicator-card">
                  <div class="conversar-indicator-number">{{ data_get($contacts, 'indicator1_num', '100%') }}</div>
                  <div class="conversar-indicator-label">{{ $isEn ? 'Sulfite-Free' : trans_content($contacts, 'indicator1_label', 'Livre de Sulfitos') }}</div>
                </div>
                <div class="conversar-indicator-card">
                  <div class="conversar-indicator-number">{{ data_get($contacts, 'indicator2_num', '60%') }}</div>
                  <div class="conversar-indicator-label">{{ $isEn ? 'Profit from Reduced Waste' : trans_content($contacts, 'indicator2_label', 'Lucro sob perdas') }}</div>
                </div>
              </div>

            </div>
          </div>

        </div>
      </div>
    </section>
  @endif

    <!-- Seção Clientes -->
  @if(is_section_visible($clientes))
    <section class="faq-section" style="background-color: var(--color-bg-base);">
      <div class="container">
        
        <div class="services-header animate-fade-up">
          <div class="services-tag">
            <span class="micro-badge-dot"></span>
            {{ $isEn ? 'Successful Partnerships' : trans_content($clientes, 'badge', 'Parcerias de Sucesso') }}
          </div>
          <h2 class="services-title">{{ $isEn ? 'Some of Our Clients' : trans_content($clientes, 'title', 'Alguns de Nossos Clientes') }}</h2>
          <p class="services-desc">{{ $isEn ? 'Brands and agricultural cooperatives trusting VegQuality technical and biotechnological support.' : trans_content($clientes, 'description', 'Marcas e cooperativas agrícolas que confiam no suporte técnico e biotecnológico da VegQuality.') }}</p>
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
