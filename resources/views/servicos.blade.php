@extends('layouts.app')

@section('title', 'Serviços Oferecidos | VegQuality - Consultoria & Tecnologia para FLV')
@section('meta_description', 'Conheça nossos serviços de planos de negócios, treinamentos direcionados e a tecnologia exclusiva do Veg Oxi 200. Tire suas dúvidas sobre o processamento de vegetais frescos.')

@section('content')
<!-- Hero Interno -->
    <section class="internal-hero">
      <div class="container">
        <div class="breadcrumb animate-fade-up">
          <a href="{{ url('/') }}">Início</a>
          <span class="breadcrumb-separator">/</span>
          <span>Serviços Oferecidos</span>
        </div>
        <h1 class="internal-hero-title animate-fade-up delay-100">
          Serviços Oferecidos
        </h1>
        <p class="internal-hero-desc animate-fade-up delay-200">
          Soluções estratégicas e operacionais de ponta para elevar a rentabilidade e o padrão de qualidade na agroindústria.
        </p>
      </div>
    </section>

    <!-- Catálogo de Serviços -->
    <section class="services-section">
      <div class="container">
        
        <div class="services-header animate-fade-up">
          <div class="services-tag">
            <span class="micro-badge-dot"></span>
            Nossos Serviços
          </div>
          <h2 class="services-title">Soluções Completas & Especializadas</h2>
        </div>

        <div class="services-grid animate-fade-up delay-100">
          
          <!-- Card 1: Plano de Negócios / Projetos -->
          <div class="service-card">
            <div class="service-card-icon">
              <i data-lucide="briefcase"></i>
            </div>
            <span class="micro-badge" style="margin-bottom: 0.75rem; padding: 0.25rem 0.5rem; font-size: 0.65rem;">Projetos</span>
            <h3 class="service-card-title">Plano de Negócios</h3>
            <p class="service-card-desc">
              Auxiliamos empreendedores que desejam iniciar, estruturar, ampliar ou profissionalizar operações na produção de vegetais frescos processados.
            </p>
            <a href="https://wa.me/551151940325?text=Ol%C3%A1%2C%20gostaria%20de%20saber%20mais%20sobre%20a%20consultoria%20em%20Plano%20de%20Neg%C3%B3cios." target="_blank" rel="noopener noreferrer" class="service-card-link">
              Solicitar Informações
              <i data-lucide="arrow-right"></i>
            </a>
          </div>

          <!-- Card 2: Treinamentos Direcionados -->
          <div class="service-card">
            <div class="service-card-icon">
              <i data-lucide="graduation-cap"></i>
            </div>
            <span class="micro-badge" style="margin-bottom: 0.75rem; padding: 0.25rem 0.5rem; font-size: 0.65rem;">Treinamentos</span>
            <h3 class="service-card-title">Treinamentos Direcionados</h3>
            <p class="service-card-desc">
              Treinamentos práticos e teóricos para auxiliar sua equipe na execução dos processos de produção de vegetais frescos processados, do campo à gôndola.
            </p>
            <a href="https://wa.me/551151940325?text=Ol%C3%A1%2C%20gostaria%20de%20saber%20mais%20sobre%20os%20Treinamentos%20Direcionados." target="_blank" rel="noopener noreferrer" class="service-card-link">
              Solicitar Informações
              <i data-lucide="arrow-right"></i>
            </a>
          </div>

          <!-- Card 3: Veg Oxi 200 / Tecnologia de Ponta -->
          <div class="service-card" style="grid-column: span 2; border-color: rgba(46, 125, 50, 0.3); background: linear-gradient(to bottom right, #ffffff, var(--color-veg-light));">
            <div class="service-card-icon" style="background-color: var(--color-veg-primary); color: white;">
              <i data-lucide="shield-check"></i>
            </div>
            <span class="micro-badge" style="margin-bottom: 0.75rem; padding: 0.25rem 0.5rem; font-size: 0.65rem; background-color: var(--color-veg-dark); color: white; border-color: transparent;">Tecnologia de Ponta</span>
            <h3 class="service-card-title">Veg Oxi 200</h3>
            <p class="service-card-desc" style="font-size: 0.95rem;">
              O Veg Oxi 200 contribui para o aumento do shelf-life de FLV pós-colheita e vegetais frescos processados, contribuindo para a substituição definitiva do metabissulfito de sódio e demais sulfitos químicos que prejudicam a saúde.
            </p>
            <a href="https://wa.me/551151940325?text=Ol%C3%A1%2C%20gostaria%20de%20saber%20mais%20sobre%20o%20Veg%20Oxi%20200." target="_blank" rel="noopener noreferrer" class="btn btn-primary" style="margin-top: 1rem;">
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
            FAQ Técnico
          </div>
          <h2 class="services-title">Perguntas Frequentes</h2>
          <p class="services-desc">Esclareça suas dúvidas técnicas sobre processos industriais, legislação e biotecnologia agrícola.</p>
        </div>

        <div class="faq-container">
          
          <!-- CATEGORIA 1: MERCADO E ESTRATÉGIA -->
          <div class="faq-category animate-fade-up">
            <h3 class="faq-category-title">
              <i data-lucide="trending-up" style="width: 1.25rem; height: 1.25rem;"></i>
              Categoria 1: Mercado e Estratégia
            </h3>
            <div class="faq-group">
              <div class="faq-item">
                <button class="faq-question">
                  <span>Já produzo no campo, vale a pena industrializar meus vegetais?</span>
                  <i data-lucide="chevron-down" class="faq-icon-chevron"></i>
                </button>
                <div class="faq-answer">
                  <p>Sim. A agroindustrialização agrega valor aos vegetais frescos, aumenta a rentabilidade do negócio e permite atender à crescente demanda por alimentos práticos, convenientes e prontos para o consumo imediato.</p>
                </div>
              </div>

              <div class="faq-item">
                <button class="faq-question">
                  <span>O que são vegetais frescos higienizados processados e por que esse mercado está crescendo tanto?</span>
                  <i data-lucide="chevron-down" class="faq-icon-chevron"></i>
                </button>
                <div class="faq-answer">
                  <p>São vegetais frescos que passam por processos de seleção, corte, lavagem/higienização técnica, secagem centrífuga e acondicionamento em embalagens adequadas, mantendo o estado fresco natural e prontos para o preparo ou consumo. O mercado cresce aceleradamente pois resolve a falta de tempo nas rotinas modernas, reduzindo o desperdício doméstico e otimizando o preparo de refeições saudáveis.</p>
                </div>
              </div>

              <div class="faq-item">
                <button class="faq-question">
                  <span>Preciso de um nutricionista ou engenheiro de alimentos fixo na minha pequena fábrica?</span>
                  <i data-lucide="chevron-down" class="faq-icon-chevron"></i>
                </button>
                <div class="faq-answer">
                  <p>Não há obrigatoriedade de profissional em tempo integral de início. Você pode contar com consultoria externa periódica ou assessoria técnica especializada (como a oferecida pela VegQuality) para implementar as Boas Práticas de Fabricação (BPF) e estruturar toda a rotulagem e processos higiênicos com ótimo custo-benefício.</p>
                </div>
              </div>
            </div>
          </div>

          <!-- CATEGORIA 2: TECNOLOGIA E CONSERVAÇÃO -->
          <div class="faq-category animate-fade-up">
            <h3 class="faq-category-title">
              <i data-lucide="sprout" style="width: 1.25rem; height: 1.25rem;"></i>
              Categoria 2: Tecnologia e Conservação (Veg Oxi 200)
            </h3>
            <div class="faq-group">
              <div class="faq-item">
                <button class="faq-question">
                  <span>O Veg Oxi 200 substitui o metabissulfito? Ele é aceito pela fiscalização?</span>
                  <i data-lucide="chevron-down" class="faq-icon-chevron"></i>
                </button>
                <div class="faq-answer">
                  <p>Totalmente. O Veg Oxi 200 é um coadjuvante de tecnologia natural à base de Vitamina C, desenvolvido especificamente para substituir sulfitos (como o metabissulfito de sódio) que podem causar alergias. Ele atende às exigências mais rigorosas da ANVISA e do MAPA, garantindo um rótulo limpo (clean label) e seguro.</p>
                </div>
              </div>

              <div class="faq-item">
                <button class="faq-question">
                  <span>Como garantir que o vegetal picado não escureça na prateleira?</span>
                  <i data-lucide="chevron-down" class="faq-icon-chevron"></i>
                </button>
                <div class="faq-answer">
                  <p>Para evitar a oxidação enzimática (escurecimento), é fundamental alinhar a cadeia do frio (temperatura operacional abaixo de 5°C), utilizar uma embalagem com permeabilidade adequada de gases, e aplicar um antioxidante seguro e eficaz como o Veg Oxi 200 na etapa pós-lavagem.</p>
                </div>
              </div>

              <div class="faq-item">
                <button class="faq-question">
                  <span>É possível processar vegetais e manter o sabor original sem conservantes químicos?</span>
                  <i data-lucide="chevron-down" class="faq-icon-chevron"></i>
                </button>
                <div class="faq-answer">
                  <p>Sim, é totalmente possível através da biotecnologia limpa. O uso do Veg Oxi 200 atua controlando os processos oxidativos enzimáticos sem deixar gosto residual e sem alterar a textura ou a integridade celular das hortaliças, mantendo-as fiéis ao sabor original colhido no campo.</p>
                </div>
              </div>
            </div>
          </div>

          <!-- CATEGORIA 3: MAQUINÁRIOS E LAYOUT -->
          <div class="faq-category animate-fade-up">
            <h3 class="faq-category-title">
              <i data-lucide="settings" style="width: 1.25rem; height: 1.25rem;"></i>
              Categoria 3: Maquinários e Layout
            </h3>
            <div class="faq-group">
              <div class="faq-item">
                <button class="faq-question">
                  <span>Preciso de máquinas caríssimas para começar a processar?</span>
                  <i data-lucide="chevron-down" class="faq-icon-chevron"></i>
                </button>
                <div class="faq-answer">
                  <p>Não necessariamente. O segredo do sucesso não está no preço da máquina, mas na escolha técnica correta. Na nossa consultoria, ajudamos você a dimensionar os equipamentos ideais de acordo com o seu volume de produção, evitando gastos desnecessários.</p>
                </div>
              </div>

              <div class="faq-item">
                <button class="faq-question">
                  <span>Qual a diferença entre uma cortadora industrial e um processador comum?</span>
                  <i data-lucide="chevron-down" class="faq-icon-chevron"></i>
                </button>
                <div class="faq-answer">
                  <p>As cortadoras industriais mantêm lâminas extremamente afiadas e formatos de corte de alta precisão que reduzem o estresse mecânico no tecido vegetal. Um processador comum esmaga a célula das folhas e legumes, liberando fluidos internos que aceleram o escurecimento e reduzem o tempo de gôndola.</p>
                </div>
              </div>

              <div class="faq-item">
                <button class="faq-question">
                  <span>Como saber se minha centrífuga está danificando as folhosas?</span>
                  <i data-lucide="chevron-down" class="faq-icon-chevron"></i>
                </button>
                <div class="faq-answer">
                  <p>Quando as folhas saem amassadas, translúcidas ou manchadas após o ciclo, significa que a velocidade de centrifugação (RPM) está muito alta ou o tempo de ciclo está muito longo, lesionando as células do vegetal. Ajustar a centrífuga adequadamente é crucial para manter a qualidade.</p>
                </div>
              </div>

              <div class="faq-item">
                <button class="faq-question">
                  <span>Vale a pena comprar máquinas usadas para começar a agroindústria?</span>
                  <i data-lucide="chevron-down" class="faq-icon-chevron"></i>
                </button>
                <div class="faq-answer">
                  <p>Sim, desde que a estrutura seja em aço inox 304, não tenha soldas porosas que acumulem bactérias e possuam fácil desmontagem das facas e correias. Uma inspeção técnica cuidadosa é essencial para evitar a contaminação alimentar sistemática e garantir conformidade de segurança (NR-12).</p>
                </div>
              </div>

              <div class="faq-item">
                <button class="faq-question">
                  <span>Existe uma ordem correta para a disposição das máquinas (Layout)?</span>
                  <i data-lucide="chevron-down" class="faq-icon-chevron"></i>
                </button>
                <div class="faq-answer">
                  <p>Sim. O layout deve seguir um fluxo linear "em linha reta" ou "em U", sem retrocesso dos alimentos. Isso evita que o vegetal higienizado cruze com o vegetal sujo que acabou de vir do campo, prevenindo a contaminação microbiológica cruzada.</p>
                </div>
              </div>
            </div>
          </div>

          <!-- CATEGORIA 4: OPERAÇÃO E QUALIDADE -->
          <div class="faq-category animate-fade-up">
            <h3 class="faq-category-title">
              <i data-lucide="award" style="width: 1.25rem; height: 1.25rem;"></i>
              Categoria 4: Operação e Qualidade
            </h3>
            <div class="faq-group">
              <div class="faq-item">
                <button class="faq-question">
                  <span>Como reduzir o desperdício (quebra) na minha linha de produção?</span>
                  <i data-lucide="chevron-down" class="faq-icon-chevron"></i>
                </button>
                <div class="faq-answer">
                  <p>O desperdício geralmente vem de três fontes: falha no processo de corte/higienização, quebra na cadeia de frio (exposição à temperatura ambiente) e embalagens inadequadas que não controlam a respiração vegetal. Nossa Avaliação Técnica Operacional identifica e corrige esses gargalos.</p>
                </div>
              </div>

              <div class="faq-item">
                <button class="faq-question">
                  <span>O que é o "Calor de Campo" e como as máquinas ajudam a retirá-lo?</span>
                  <i data-lucide="chevron-down" class="faq-icon-chevron"></i>
                </button>
                <div class="faq-answer">
                  <p>O calor de campo é a temperatura interna acumulada na planta devido à exposição solar no campo antes da colheita. Para removê-lo rapidamente, utilizamos sistemas de pré-resfriamento por água fria (hidroresfriamento) ou ventilação forçada em câmara fria imediatamente após o recebimento, desacelerando a respiração da hortaliça.</p>
                </div>
              </div>

              <div class="faq-item">
                <button class="faq-question">
                  <span>Qual a importância da "Cadeia do Frio" na industrialização de vegetais?</span>
                  <i data-lucide="chevron-down" class="faq-icon-chevron"></i>
                </button>
                <div class="faq-answer">
                  <p>A temperatura é a principal ferramenta física de conservação de FLV. Manter a cadeia do frio a 2°C - 5°C em todas as etapas — processamento, transporte, armazenamento e ponto de venda — diminui o metabolismo do vegetal e o crescimento de bactérias e fungos, triplicando o shelf-life.</p>
                </div>
              </div>

              <div class="faq-item">
                <button class="faq-question">
                  <span>Como escolher a embalagem correta para o meu mix de produtos?</span>
                  <i data-lucide="chevron-down" class="faq-icon-chevron"></i>
                </button>
                <div class="faq-answer">
                  <p>A embalagem ideal varia conforme a taxa de respiração de cada planta (por exemplo, brócolis respira muito mais rápido que cenouras). Devemos selecionar filmes plásticos técnicos com permeabilidade controlada (como filmes de atmosfera modificada passiva - MAP) que criam o microclima gasoso de oxigênio e gás carbônico ideal para retardar a maturação.</p>
                </div>
              </div>
            </div>
          </div>

          <!-- CATEGORIA 5: LEGISLAÇÃO -->
          <div class="faq-category animate-fade-up">
            <h3 class="faq-category-title">
              <i data-lucide="file-text" style="width: 1.25rem; height: 1.25rem;"></i>
              Categoria 5: Legislação (SISP-POV)
            </h3>
            <div class="faq-group">
              <div class="faq-item">
                <button class="faq-question">
                  <span>O que muda com o novo Decreto nº 70.447 em São Paulo?</span>
                  <i data-lucide="chevron-down" class="faq-icon-chevron"></i>
                </button>
                <div class="faq-answer">
                  <p>Este decreto tornou a fiscalização muito mais rigorosa em SP. Agora, toda agroindústria de vegetais processados minimamente precisa de registro sanitário formal de estabelecimentos produtores de vegetais processados e conformidade técnica integral. Nossa consultoria guia e assessora você por todo o processo de adequação da planta.</p>
                </div>
              </div>

              <div class="faq-item">
                <button class="faq-question">
                  <span>O que é o SISP-POV e como funciona o registro oficial?</span>
                  <i data-lucide="chevron-down" class="faq-icon-chevron"></i>
                </button>
                <div class="faq-answer">
                  <p>O SISP-POV refere-se ao Serviço de Inspeção de Produtos de Origem Vegetal de São Paulo. O registro atesta a segurança física, química e microbiológica do estabelecimento. Exige aprovação de leiaute arquitetônico industrial, rotulagem adequada e documentação técnica descritiva de processos produtivos sob auditoria do órgão fiscalizador competente.</p>
                </div>
              </div>

              <div class="faq-item">
                <button class="faq-question">
                  <span>Quais os riscos de operar uma planta de vegetais frescos processados sem registro regulatório?</span>
                  <i data-lucide="chevron-down" class="faq-icon-chevron"></i>
                </button>
                <div class="faq-answer">
                  <p>A falta de registro sanitário (ou SISP) acarreta em riscos graves de autuações administrativas, multas pesadas, interdição do estabelecimento e apreensão de mercadorias. Além disso, grandes redes de varejo, supermercados e redes de food service são legalmente proibidos de comprar mercadorias não fiscalizadas.</p>
                </div>
              </div>
            </div>
          </div>

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
              Ainda tem dúvidas sobre a adequação da sua planta ou quer aplicar a tecnologia Veg Oxi 200 no seu negócio?<br>
              <span style="color: var(--color-veg-primary);">VAMOS CONVERSAR!</span>
            </h2>
            
            <div class="conversar-pillars">
              
              <!-- Pillar 1 -->
              <div class="conversar-pillar-item">
                <div class="conversar-pillar-icon">
                  <i data-lucide="heart"></i>
                </div>
                <div class="conversar-pillar-text">
                  <h4>Livre de Sulfitos</h4>
                  <p>Se você atua com vegetais frescos, higienizados e prontos para o consumo, o Veg Oxi 200 é a alternativa saudável e eficaz para substituir o metabissulfito e demais sulfitos.</p>
                </div>
              </div>

              <!-- Pillar 2 -->
              <div class="conversar-pillar-item">
                <div class="conversar-pillar-icon">
                  <i data-lucide="trending-up"></i>
                </div>
                <div class="conversar-pillar-text">
                  <h4>Lucro Real</h4>
                  <p>Veg Oxi 200, o único antioxidante natural e eficaz que substitui os sulfitos, aumenta a vida útil dos vegetais prontos para o consumo, preserva a qualidade e a saudabilidade desses alimentos, além de reduzir perdas (quebras).</p>
                </div>
              </div>

            </div>
          </div>

          <!-- Action Box Right -->
          <div class="animate-fade-up delay-100">
            <div class="conversar-action-box">
              <h3 class="action-box-title">Transforme sua Produção</h3>
              <p class="action-box-desc">
                Conte com a expertise e a inovação tecnológica da VegQuality para otimizar seus processos de FLV.
              </p>
              
              <a href="https://wa.me/551151940325?text=Ol%C3%A1%2C%20gostaria%20de%20conversar%20sobre%20as%20solu%C3%A7%C3%B5es%20da%20VegQuality." target="_blank" rel="noopener noreferrer" class="btn-conversar">
                <i data-lucide="message-circle"></i>
                Falar Conosco
              </a>

              <!-- Counters inline -->
              <div class="conversar-indicators">
                <div class="conversar-indicator-card">
                  <div class="conversar-indicator-number">100%</div>
                  <div class="conversar-indicator-label">Livre de Sulfitos</div>
                </div>
                <div class="conversar-indicator-card">
                  <div class="conversar-indicator-number">60%</div>
                  <div class="conversar-indicator-label">Lucro sob perdas</div>
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
            Parcerias de Sucesso
          </div>
          <h2 class="services-title">Alguns de Nossos Clientes</h2>
          <p class="services-desc">Marcas e cooperativas agrícolas que confiam no suporte técnico e biotecnológico da VegQuality.</p>
        </div>

        <div class="clients-grid animate-fade-up delay-100">
          
          <!-- Cliente 1: Caisp -->
          <div class="client-card">
            <img src="{{ asset('assets/clientes/cliente1.png') }}" alt="Caisp" class="client-logo-img">
          </div>

          <!-- Cliente 2: Natural da Terra -->
          <div class="client-card">
            <img src="{{ asset('assets/clientes/cliente2.png') }}" alt="Natural da Terra" class="client-logo-img">
          </div>

          <!-- Cliente 3: Jpavani -->
          <div class="client-card">
            <img src="{{ asset('assets/clientes/cliente3.png') }}" alt="Jpavani" class="client-logo-img">
          </div>

        </div>

      </div>
    </section>
@endsection
