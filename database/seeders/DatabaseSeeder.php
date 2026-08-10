<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin User
        User::updateOrCreate(
            ['email' => 'admin@vegquality.com.br'],
            [
                'name' => 'Administrador VegQuality',
                'password' => bcrypt('Veg2026@'),
            ]
        );

        // Home Page
        $home = \App\Models\Page::updateOrCreate(
            ['slug' => 'home'],
            [
                'title' => 'VegQuality | Consultoria em Biotecnologia & Segurança Alimentar para Agroindústria',
                'meta_description' => 'Soluções tecnológicas e biotecnologia para extensão de shelf-life e segurança dos alimentos na sua produção. Reduza oxidação e perdas com VegQuality.',
            ]
        );

        // Clean up old product_highlight section from Home page if it exists
        $home->sections()->where('key', 'product_highlight')->delete();

        // Hero Section (Dynamic Slide Repeater)
        $home->sections()->updateOrCreate(
            ['key' => 'hero'],
            [
                'content' => [
                    'slides' => [
                        [
                            'image' => 'assets/hero/farmer-with-crate-of-ripe-vegetables-2025-02-18-13-20-58-utc-scaled.jpg',
                            'title' => 'Soluções para a agroindústria de vegetais frescos processados.',
                            'title_en' => 'Solutions for the processed fresh produce agro-industry.',
                            'subtitle' => 'Soluções tecnológicas e biotecnologia de ponta para extensão de shelf-life e segurança dos alimentos na sua produção. Substitua aditivos químicos de forma segura.',
                            'subtitle_en' => 'Technological solutions and cutting-edge biotechnology for shelf-life extension and food safety in your production. Safely replace chemical additives.',
                            'btn1_text' => 'Serviços',
                            'btn1_text_en' => 'Services',
                            'btn1_link' => '/servicos',
                            'btn2_text' => 'Veg Oxi',
                            'btn2_text_en' => 'Veg Oxi',
                            'btn2_link' => '/veg-oxi',
                            'badge1_text' => '+20 anos de experiência.',
                            'badge1_text_en' => '+20 years of experience.',
                            'badge2_text' => 'Segurança Alimentar',
                            'badge2_text_en' => 'Food Safety',
                            'badge2_link' => '#home_contact_cta',
                        ],
                        [
                            'image' => 'assets/hero/Home-Veg-scaled.jpg',
                            'title' => 'Consultoria técnica especializada para vegetais frescos.',
                            'title_en' => 'Specialized technical consulting for fresh produce.',
                            'subtitle' => 'Diagnóstico operacional, padronização e extensão natural de gôndola. Reduza desperdícios e aumente seus lucros de forma sustentável.',
                            'subtitle_en' => 'Operational diagnosis, standardization, and natural shelf-life extension. Reduce waste and increase profits sustainably.',
                            'btn1_text' => 'A Empresa',
                            'btn1_text_en' => 'About Us',
                            'btn1_link' => '/empresa',
                            'btn2_text' => '',
                            'btn2_text_en' => '',
                            'btn2_link' => '',
                            'badge1_text' => 'Consultoria Focada em Resultados',
                            'badge1_text_en' => 'Results-Focused Consulting',
                            'badge2_text' => 'Livre de Sulfitos',
                            'badge2_text_en' => 'Sulfite-Free',
                            'badge2_link' => '/veg-oxi',
                        ],
                        [
                            'image' => 'assets/hero/colhendo-alface.jpg',
                            'title' => 'Tecnologia para conservação e qualidade de vegetais frescos.',
                            'title_en' => 'Technology for preservation and quality of fresh vegetables.',
                            'subtitle' => 'Conheça o Veg Oxi 200: antioxidante natural que preserva a cor, sabor e textura originais sem deixar gosto residual.',
                            'subtitle_en' => 'Discover Veg Oxi 200: natural antioxidant that preserves original color, flavor, and texture without residual taste.',
                            'btn1_text' => 'Veg Oxi 200',
                            'btn1_text_en' => 'Veg Oxi 200',
                            'btn1_link' => '/veg-oxi',
                            'btn2_text' => '',
                            'btn2_text_en' => '',
                            'btn2_link' => '',
                            'badge1_text' => '1¢ Custo por Hortaliça',
                            'badge1_text_en' => '1¢ Cost per Vegetable',
                            'badge2_text' => 'Alta Durabilidade',
                            'badge2_text_en' => 'High Shelf Life',
                            'badge2_link' => '/veg-oxi',
                        ]
                    ]
                ]
            ]
        );

        // Home Offering Section ("O que oferecemos")
        $home->sections()->updateOrCreate(
            ['key' => 'home_offering'],
            [
                'content' => [
                    'badge' => 'O que oferecemos',
                    'badge_en' => 'What We Offer',
                    'title' => 'Soluções completas para a agroindústria de vegetais frescos',
                    'title_en' => 'Comprehensive solutions for the fresh produce agro-industry',
                    'description' => 'Há mais de duas décadas, somos referência em consultoria e soluções para a cadeia produtiva de FLV (Frutas, Legumes e Verduras).',
                    'description_en' => 'For over two decades, we have been a benchmark in consulting and solutions for the fresh produce supply chain.',
                    'cards' => [
                        [
                            'title' => 'Consultoria',
                            'title_en' => 'Consulting',
                            'icon' => 'leaf',
                            'description' => 'Diagnóstico operacional completo, extensão natural de shelf-life e aplicação de biotecnologia personalizada para eliminar perdas na sua produção de vegetais higienizados.',
                            'description_en' => 'Comprehensive operational diagnostics, natural shelf-life extension, and tailored biotechnology applications to eliminate losses in your fresh-cut produce line.',
                            'link_text' => 'Saiba mais',
                            'link_text_en' => 'Learn more',
                            'link_url' => '/servicos',
                        ],
                        [
                            'title' => 'Capacitação',
                            'title_en' => 'Training & Capacity Building',
                            'icon' => 'graduation-cap',
                            'description' => 'Treinamento especializado para equipes em Boas Práticas de Fabricação (BPF), controle sanitário e manipulação técnica, garantindo conformidade com as normas vigentes.',
                            'description_en' => 'Specialized team training in Good Manufacturing Practices (GMP), sanitary control, and technical handling, ensuring regulatory compliance.',
                            'link_text' => 'Saiba mais',
                            'link_text_en' => 'Learn more',
                            'link_url' => '/servicos',
                        ],
                        [
                            'title' => 'Plano de Negócios',
                            'title_en' => 'Business Planning',
                            'icon' => 'briefcase',
                            'description' => 'Desenvolvimento estratégico comercial, viabilidade econômica de plantas de processamento e estruturação de novos canais de distribuição B2B.',
                            'description_en' => 'Strategic commercial development, economic feasibility of processing plants, and structuring of new B2B distribution channels.',
                            'link_text' => 'Saiba mais',
                            'link_text_en' => 'Learn more',
                            'link_url' => '/servicos',
                        ],
                        [
                            'title' => 'Veg Oxi 200',
                            'title_en' => 'Veg Oxi 200',
                            'icon' => 'shield-check',
                            'description' => 'Substituição tecnológica para sulfitos e metabissulfito de sódio. Antioxidante orgânico seguro e com excelente custo-benefício de apenas 1 centavo por hortaliça.',
                            'description_en' => 'Technological replacement for sulfites and sodium metabisulfite. Safe organic antioxidant with an outstanding cost-benefit of only 1 cent per vegetable.',
                            'link_text' => 'Saiba mais',
                            'link_text_en' => 'Learn more',
                            'link_url' => '/veg-oxi',
                        ],
                    ]
                ]
            ]
        );

        // About Section
        $home->sections()->updateOrCreate(
            ['key' => 'about'],
            [
                'content' => [
                    'badge' => 'Por Trás da VegQuality',
                    'title' => 'Paixão que Gera Resultados!',
                    'highlight_text' => 'Como transformar a ciência em uma aliada do campo e da mesa do consumidor?',
                    'desc1' => 'Essa foi a pergunta que moveu a trajetória da Dra. Roseane Bob.',
                    'desc2' => 'Nutricionista especialista em segurança de alimentos e sustentabilidade, Roseane sempre “mergulhou de cabeça” na rotina de produtores e agroindústrias. Nessas vivências, a dura realidade do desperdício e os desafios para o processamento de vegetais frescos no Brasil pós-colheita saltaram aos seus olhos, evidenciando um prejuízo gigantesco para toda a cadeia de hortifrúti.',
                    'desc3' => 'A resposta para esse desafio veio em duas frentes complementares:',
                    'feature1_title' => 'VegQuality',
                    'feature1_desc' => 'Uma consultoria prática, altamente especializada e financeiramente acessível, desenhada para levar soluções de eficiência e segurança do pequeno ao grande produtor.',
                    'feature2_title' => 'Veg Oxi 200',
                    'feature2_desc' => 'Uma inovação exclusiva no mundo. Este coadjuvante de tecnologia reduz drasticamente as perdas de vegetais frescos processados prontos para o consumo e dispensa o uso de aditivos nocivos à saúde, tais como os sulfitos.',
                    'desc4' => 'Com esse ecossistema de soluções, a Dra. Roseane e sua equipe de colaboradores e parceiros unem o crescimento sustentável de negócios agrícolas ao direito do consumidor de ter vegetais mais frescos, duráveis e seguros em casa.',
                    'cta_text' => 'Conheça mais',
                    'cta_link' => '/empresa',
                ]
            ]
        );

        // Home Insights Section (NEW)
        $home->sections()->updateOrCreate(
            ['key' => 'home_insights'],
            [
                'content' => [
                    'badge' => 'Insights VegQuality',
                    'title' => 'Conhecimento que Transforma o Negócio',
                    'description' => 'Nossos insights e metodologias para apoiar sua agroindústria em todas as etapas da cadeia produtiva.',
                    'cards' => [
                        [
                            'title' => 'Processos',
                            'icon' => 'settings',
                            'description' => 'Padronização higiênico-sanitária operacional e processos industriais otimizados para zero desperdício.'
                        ],
                        [
                            'title' => 'Equipamentos',
                            'icon' => 'cpu',
                            'description' => 'Dimensionamento de maquinários ideais e escolha de tecnologias corretas para sua linha de processamento.'
                        ],
                        [
                            'title' => 'Cadeia de Frio',
                            'icon' => 'thermometer',
                            'description' => 'Monitoramento térmico rigoroso do campo ao ponto de venda, garantindo frescor e conformidade de gôndola.'
                        ],
                        [
                            'title' => 'Embalagens',
                            'icon' => 'box',
                            'description' => 'Seleção de filmes técnicos de atmosfera modificada passiva (MAP) adequados para cada hortaliça.'
                        ]
                    ]
                ]
            ]
        );

        // Home Why Choose Section (NEW)
        $home->sections()->updateOrCreate(
            ['key' => 'home_why_choose'],
            [
                'content' => [
                    'badge' => 'Diferencial',
                    'title' => 'Por que nos Escolher?',
                    'description' => 'Conhecimento, vivência e experiência em todas as etapas da cadeia produtiva de vegetais frescos processados.'
                ]
            ]
        );

        $home->sections()->updateOrCreate(
            ['key' => 'home_contact_cta'],
            [
                'content' => [
                    'badge' => 'Fale Conosco',
                    'title' => 'Pronto para transformar a sua produção de hortaliças?',
                    'subtitle' => 'Entre em contato conosco hoje mesmo e fale diretamente com um especialista técnico da VegQuality.',
                    'phone' => '+55 11 5194-0325',
                    'whatsapp' => '+55 11 97834-8438',
                    'whatsapp_link' => 'https://wa.me/5511978348438?text=Ol%C3%A1%2C%20gostaria%20de%20conversar%20sobre%20as%20solu%C3%A7%C3%B5es%20da%20VegQuality.',
                    'email' => 'vegquality@vegquality.com.br',
                    'address' => 'Avenida Paulista, 1471, Conjunto 511, São Paulo – SP | CEP 01311-927'
                ]
            ]
        );

        // Seed Columnist (Dra. Roseane Bob)
        $columnist = \App\Models\Columnist::updateOrCreate(
            ['slug' => 'roseane-bob'],
            [
                'name' => 'Roseane Bob',
                'role' => 'Diretora Técnica — VegQuality',
                'bio' => 'Nutricionista especialista em segurança de alimentos e sustentabilidade, com mais de 20 anos de atuação.',
            ]
        );

        // Delete old dummy articles
        \App\Models\Article::whereIn('slug', ['sp-endurece-inspecao-de-vegetais', 'quem-planeja-escala-lucra'])->delete();

        // Seeding 5 articles
        \App\Models\Article::updateOrCreate(
            ['slug' => 'sp-endurece-a-inspecao-de-flv-processados'],
            [
                'title' => 'SP Endurece a Inspeção de FLV Processados',
                'excerpt' => 'No último dia 10 de março de 2026, foi publicado o Decreto nº 70.447, que regulamenta a Lei nº 18.154/2025. Com este passo, o Governo do Estado de São Paulo oficializa as regras práticas para o funcionamento do SISP-POV...',
                'content' => '<p>No último dia 10 de março de 2026, foi publicado o Decreto nº 70.447, que regulamenta a Lei nº 18.154/2025. Com este passo, o Governo do Estado de São Paulo oficializa as regras práticas para o funcionamento do SISP-POV e estabelece como as agroindústrias devem se registrar através do sistema GEDAVE.</p>
<p>Agora, o que era uma previsão legal tornou-se uma realidade operacional. Esta é a mudança mais significativa para o setor de vegetais das últimas décadas, estabelecendo diretrizes claras sobre segurança alimentar, qualidade sanitária e rastreabilidade para toda a cadeia produtiva.</p>
<h3>Criação do Serviço de Inspeção de Produtos de Origem Vegetal</h3>
<p>A grande novidade é a operação do Serviço de Inspeção de Produtos de Origem Vegetal (SISP-POV). Sob a coordenação da Secretaria de Agricultura e Abastecimento (CIPOAV), este sistema é o braço executor de:</p>
<ul>
  <li><strong>Inspeção e Fiscalização:</strong> Monitoramento constante das linhas de produção.</li>
  <li><strong>Auditorias e Certificação:</strong> Validação de estabelecimentos e produtos.</li>
  <li><strong>Garantia de Identidade:</strong> Assegurar que o consumidor receba exatamente o que está descrito no rótulo.</li>
</ul>
<h3>Integração com o Sistema Brasileiro de Inspeção (SISBI-POV)</h3>
<p>Um dos pontos mais estratégicos da nova legislação é a integração ao sistema federal.</p>
<p>O impacto é direto: Empresas paulistas certificadas poderão comercializar seus produtos em todo o território nacional, eliminando barreiras burocráticas estaduais, desde que comprovem equivalência aos requisitos sanitários federais.</p>
<h3>Impactos para a Agroindústria de Vegetais Frescos e Processados</h3>
<p>A nova legislação tem impacto direto em empresas que atuam no processamento de:</p>
<ul>
  <li>Vegetais higienizados e folhosos prontos para consumo;</li>
  <li>Mix de saladas, legumes cortados e embalados;</li>
  <li>Produtos vegetais industrializados, algas e cogumelos.</li>
</ul>
<p>Para estas empresas, a lei reforça a obrigatoriedade de processos estruturados, com destaque para:</p>
<ul>
  <li>Implementação de Boas Práticas de Fabricação (BPF);</li>
  <li>Adoção de programas de autocontrole sanitário;</li>
  <li>Sistemas de rastreabilidade da matéria-prima e do produto final;</li>
  <li>Monitoramento rigoroso da cadeia de frio e das condições de processamento.</li>
</ul>
<h3>Próximos Passos: Como se preparar para o SISP-POV?</h3>
<p>Se a sua operação envolve vegetais frescos, minimamente processados ou industrializados em São Paulo, o cronograma de adequação já está em curso. Confira o roteiro básico:</p>
<ul>
  <li><strong>Diagnóstico de Infraestrutura:</strong> Avalie se o layout de produção e armazenamento atende às normas sanitárias para evitar contaminação cruzada.</li>
  <li><strong>Documentação Técnica:</strong> Organize ou atualize seus Manuais de BPF e os Procedimentos Operacionais Padronizados (POPs).</li>
  <li><strong>Rastreabilidade:</strong> Implemente registros que conectem a origem da matéria-prima no campo até o lote final distribuído.</li>
  <li><strong>Treinamento:</strong> Garanta que a equipe de produção esteja capacitada para as novas exigências de higiene e auditorias técnicas.</li>
  <li><strong>Consulta ao GEDAVE:</strong> Monitore o sistema de Defesa Agropecuária para os prazos e procedimentos de registro da sua categoria.</li>
</ul>
<h3>Oportunidade de Modernização</h3>
<p>A adequação às novas exigências representa uma oportunidade para as agroindústrias investirem na melhoria da gestão da qualidade e na redução de perdas. Empresas que adotam práticas estruturadas tendem a obter melhores resultados em termos de shelf life, eficiência operacional e, sobretudo, no fortalecimento da confiança do consumidor final.</p>
<p><strong>Links para Consulta Oficial:</strong><br>
<a href="https://www.agricultura.sp.gov.br" target="_blank" rel="noopener">Decreto nº 70.447/2026 (Regulamentação e GEDAVE)</a><br>
<a href="https://www.al.sp.gov.br" target="_blank" rel="noopener">Lei nº 18.154/2025 (Texto Integral na ALESP)</a><br>
<a href="https://gedave.defesaagropecuaria.sp.gov.br" target="_blank" rel="noopener">Acesso ao Sistema GEDAVE (Secretaria de Agricultura)</a></p>',
                'published_at' => \Carbon\Carbon::create(2026, 3, 16),
                'status' => 'published',
                'category' => 'Legislação',
                'columnist_id' => $columnist->id,
                'author_name' => 'Roseane Bob',
            ]
        );

        \App\Models\Article::updateOrCreate(
            ['slug' => 'quem-planeja-escala-lucra-quem-improvisa-perde'],
            [
                'title' => 'Quem Planeja Escala, Lucra. Quem Improvisa, Perde.',
                'excerpt' => 'Na agroindústria de vegetais frescos e minimamente processados (FLV), decisões tomadas na fase de concepção do projeto determinam o desempenho operacional e financeiro por muitos anos...',
                'content' => '<p>Na agroindústria de vegetais frescos e minimamente processados (FLV), decisões tomadas na fase de concepção do projeto determinam o desempenho operacional e financeiro por muitos anos.</p>
<p>Ainda assim, é comum que investimentos sejam iniciados com foco prioritário em equipamentos e obras civis, enquanto o dimensionamento de volume, a previsão de crescimento e a escalabilidade do sistema permanecem baseados em estimativas genéricas.</p>
<p>Esse é um erro estrutural.</p>
<p><strong>Tecnologia de processamento não começa na compra do equipamento. Começa no projeto: capacidade, fluxo sanitário, cadeia de frio, controle e crescimento planejado.</strong></p>
<h3>Capacidade produtiva: o ponto mais sensível do projeto</h3>
<p>A pergunta central que deve anteceder qualquer investimento é objetiva: <em>Qual volume diário viabiliza a operação hoje, e qual volume será exigido em 2, 5 e 10 anos?</em></p>
<p>Sem essa resposta, o projeto nasce vulnerável.</p>
<ul>
  <li><strong>Subdimensionamento</strong> gera gargalos, pressão sobre a cadeia de frio, perda de qualidade, redução de shelf life, aumento de risco sanitário e crescimento bloqueado pela própria estrutura.</li>
  <li><strong>Superdimensionamento</strong> gera capital imobilizado, custo fixo elevado, baixa eficiência energética, ociosidade e retorno sobre investimento comprometido.</li>
</ul>
<p>Ambos reduzem a competitividade.</p>
<h3>Crescimento não pode ser improvisado: a planta deve nascer escalável!</h3>
<p>Projetos maduros não “crescem por puxadinho”. Eles nascem com escalabilidade incorporada no desenho. Isso inclui:</p>
<ul>
  <li>Layout modular com possibilidade de expansão por etapas;</li>
  <li>Zonas técnicas planejadas (areas futuras, corredores de serviço, utilidades);</li>
  <li>Capacidade elétrica/hidráulica preparada para aumento de carga;</li>
  <li>Cadeia de frio dimensionada com lógica de crescimento (expansão em módulos);</li>
  <li>Fluxo sanitário preservado mesmo em cenários de ampliação.</li>
</ul>
<p>Em outras palavras: crescer sem redesenhar o risco sanitário.</p>
<h3>Equipamentos e máquinas: modularidade como estratégia de investimento</h3>
<p>Existe um equívoco recorrente: tratar aquisição de equipamentos como “pacote fechado” e definitivo. Na agroindústria moderna, o correto é projetar a tecnologia como um sistema modular, com evolução planejada.</p>
<p>Na prática, isso significa que é possível:</p>
<h4>1) Projetar para crescer dentro da estrutura física atual</h4>
<p>Com desenho inteligente do layout e da sequência de processo, é viável aumentar capacidade sem mudar de planta, por exemplo:</p>
<ul>
  <li>Linhas de lavagem e higienização em módulos adicionais (paralelização)</li>
  <li>Centrifugação com expansão por unidades independentes</li>
  <li>Mesas e esteiras com extensão e novos pontos de inspeção</li>
  <li>Embalagem escalável (ex.: ampliar cabeçotes, adicionar seladoras, incorporar MAP por fases)</li>
  <li>Câmaras frias em módulos (aumentando volume útil e controle por zona)</li>
</ul>
<p>Essa lógica permite aumentar volume mantendo o fluxo sanitário, a separação técnica de áreas, o tempo máximo fora de refrigeração e os pontos de controle operacionais.</p>
<h4>2) Projetar para crescer em caso de mudança de planta</h4>
<p>Quando a empresa prevê migração futura (nova unidade, expansão regional ou centralização), o projeto de equipamentos pode ser planejado para “mudar junto”, evitando perda de investimento.</p>
<p>Isso envolve:</p>
<ul>
  <li>Máquinas e linhas concebidas em módulos transportáveis</li>
  <li>Padronização de interfaces (layout, utilidades, conexões)</li>
  <li>Skids de processo (água, dosagem, sanitização) que podem ser realocados</li>
  <li>Sistema de embalagem e utilidades dimensionados em estágios, com reaproveitamento</li>
</ul>
<p>A consequência executiva é clara: o investimento deixa de ser “fixo e rígido” e passa a ser ativo estratégico, preparado para acompanhar o crescimento do negócio.</p>
<h3>Segurança do alimento e responsabilidade executiva</h3>
<p>A segurança do alimento disponibilizado ao consumidor não é apenas responsabilidade do time operacional. É responsabilidade estratégica da liderança.</p>
<p>Quando o crescimento não é planejado, os impactos aparecem primeiro nos pilares de segurança:</p>
<ul>
  <li>Acúmulo de matéria-prima fora da temperatura ideal</li>
  <li>Aumento de tempos entre etapas</li>
  <li>Pressão sobre higienização e monitoramentos</li>
  <li>Redução do controle efetivo de pontos críticos (APPCC/HACCP)</li>
</ul>
<p>Uma planta operando acima da capacidade real aumenta o risco de insegurança do alimento e compromete a rastreabilidade e a conformidade.</p>
<p>Em mercados cada vez mais exigentes (varejo, exportação, alimentos infantis, hospitais, "private label"), falhas deixam de ser operacionais e passam a ser reputacionais.</p>
<h3>Previsibilidade financeira: sem volume, não há resultado</h3>
<p>Planejamento de capacidade (e do crescimento) impacta diretamente no custo por kg processado, na margem operacional e perdas técnicas, na necessidade real de mão de obra e turnos, na energia, água, insumos e logística, e no retorno sobre investimento.</p>
<p>Sem clareza de volume, não há previsibilidade de resultado. E sem previsibilidade, não há sustentabilidade.</p>
<p>A tecnologia de processamento na agroindústria de vegetais frescos é a integração entre: <strong>Projeto + Capacidade + Controle + Escalabilidade + Responsabilidade</strong>.</p>
<p>A planta mais eficiente não é a maior, nem a mais cara. É a que foi dimensionada e estruturada com base em dados, mercado e visão de longo prazo, com tecnologia desenhada para acompanhar o crescimento. Crescimento sustentável começa no papel antes do concreto.</p>
<p>A diferença entre custo e investimento está na forma como se planeja. Quem projeta com visão colhe previsibilidade. E quem estrutura com técnica constrói vantagem competitiva duradoura.</p>
<p>Até a próxima!</p>',
                'published_at' => \Carbon\Carbon::create(2026, 3, 3),
                'status' => 'published',
                'category' => 'Planejamento',
                'columnist_id' => $columnist->id,
                'author_name' => 'Roseane Bob',
            ]
        );

        \App\Models\Article::updateOrCreate(
            ['slug' => 'tendencias-e-oportunidades-para-2026'],
            [
                'title' => 'Tendências e Oportunidades para 2026',
                'excerpt' => 'Iniciamos mais um ano com renovada energia, compromisso e responsabilidade com a agroindústria de vegetais frescos e minimamente processados...',
                'content' => '<p>Iniciamos mais um ano com renovada energia, compromisso e responsabilidade com a agroindústria de vegetais frescos e minimamente processados. Desejamos a toda a cadeia produtiva que este seja um ano de boas colheitas, processos mais eficientes e operações cada vez mais sustentáveis e resilientes.</p>
<p>Seguimos firmes na nossa missão de apoiar empresas a produzirem vegetais prontos para o consumo seguros, nutritivos e com menos desperdício — sempre aliando ciência, prática operacional e gestão responsável dos recursos.</p>
<p>Com esse espírito de parceria e melhoria contínua, compartilhamos algumas reflexões importantes sobre o uso eficiente de insumos no processamento de vegetais.</p>
<h3>Eficiência no uso de insumos começa no processo</h3>
<p>Na agroindústria de vegetais frescos e minimamente processados, é comum associar ganhos ou perdas diretamente aos insumos utilizados. Entretanto, a experiência prática mostra que a eficiência de qualquer insumo comprovadamente eficaz — tais como sanitizante, antioxidante, embalagens — depende diretamente de como ele é aplicado dentro do processo operacional.</p>
<p>Quando processos não estão bem definidos, padronizados e controlados, mesmo insumos tecnicamente e operacionalmente validados tendem a apresentar resultados inconsistentes.</p>
<h3>Insumos não corrigem falhas de processo, nem lacunas de treinamento</h3>
<p>Nenhum insumo por mais eficaz que seja consegue compensar fragilidades no processo operacional. Resultados consistentes dependem, antes de tudo, de etapas bem definidas e padronizadas, diluições corretas, água dentro dos parâmetros adequados, tempo de contato suficiente e registros claros de qualquer mudança operacional.</p>
<p>Mas, acima de tudo, dependem de equipes capacitadas, que compreendam não apenas o “como fazer”, mas o porquê de cada etapa do processo. Quando os resultados variam, o caminho mais eficiente é sempre começar avaliando o processo e o nível de treinamento da equipe e só então revisar o insumo utilizado. Essa abordagem é o que garante qualidade, previsibilidade e melhores resultados para o negócio.</p>
<h3>Processo claro + equipe preparada = resultados consistentes</h3>
<p>Para garantir eficiência no uso de insumos, é fundamental:</p>
<ul>
  <li>Mapear com precisão cada etapa do processo;</li>
  <li>Padronizar procedimentos operacionais;</li>
  <li>Assegurar que a equipe compreenda o papel e a importância de cada insumo e em qual etapa utilizar;</li>
  <li>Investir em capacitação contínua, minimizando erros e aumentando a previsibilidade dos resultados.</li>
</ul>
<p>Esse alinhamento técnico-operacional cria as bases para maior qualidade, estabilidade produtiva e melhor desempenho do negócio.</p>
<h3>Veg Oxi 200: eficiência de uso aplicada ao processo</h3>
<p>Dentro desse contexto, o Veg Oxi 200 se destaca como um antioxidante natural, sem sulfitos, desenvolvido para preservar cor, frescor e qualidade dos vegetais.</p>
<p>Assim como qualquer insumo comprovadamente eficaz, seu desempenho depende da correta aplicação no processo operacional e da capacitação da equipe.</p>
<p>Quando utilizado conforme protocolo e integrado a um processo bem controlado, o Veg Oxi contribui para:</p>
<ul>
  <li>Preservação da qualidade sensorial (cor, textura, frescor) e nutricional;</li>
  <li>Redução significativa de perdas por oxidação;</li>
  <li>Otimização do antioxidante;</li>
  <li>Aumento da vida útil do produto.</li>
</ul>
<h3>Eficiência de uso = optimização e redução de custos</h3>
<p>O uso eficiente de insumos reflete diretamente nos resultados da operação: menos desperdício, menor retrabalho, menos erros operacionais, melhor controle de custos e maior previsibilidade produtiva. Eficiência de uso não é custo adicional, é gestão inteligente de recursos e pessoas.</p>
<h3>Planejamento, processos administrativos e capacitação completam o ciclo</h3>
<p>A eficiência técnica operacional só se sustenta quando acompanhada de planejamento claro e consistente, etapas produtivas bem definidas, protocols técnicos atualizados e validados, alinhamento entre áreas e treinamento contínuo das equipes.</p>
<p>Isso garante consistência ao longo do ano, mesmo diante de desafios como clima, sazonalidade e variações de matéria-prima.</p>
<p>Insumos eficientes exigem processos eficientes e equipes bem preparadas.</p>
<p>O Veg Oxi 200 entrega seu melhor desempenho quando integrado a um processo claro, padronizado e conduzido por times capacitados.</p>
<p>Seguimos à disposição para caminhar junto com nossos parceiros ao longo deste ano, sempre com foco em qualidade, eficiência, redução de perdas e sustentabilidade.</p>
<p>Até a próxima, seguimos juntos!</p>',
                'published_at' => \Carbon\Carbon::create(2026, 1, 21),
                'status' => 'published',
                'category' => 'Planejamento',
                'columnist_id' => $columnist->id,
                'author_name' => 'Roseane Bob',
            ]
        );

        \App\Models\Article::updateOrCreate(
            ['slug' => 'colheita-de-grandes-resultados'],
            [
                'title' => 'Colheita de Grandes Resultados',
                'excerpt' => 'Neste ano, ampliamos e fortalecemos nossos programas de consultoria técnica e soluções personalizadas, impulsionando resultados reais para nossos clientes...',
                'content' => '<p>Neste ano, ampliamos e fortalecemos nossos programas de consultoria técnica e soluções personalizadas, impulsionando resultados reais para nossos clientes.</p>
<p>Nossas soluções têm gerado resultados concretos para empresas de todos os portes, incluindo:</p>
<ul>
  <li>Aumento significativo da eficiência operacional, com capacitação prática em técnicas e processos essenciais para o preparo de vegetais frescos e higienizados;</li>
  <li>Redução consistente das perdas ao longo de toda a cadeia, desde o campo até a distribuição, por meio da qualificação estratégica de fornecedores e da elaboração de planos de negócio personalizados para empresas que desejam iniciar ou expandir suas operações de processamento;</li>
  <li>Implantação de controles de qualidade modernos e robustos, que garantem processos mais seguros, padronizados e competitivos;</li>
  <li>Maior estabilidade, uniformidade e valor agregado nos vegetais prontos para consumo, resultando em alimentos mais frescos, nutritivos e visualmente atrativos para o mercado.</li>
</ul>
<h3>Segurança Alimentar & Sustentabilidade</h3>
<p>Contribuímos para que toda a agroindústria de vegetais frescos e higienizados — incluindo o produtor rural, parte essencial dessa cadeia — adote práticas mais seguras, eficientes e sustentáveis, sempre de forma colaborativa e alinhada às necessidades de cada cliente.</p>
<p>Trabalhamos lado a lado com as equipes para fortalecer rotinas, reduzir riscos e apoiar a entrega de alimentos mais confiáveis, nutritivos e de qualidade superior ao consumidor.</p>
<h3>Veg Oxi 200: Expansão, Desempenho e Sustentabilidade</h3>
<p>Em 2025, o Veg Oxi 200 ganhou ainda mais destaque como a solução antioxidante preferida pela agroindústria de FLV.</p>
<p>Resultados obtidos por nossos clientes:</p>
<ul>
  <li>Retardamento da oxidação e do escurecimento dos vegetais frescos e prontos para o consumo, garantindo aparência superior por mais tempo;</li>
  <li>Vida útil ampliada, menor índice de devoluções e maior estabilidade na distribuição;</li>
  <li>Produtos mais frescos, atrativos e nutritivos, que conquistam o consumidor pela qualidade;</li>
  <li>Redução significativa do descarte, fortalecendo a sustentabilidade e a rentabilidade do negócio;</li>
  <li>Processos totalmente livres de sulfito, mais seguros para o consumidor e mais responsáveis para o meio ambiente.</li>
</ul>
<h3>Sustentabilidade & Futuro da Alimentação</h3>
<p>Em 2025, atuamos fortemente em projetos que promovem a economia circular e redução do impacto ambiental, a melhoria no uso de água, energia e embalagens, o menor desperdício ao longo da cadeia de valor e programas educativos e ações de conscientização.</p>
<p>Acreditamos que um futuro alimentar mais justo e sustentável começa com decisões técnicas bem orientadas e seguimos comprometidos com esse propósito.</p>
<h3>Novidades no Website</h3>
<p>Nosso site — <a href="http://www.vegquality.com.br" target="_blank" rel="noopener">www.vegquality.com.br</a> — passou por aprimoramentos importantes. Em 2026, continuará evoluindo com mais conteúdos técnicos, materiais educativos e soluções para apoiar ainda mais a cadeia de vegetais frescos.</p>
<p>Agradecemos profundamente a todos os clientes, parceiros, fornecedores e equipes da agroindústria que caminharam conosco em 2025. O compromisso de vocês inspira o nosso e, juntos, chegamos mais longe. Desejamos um 2026 repleto de saúde, prosperidade e colheitas de excelentes resultados.</p>',
                'published_at' => \Carbon\Carbon::create(2025, 12, 12),
                'status' => 'published',
                'category' => 'Geral',
                'columnist_id' => $columnist->id,
                'author_name' => 'Roseane Bob',
            ]
        );

        \App\Models\Article::updateOrCreate(
            ['slug' => 'os-desafios-da-agroindustria-de-flv-processados-no-brasil'],
            [
                'title' => 'Os Desafios da Agroindústria de FLV Processados no Brasil',
                'excerpt' => 'Trabalhar com vegetais frescos e higienizados é mais do que uma profissão: é um compromisso diário com a natureza, o alimento e a ciência...',
                'content' => '<p>Trabalhar com vegetais frescos e higienizados é mais do que uma profissão: é um compromisso diário com a natureza, o alimento e a ciência.</p>
<p>Em mais de 20 anos de atuação na cadeia dos vegetais frescos e higienizados, prontos para o consumo, acompanhei o amadurecimento de um sector que vem se solidificando com muito esforço, e hoje busca o reconhecimento que merece dentro do agronegócio brasileiro.</p>
<p>Recently, a CNVeg (Câmara Nacional de Vegetais Frescos e Higienizados) e o Ibrahort (Instituto Brasileiro de Horticultura) publicaram uma Pesquisa de Mercado (2023) que retrata com precisão esse cenário: um setor em expansão, com grande potencial, mas que ainda enfrenta obstáculos estruturais que comprometem seu crescimento sustentável.</p>
<h3>O campo: onde a qualidade realmente começa</h3>
<p>A preservação da qualidade de um vegetal fresco e higienizado começa muito antes da indústria. No campo, produtores lidam com pragas, doenças, intempéries e variações climáticas que exigem controle técnico, manejo sustentável e decisões diárias que impactam diretamente o resultado final.</p>
<p>Grande parte dos cultivos ainda ocorre a céu aberto, o que torna o controle de qualidade um desafio constante. Manter o padrão visual, a textura e a segurança alimentar requer planejamento agrícola, colheita no ponto fisiológico ideal e logística eficiente.</p>
<p>Como sempre digo: <em>não há produto final de excelência sem uma matéria-prima de excelência, e não há matéria-prima de excelência sem integração entre o campo e a indústria.</em></p>
<h3>Processamento: o elo que define confiança</h3>
<p>Segundo a pesquisa CNVeg & Ibrahort, apenas 61% das empresas mantêm a temperatura de produção abaixo de 15 °C e apenas 45% utilizam água refrigerada no processamento. Esses dados revelam uma fragilidade crítica: a cadeia de frio ainda é o ponto mais sensível da cadeia produtiva.</p>
<p>Ao longo dos anos, testemunhei transformações significativas em operações que compreenderam que uma cadeia de frio eficiente do campo à distribuição, aliada à higienização adequada, ao uso de antioxidantes, à padronização de processos, à escolha criteriosa de maquinários, equipamentos e embalagens, à capacitação e profissionalização das equipes e ao foco na qualidade final e na segurança higiênico-sanitária, não representam custos, mas sim investimentos estratégicos em qualidade, segurança e reputação.</p>
<h3>O retrato do setor</h3>
<p>O levantamento do CNVeg & Ibrahort mostra um setor composto majoritariamente por pequenas e médias empresas (80%), com faturamento médio mensal de R$ 900 mil, concentradas nas regiões Sudeste e Sul. As principais linhas de produtos são:</p>
<ul>
  <li>Folhosas (96%)</li>
  <li>Legumes (85%)</li>
  <li>Temperos (65%)</li>
  <li>Saladas prontas (56%)</li>
</ul>
<p>Os maiores desafios identificados foram:</p>
<ul>
  <li>Mão de obra e capacitação técnica (34%)</li>
  <li>Falta de cultura do cliente e valorização do produto (32%)</li>
  <li>Dificuldades comerciais e de posicionamento (25%)</li>
  <li>Logística e transporte refrigerado (17%)</li>
  <li>Falta de regulamentação e fiscalização (15%)</li>
</ul>
<p>Mesmo com tantos obstáculos, 82% das empresas projetam crescimento nos próximos 12 meses — prova da resiliência e da paixão de quem trabalha com alimentos vivos, saudáveis e altamente perecíveis.</p>
<h3>O que precisamos fortalecer</h3>
<p>Os dados refletem um setor que amadureceu, mas ainda carece de profissionalização, padronização e cultura de qualidade contínua. Evoluímos em tecnologia, conhecimento e profissionais capacitados, entretanto precisamos integrar os elos da cadeia e alinhar estratégias entre o campo, a indústria e o consumidor.</p>
<p>O produtor e a agroindústria de vegetais frescos e higienizados precisam compreender o padrão que o mercado exige. A indústria deve valorizar quem garante a base da qualidade: o cultivo. E o consumidor, cada vez mais atento, precisa reconhecer, valorizar e confiar nos vegetais frescos, higienizados e prontos para o consumo.</p>
<p>E você, que vive o dia a dia do VFH (vegetais frescos higienizados)? Na sua realidade, qual é o seu maior desafio na cadeia produtiva de vegetais frescos e higienizados?</p>',
                'published_at' => \Carbon\Carbon::create(2025, 10, 13),
                'status' => 'published',
                'category' => 'Geral',
                'columnist_id' => $columnist->id,
                'author_name' => 'Roseane Bob',
            ]
        );

        // 1. Page: Empresa
        $empresa = \App\Models\Page::updateOrCreate(
            ['slug' => 'empresa'],
            [
                'title' => 'A Empresa | VegQuality - Consultoria em Biotecnologia & Segurança Alimentar',
                'meta_description' => 'Saiba mais sobre a VegQuality, fundada pela Dra. Roseane Bob. Oferecemos consultoria científica para estender o shelf-life e eliminar o metabissulfito de sódio na agroindústria.',
            ]
        );

        $empresa->sections()->updateOrCreate(
            ['key' => 'empresa_hero'],
            [
                'content' => [
                    'title' => 'Consultoria e Soluções para a Agroindústria',
                    'subtitle' => 'Ciência e tecnologia aliadas para garantir alimentos mais seguros, saudáveis e lucrativos.',
                ]
            ]
        );

        // Delete stats banner if it exists
        $empresa->sections()->where('key', 'empresa_stats')->delete();

        $empresa->sections()->updateOrCreate(
            ['key' => 'empresa_sulfito'],
            [
                'content' => [
                    'badge' => 'VegQuality',
                    'title' => '100% Livre de sulfitos',
                    'description' => 'Você sabia que o metabissulfito de sódio (dióxido de enxofre) é amplamente usado como conservante nos vegetais frescos processados? 🌱 Com o <strong>Veg Oxi 200</strong>, isso fica definitivamente no passado! Oferecemos um coadjuvante de tecnologia inovador que substitui aditivos químicos nocivos com total eficácia.',
                    'check1' => 'Livre de dióxido de enxofre.',
                    'check2' => 'Preserva alimentos de forma natural.',
                    'check3' => 'Respeita a saúde do consumidor e do operador.',
                ]
            ]
        );

        $empresa->sections()->updateOrCreate(
            ['key' => 'empresa_frescor'],
            [
                'content' => [
                    'badge' => 'VegQuality',
                    'title' => 'Consultoria 360°',
                    'highlight_text' => 'Transforme sua linha de vegetais frescos prontos para o consumo!',
                    'description' => 'Na Veg Quality, oferecemos soluções personalizadas e consultoria especializada para impulsionar a eficiência técnica e a segurança operacional da sua planta de processamento.',
                    'image' => 'assets/hero/Home-Veg-scaled.jpg',
                    'feature1_title' => 'Aumentar a durabilidade',
                    'feature1_desc' => 'Amplie consideravelmente o shelf-life e mantenha o frescor natural dos produtos por mais tempo.',
                    'feature2_title' => 'Reduzir custos e perdas',
                    'feature2_desc' => 'Minimize desperdícios na produção por meio de processos padronizados e tecnologia de ponta.',
                    'feature3_title' => 'Elevar os padrões',
                    'feature3_desc' => 'Garanta conformidade estrita com normas sanitárias e entregue máxima qualidade ao mercado.',
                ]
            ]
        );

        $empresa->sections()->updateOrCreate(
            ['key' => 'empresa_quem_somos'],
            [
                'content' => [
                    'badge' => 'Liderança e Ciência',
                    'title' => 'História da VegQuality<br><span style="color: var(--color-veg-primary);">Consultoria que gera resultados!</span>',
                    'description1' => 'A VegQuality é mais que uma consultoria: é uma parceira estratégica para empresas que atuam na agroindústria de vegetais frescos, do campo aos pontos de distribuição.',
                    'description2' => 'Combinando ciência, inovação, experiência prática e propósito, entregamos soluções personalizadas que fortalecem a qualidade, a segurança, a sustentabilidade e a rentabilidade da agroindústria de vegetais frescos higienizados.',
                    'image' => 'assets/images/Foto-Roseane-Bob-profissional.jpg',
                    'image_caption' => 'Drª Roseane Bob, fundadora e diretora da VegQuality',
                    'card1_num' => '100%',
                    'card1_label' => 'Expertise',
                    'card2_num' => '100%',
                    'card2_label' => 'Experiência',
                    'card3_num' => '100%',
                    'card3_label' => 'Resultados',
                ]
            ]
        );

        // 2. Page: Serviços
        $servicos = \App\Models\Page::updateOrCreate(
            ['slug' => 'servicos'],
            [
                'title' => 'Serviços Oferecidos | VegQuality - Consultoria & Tecnologia para FLV',
                'meta_description' => 'Conheça nossos serviços de planos de negócios, treinamentos direcionados e a tecnologia exclusiva do Veg Oxi 200. Tire suas dúvidas sobre o processamento de vegetais frescos.',
            ]
        );

        $servicos->sections()->updateOrCreate(
            ['key' => 'servicos_hero'],
            [
                'content' => [
                    'title' => 'Serviços Oferecidos',
                    'subtitle' => 'Soluções estratégicas e operacionais de ponta para elevar a rentabilidade e o padrão de qualidade na agroindústria.',
                ]
            ]
        );

        $servicos->sections()->updateOrCreate(
            ['key' => 'servicos_catalog'],
            [
                'content' => [
                    'badge' => 'Nossos Serviços - Soluções',
                    'title' => 'Consultoria 360° para a Agroindústria de FLV: Do Campo à Gôndola',
                    'service1_badge' => 'Consultoria',
                    'service1_title' => 'Consultoria',
                    'service1_desc' => 'Sua produção agroindustrial mais eficiente, segura e lucrativa. Nossa consultoria técnica acompanha o seu produto do campo à gôndola. Nós mergulhamos na sua operação para ajustar processos, otimizar maquinários, inovar em embalagens e estruturar sistemas rígidos de higienização. Onde houver uma não conformidade, nós entregamos a solução técnica. Deixe a burocracia e os gargalos operacionais conosco e foque exclusivamente no crescimento do seu negócio.',
                    'service1_link' => '/contato?subject=consultoria',
                    'service2_badge' => 'Treinamentos',
                    'service2_title' => 'Treinamentos',
                    'service2_desc' => 'Capacitação Prática para Resultados Reais. Ter procedimentos, manuais e POPs bem elaborados é fundamental, mas o verdadeiro desafio é transformá-los em ações consistentes no dia a dia da produção. Na VegQuality, nós levamos o conhecimento direto para o chão de fábrica. Atuamos lado a lado com operadores, líderes e manipuladores, integrando a capacitação à rotina real da sua agroindústria. O resultado? Processos que deixam de ser apenas papéis guardados e passam a ser compreendidos, aplicados e mantidos por todos.',
                    'service2_link' => '/contato?subject=treinamento',
                    'service3_badge' => 'Projetos',
                    'service3_title' => 'Plano de Negócios',
                    'service3_desc' => 'Agroindústria de FLV Processado: O mercado que mais cresce, mas que não aceita amadorismo. Investir em uma agroindústria sem um mapa claro é o caminho mais rápido para ver o seu capital evaporar. A falta de clareza sobre o tamanho real do investimento, o medo de comprar o maquinário errado e a incerteza se a conta vai fechar no final do mês podem transformar um grande sonho em uma enorme dor de cabeça financeira. Antes de colocar o seu dinheiro em jogo, você precisa de clareza absoluta sobre o que realmente funciona no dia a dia de uma fábrica. É preciso transformar a sua ideia em um negócio viável, seguro e altamente lucrativo.',
                    'service3_link' => '/contato?subject=plano-de-negocios',
                ]
            ]
        );

        $servicos->sections()->updateOrCreate(
            ['key' => 'servicos_faq'],
            [
                'content' => [
                    'badge' => 'FAQ Técnico',
                    'title' => 'Perguntas Frequentes',
                    'description' => 'Esclareça suas dúvidas técnicas sobre processos industriais, legislação e biotecnologia agrícola.',
                    'faqs' => [
                        [
                            'category' => 'Categoria 1: Mercado e Estratégia',
                            'question' => 'Já produzo no campo, vale a pena industrializar meus vegetais?',
                            'answer' => 'Sim. A agroindustrialização agrega valor aos vegetais frescos, aumenta a rentabilidade do negócio e permite atender à crescente demanda por alimentos práticos, convenientes e prontos para o consumo imediato.'
                        ],
                        [
                            'category' => 'Categoria 1: Mercado e Estratégia',
                            'question' => 'O que são vegetais frescos higienizados processados e por que esse mercado está crescendo tanto?',
                            'answer' => 'São vegetais frescos que passam por processos de seleção, corte, lavagem/higienização técnica, secagem centrífuga e acondicionamento em embalagens adequadas, mantendo o estado fresco natural e prontos para o preparo ou consumo. O mercado cresce aceleradamente pois resolve a falta de tempo nas rotinas modernas, reduzindo o desperdício doméstico e otimizando o preparo de refeições saudáveis.'
                        ],
                        [
                            'category' => 'Categoria 1: Mercado e Estratégia',
                            'question' => 'Preciso de um nutricionista ou engenheiro de alimentos fixo na minha pequena fábrica?',
                            'answer' => 'Não há obrigatoriedade de profissional em tempo integral de início. Você pode contar com consultoria externa periódica ou assessoria técnica especializada (como a oferecida pela VegQuality) para implementar as Boas Práticas de Fabricação (BPF) e estruturar toda a rotulagem e processos higiênicos com ótimo custo-benefício.'
                        ],
                        [
                            'category' => 'Categoria 2: Tecnologia e Conservação (Veg Oxi 200)',
                            'question' => 'O Veg Oxi 200 substitui o metabissulfito? Ele é aceito pela fiscalização?',
                            'answer' => 'Totalmente. O Veg Oxi 200 é um coadjuvante de tecnologia natural à base de Vitamina C, desenvolvido especificamente para substituir sulfitos (como o metabissulfito de sódio) que podem causar alergias. Ele atende às exigências mais rigorosas da ANVISA e do MAPA, garantindo um rótulo limpo (clean label) e seguro.'
                        ],
                        [
                            'category' => 'Categoria 2: Tecnologia e Conservação (Veg Oxi 200)',
                            'question' => 'Como garantir que o vegetal picado não escureça na prateleira?',
                            'answer' => 'Para evitar a oxidação enzimática (escurecimento), é fundamental alinhar a cadeia do frio (temperatura operacional abaixo de 5°C), utilizar uma embalagem com permeabilidade adequada de gases, e aplicar um antioxidante seguro e eficaz como o Veg Oxi 200 na etapa pós-lavagem.'
                        ],
                        [
                            'category' => 'Categoria 2: Tecnologia e Conservação (Veg Oxi 200)',
                            'question' => 'É possível processar vegetais e manter o sabor original sem conservantes químicos?',
                            'answer' => 'Sim, é totalmente possível através da biotecnologia limpa. O uso do Veg Oxi 200 atua controlando os processos oxidativos enzimáticos sem deixar gosto residual e sem alterar a textura ou a integridade celular das hortaliças, mantendo-as fiéis ao sabor original colhido no campo.'
                        ],
                        [
                            'category' => 'Categoria 3: Maquinários e Layout',
                            'question' => 'Preciso de máquinas caríssimas para começar a processar?',
                            'answer' => 'Não necessariamente. O segredo do sucesso não está no preço da máquina, mas na escolha técnica correta. Na nossa consultoria, ajudamos você a dimensionar os equipamentos ideais de acordo com o seu volume de produção, evitando gastos desnecessários.'
                        ],
                        [
                            'category' => 'Categoria 3: Maquinários e Layout',
                            'question' => 'Qual a diferença entre uma cortadora industrial e um processador comum?',
                            'answer' => 'As cortadoras industriais mantêm lâminas extremamente afiadas e formatos de corte de alta precisão que reduzem o estresse mecânico no tecido vegetal. Um processador comum esmaga a célula das folhas e legumes, liberando fluidos internos que aceleram o escurecimento e reduzem o tempo de gôndola.'
                        ],
                        [
                            'category' => 'Categoria 3: Maquinários e Layout',
                            'question' => 'Como saber se minha centrífuga está danificando as folhosas?',
                            'answer' => 'Quando as folhas saem amassadas, translúcidas ou manchadas após o ciclo, significa que a velocidade de centrifugação (RPM) está muito alta ou o tempo de ciclo está muito longo, lesionando as células do vegetal. Ajustar a centrífuga adequadamente é crucial para manter a qualidade.'
                        ],
                        [
                            'category' => 'Categoria 3: Maquinários e Layout',
                            'question' => 'Vale a pena comprar máquinas usadas para começar a agroindústria?',
                            'answer' => 'Sim, desde que a estrutura seja em aço inox 304, não tenha soldas porosas que acumulem bactérias e possuam fácil desmontagem das facas e correias. Uma inspeção técnica cuidadosa é essencial para evitar a contaminação alimentar sistemática e garantir conformidade de segurança (NR-12).'
                        ],
                        [
                            'category' => 'Categoria 3: Maquinários e Layout',
                            'question' => 'Existe uma ordem correta para a disposição das máquinas (Layout)?',
                            'answer' => 'Sim. O layout deve seguir um fluxo linear "em linha reta" ou "em U", sem retrocesso dos alimentos. Isso evita que o vegetal higienizado cruze com o vegetal sujo que acabou de vir do campo, prevenindo a contaminação microbiológica cruzada.'
                        ],
                        [
                            'category' => 'Categoria 4: Operação e Qualidade',
                            'question' => 'Como reduzir o desperdício (quebra) na minha linha de produção?',
                            'answer' => 'O desperdício geralmente vem de três fontes: falha no processo de corte/higienização, quebra na cadeia de frio (exposição à temperatura ambiente) e embalagens inadequadas que não controlam a respiração vegetal. Nossa Avaliação Técnica Operacional identifica e corrige esses gargalos.'
                        ],
                        [
                            'category' => 'Categoria 4: Operação e Qualidade',
                            'question' => 'O que é o "Calor de Campo" e como as máquinas ajudam a retirá-lo?',
                            'answer' => 'O calor de campo é a temperatura interna acumulada na planta devido à exposição solar no campo antes da colheita. Para removê-lo rapidamente, utilizamos sistemas de pré-resfriamento por água fria (hidroresfriamento) ou ventilação forçada em câmara fria imediatamente após o recebimento, desacelerando a respiração da hortaliça.'
                        ],
                        [
                            'category' => 'Categoria 4: Operação e Qualidade',
                            'question' => 'Qual a importância da "Cadeia do Frio" na industrialização de vegetais?',
                            'answer' => 'A temperatura é a principal ferramenta física de conservação de FLV. Manter a cadeia do frio a 2°C - 5°C em todas as etapas — processamento, transporte, armazenamento e ponto de venda — diminui o metabolismo do vegetal e o crescimento de bactérias e fungos, triplicando o shelf-life.'
                        ],
                        [
                            'category' => 'Categoria 4: Operação e Qualidade',
                            'question' => 'Como escolher a embalagem correta para o meu mix de produtos?',
                            'answer' => 'A embalagem ideal varia conforme a taxa de respiração de cada planta (por exemplo, brócolis respira muito mais rápido que cenouras). Devemos selecionar filmes plásticos técnicos com permeabilidade controlada (como filmes de atmosfera modificada passiva - MAP) que criam o microclima gasoso de oxigênio e gás carbônico ideal para retardar a maturação.'
                        ],
                        [
                            'category' => 'Categoria 5: Legislação (SISP-POV)',
                            'question' => 'O que muda com o novo Decreto nº 70.447 em São Paulo?',
                            'answer' => 'Este decreto tornou a fiscalização muito mais rigorosa em SP. Agora, toda agroindústria de vegetais processados minimamente precisa de registro sanitário formal de estabelecimentos produtores de vegetais processados e conformidade técnica integral. Nossa consultoria guia e assessora você por todo o processo de adequação da planta.'
                        ],
                        [
                            'category' => 'Categoria 5: Legislação (SISP-POV)',
                            'question' => 'O que é o SISP-POV e como funciona o registro oficial?',
                            'answer' => 'O SISP-POV refere-se ao Serviço de Inspeção de Produtos de Origem Vegetal de São Paulo. O registro atesta a segurança física, química e microbiológica do estabelecimento. Exige aprovação de leiaute arquitetônico industrial, rotulagem adequada e documentação técnica descritiva de processos produtivos sob auditoria do órgão fiscalizador competente.'
                        ],
                        [
                            'category' => 'Categoria 5: Legislação (SISP-POV)',
                            'question' => 'Quais os riscos de operar uma planta de vegetais frescos processados sem registro regulatório?',
                            'answer' => 'A falta de registro sanitário (ou SISP) acarreta em riscos graves de autuações administrativas, multas pesadas, interdição do estabelecimento e apreensão de mercadorias. Além disso, grandes redes de varejo, supermercados e redes de food service são legalmente proibidos de comprar mercadorias não fiscalizadas.'
                        ]
                    ]
                ]
            ]
        );

        $servicos->sections()->updateOrCreate(
            ['key' => 'servicos_clientes'],
            [
                'content' => [
                    'badge' => 'Parcerias de Sucesso',
                    'title' => 'Alguns de Nossos Clientes',
                    'description' => 'Marcas e cooperativas agrícolas que confiam no suporte técnico e biotecnológico da VegQuality.',
                    'logos' => [
                        'assets/clientes/cliente1.png',
                        'assets/clientes/cliente2.png',
                        'assets/clientes/cliente3.png',
                    ],
                ]
            ]
        );

        $servicos->sections()->updateOrCreate(
            ['key' => 'servicos_contacts'],
            [
                'content' => [
                    'conversar_title' => "Ainda tem dúvidas sobre a adequação da sua planta ou quer aplicar a tecnologia Veg Oxi 200 no seu negócio?<br><span style=\"color: var(--color-veg-primary);\">VAMOS CONVERSAR!</span>",
                    'conversar_p1_title' => 'Livre de Sulfitos',
                    'conversar_p1_desc' => 'Se você atua com vegetais frescos, higienizados e prontos para o consumo, o Veg Oxi 200 é a alternativa saudável e eficaz para substituir o metabissulfito e demais sulfitos.',
                    'conversar_p2_title' => 'Lucro Real',
                    'conversar_p2_desc' => 'Veg Oxi 200, o único antioxidante natural e eficaz que substitui os sulfitos, aumenta a vida útil dos vegetais prontos para o consumo, preserva a qualidade e a saudabilidade desses alimentos, além de reduzir perdas (quebras).',
                    'action_box_title' => 'Transforme sua Produção',
                    'action_box_desc' => 'Conte com a expertise e a inovação tecnológica da VegQuality para otimizar seus processos de FLV.',
                    'action_box_cta_text' => 'Falar Conosco',
                    'action_box_cta_link' => 'https://wa.me/5511978348438?text=Ol%C3%A1%2C%20gostaria%20de%20conversar%20sobre%20as%20solu%C3%A7%C3%B5es%20da%20VegQuality.',
                    'indicator1_num' => '100%',
                    'indicator1_label' => 'Livre de Sulfitos',
                    'indicator2_num' => '60%',
                    'indicator2_label' => 'Lucro sob perdas',
                    'promo_title' => 'Compre o Veg Oxi 200 e ganhe uma consultoria técnica de 30 minutos para otimizar seu processo e estender o shelf-life dos vegetais frescos.',
                    'promo_cta_text' => 'GARANTIR VEG OXI + CONSULTORIA',
                    'promo_cta_link' => 'https://wa.me/5511978348438?text=Ol%C3%A1%2C%20quero%20adquirir%20o%20Veg%20Oxi%20200%20e%20garantir%20minha%20consultoria%20t%C3%A9cnica%20de%2030%20minutos.',
                ]
            ]
        );

        // Veg Oxi Page (NEW)
        $vegOxi = \App\Models\Page::updateOrCreate(
            ['slug' => 'veg-oxi'],
            [
                'title' => 'Veg Oxi 200 | Antioxidante Natural para Vegetais Frescos e FLV',
                'meta_description' => 'Conheça os fatos, ficha técnica, protocolos de uso e canais de aquisição do Veg Oxi 200. O coadjuvante de tecnologia natural e livre de sulfitos.',
            ]
        );

        $vegOxi->sections()->updateOrCreate(
            ['key' => 'veg_oxi_hero'],
            [
                'content' => [
                    'title' => 'Veg Oxi 200',
                    'subtitle' => 'Tecnologia inovadora para conservação, shelf-life estendido e eliminação total do metabissulfito de sódio.'
                ]
            ]
        );

        $vegOxi->sections()->updateOrCreate(
            ['key' => 'veg_oxi_facts'],
            [
                'content' => [
                    'badge' => 'Por Trás do Produto',
                    'title' => 'Fatos sobre o Veg Oxi 200',
                    'cards' => [
                        [
                            'title' => 'Veg Oxi 200 (Origem)',
                            'desc' => 'O Veg Oxi 200 nasceu de uma necessidade real identificada no dia a dia da Dra. Roseane Bob, através da consultoria prestada a produtores rurais que processavam vegetais...',
                            'body' => 'O Veg Oxi 200 nasceu de uma necessidade real identificada no dia a dia da Dra. Roseane Bob, através da consultoria prestada a produtores rurais que processavam vegetais. Essa imersão prática na realidade do campo e do galpão de processamento foi a semente que, dez anos depois, transformou-se na VegQuality, hoje uma robusta consultoria especializada na agroindústria de vegetais frescos. Vivenciando de perto as dores e os desafios reais do setor, a cientista e fundadora da VegQuality percebeu a urgência do mercado por uma solução que retardasse o processo de oxidação e deterioração dos FLV, substituindo os sulfitos com total eficiência e segurança. Após intensas pesquisas no Brasil e no exterior, a Dra. Roseane desenvolveu este inovador coadjuvante de tecnologia, respeitando rigorosamente todas as exigências regulatórias.',
                            'icon' => 'history'
                        ],
                        [
                            'title' => 'Comercialização (VegQuality)',
                            'desc' => 'A gestão comercial, a distribuição e o suporte técnico estratégico do Veg Oxi 200 são realizados com exclusividade pela VegQuality. A história do produto está diretamente ligada à origem da nossa empresa...',
                            'body' => 'A gestão comercial, a distribuição e o suporte técnico estratégico do Veg Oxi 200 são realizados com exclusividade pela VegQuality. A história do produto está diretamente ligada à origem da nossa empresa. O Veg Oxi 200 nasceu há uma década, a partir da necessidade real identificada no dia a dia das consultorias prestadas pela nossa fundadora, a cientista Dra. Roseane Bob, a produtores rurais que processavam vegetais. O que começou no campo, dez anos depois se consolidou na VegQuality: uma robusta consultoria especializada na agroindústria de vegetais frescos. Ao escolher o Veg Oxi 200, o seu negócio não adquire apenas um produto, mas sim toda a bagagem prática, o atendimento especializado e o respaldo técnico de quem vive e respira o mercado de FLV.',
                            'icon' => 'award'
                        ],
                        [
                            'title' => 'Produção (Chemiquímica)',
                            'desc' => 'Para transformar a inovação científica da Dra. Roseane Bob em uma solução de alto padrão e escala para o mercado nacional, a produção e a industrialização do Veg Oxi 200 são realizadas pela Chemiquímica...',
                            'body' => 'Chemiquímica Ltda – Rigor e Escala Industrial: Para transformar a inovação científica da Dra. Roseane Bob em uma solução de alto padrão e escala para o mercado nacional, a produção e a industrialização do Veg Oxi 200 são realizadas pela Chemiquímica Ltda. Localizada em Ponta Grossa, no Paraná, a Chemiquímica é uma indústria moderna, robusta e estruturada, responsável por garantir o rigor analítico, a padronização e a máxima qualidade em cada lote fabricado. Essa estrutura industrial robusta garante que o Veg Oxi 200 seja entregue com total regularidade, segurança regulatória e eficiência logística para atender desde o pequeno produtor até as maiores agroindústrias do país.',
                            'icon' => 'factory'
                        ]
                    ]
                ]
            ]
        );

        $vegOxi->sections()->updateOrCreate(
            ['key' => 'veg_oxi_downloads'],
            [
                'content' => [
                    'badge' => 'Saiba Mais',
                    'title' => 'Detalhes Adicionais',
                    'downloads' => [
                        [
                            'title' => 'Ficha técnica',
                            'desc' => 'Conheça o Veg Oxi 200, o aliado que substitui os sulfitos, aumenta a produtividade, preserva o frescor e garante mais tempo de vida útil aos seus vegetais.',
                            'file' => 'downloads/ficha-tecnica-veg-oxi.pdf'
                        ],
                        [
                            'title' => 'Protocolos de uso',
                            'desc' => 'Tem dúvidas sobre como aplicar o Veg Oxi 200? Confira nossos protocolos de uso e boas práticas para potencializar sua eficácia e garantir o máximo desempenho em seus vegetais.',
                            'file' => 'downloads/protocolos-uso.pdf'
                        ]
                    ]
                ]
            ]
        );

        $vegOxi->sections()->updateOrCreate(
            ['key' => 'veg_oxi_contacts'],
            [
                'content' => [
                    'badge' => 'Canais de Atendimento',
                    'title' => 'Distribuição Veg Oxi 200',
                    'contacts' => [
                        [
                            'title' => 'Quero Adquirir em SP',
                            'desc' => 'Em São Paulo o tempo não para. Se você precisa do Veg Oxi 200 para ontem, é só clicar no botão abaixo!',
                            'link' => 'https://wa.me/5511978348438?text=Ol%C3%A1%2C%20gostaria%20de%20adquirir%20o%20Veg%20Oxi%20200%20em%20SP.'
                        ],
                        [
                            'title' => 'No sul de Minas',
                            'desc' => 'Quer seus vegetais prontos para o consumo, sem sulfitos e sempre fresquinhos em Minas Gerais? Conte com a nossa solução! 👉 Clique no botão abaixo e fale com a gente agora mesmo',
                            'link' => 'https://wa.me/5511978348438?text=Ol%C3%A1%2C%20gostaria%20de%20adquirir%20o%20Veg%20Oxi%20200%20no%20Sul%20de%20Minas.'
                        ],
                        [
                            'title' => 'Outras Localidades',
                            'desc' => 'Está em outra região desse nosso país continental? Não tem problema! Nossa equipe está pronta para atender clientes em todo o Brasil. 👉 Clique no botão e fale com a gente!',
                            'link' => 'https://wa.me/5511978348438?text=Ol%C3%A1%2C%20estou%20em%20outra%20regi%C3%A3o%20e%20gostaria%20de%20adquirir%20o%20Veg%20Oxi%20200.'
                        ],
                        [
                            'title' => 'Como Distribuir?',
                            'desc' => '🤝 É distribuidor e se interessou pelo antioxidante Veg Oxi 200? Clique no botão abaixo e fale diretamente com nossa equipe para saber todos os detalhes!',
                            'link' => 'https://wa.me/5511978348438?text=Ol%C3%A1%2C%20tenho%20interesse%20em%20me%20tornar%20distribuidor%20do%20Veg%20Oxi%20200.'
                        ]
                    ],
                    'promo_title' => 'Compre o Veg Oxi 200 e ganhe uma consultoria técnica de 30 minutos para otimizar seu processo e estender o shelf-life dos vegetais frescos.',
                    'promo_cta_text' => 'GARANTIR VEG OXI + CONSULTORIA',
                    'promo_cta_link' => 'https://wa.me/5511978348438?text=Ol%C3%A1%2C%20quero%20adquirir%20o%20Veg%20Oxi%20200%20e%20garantir%20minha%20consultoria%20t%C3%A9cnica%20de%2030%20minutos.'
                ]
            ]
        );

        // Product Highlight Section (Biotecnologia Propaganda)
        $vegOxi->sections()->updateOrCreate(
            ['key' => 'product_highlight'],
            [
                'content' => [
                    'badge' => 'Biotecnologia',
                    'title' => 'Veg Oxi 200 - Coadjuvante de tecnologia',
                    'subtitle' => 'Um Investimento que Vale a Pena!',
                    'cost_with' => '30',
                    'cost_with_unit' => 'Cents',
                    'cost_with_desc' => 'Por Vegetal Fresco',
                    'cost_with_tag' => 'Livre de Sulfitos (Seguro)',
                    'cost_without' => '80',
                    'cost_without_unit' => 'Cents',
                    'cost_without_desc' => 'Por Vegetal Oxidado',
                    'cost_without_tag' => 'Com Metabissulfito (Tóxico)',
                    'cta_text' => 'Adquirir Veg Oxi 200',
                    'cta_link' => '#veg_oxi_contacts',
                ]
            ]
        );

        // Insights Page (NEW)
        $insights = \App\Models\Page::updateOrCreate(
            ['slug' => 'insights'],
            [
                'title' => 'Insights VegQuality | Conhecimento Técnico para FLV',
                'meta_description' => 'Fique por dentro das melhores práticas e metodologias da VegQuality em Processos, Equipamentos, Cadeia de Frio e Embalagens.',
            ]
        );

        $insights->sections()->updateOrCreate(
            ['key' => 'insights_hero'],
            [
                'content' => [
                    'title' => 'Insights VegQuality',
                    'subtitle' => 'Conhecimento, vivência e experiência em todas as etapas da cadeia produtiva de vegetais frescos processados.'
                ]
            ]
        );

        $insights->sections()->updateOrCreate(
            ['key' => 'insights_cards'],
            [
                'content' => [
                    'badge' => 'Insights',
                    'title' => 'Como a VegQuality Pode Apoiar seu Negócio',
                    'cards' => [
                        [
                            'title' => 'Consultoria',
                            'icon' => 'leaf',
                            'description' => 'Consultoria Especializada do Campo à Gôndola Combinamos bagagem técnica e vivência prática na agroindústria de FLV para transformar a eficiência do seu negócio. Ajudamos sua empresa a implementar as melhores tecnologias de processamento, sistemas de higienização e gestão da cadeia de frio. O resultado? Máxima extensão de shelf life, conformidade regulatória rigorosa, segurança dos alimentos e uma redução drástica nas perdas e desperdícios.'
                        ],
                        [
                            'title' => 'Plano de Negócios',
                            'icon' => 'briefcase',
                            'description' => 'Transforme sua ideia em uma Agroindústria de FLV Lucrativa e Segura Tirar um projeto de processamento mínimo do papel exige precisão técnica e financeira. Nosso suporte especializado apoia empreendedores em todas as etapas de estruturação e expansão de negócios de FLV. Entregamos um estudo de viabilidade técnica e econômica de ponta a ponta: do dimensionamento do chão de fábrica e seleção de maquinário até a análise de mercado, custos operacionais e projeções de faturamento. Proporcionamos a visão clara e a segurança estratégica que o seu investimento precisa para prosperar.'
                        ],
                        [
                            'title' => 'Treinamento',
                            'icon' => 'graduation-cap',
                            'description' => 'Oferecemos treinamentos práticos e personalizados, desenvolvidos de acordo com a realidade operacional de cada agroindústria. A capacitação é baseada nos processos, equipamentos e tecnologias efetivamente utilizados pela empresa, abordando etapas de processamento, técnicas de corte, centrifugação e embalagem, boas práticas de armazenamento e transporte, higiene e segurança dos alimentos.'
                        ],
                        [
                            'title' => 'Veg Oxi 200',
                            'icon' => 'shield-check',
                            'description' => 'O Veg Oxi 200 é uma tecnologia inovadora que retarda a oxidação de saladas, legumes, couve-manteiga e outras hortaliças e vegetais frescos processados. Ao evitar o escurecimento precoce, ele preserva a cor viva, o frescor e a qualidade original dos alimentos. O resultado é um produto visualmente muito mais atraente para o consumidor, com maior tempo de prateleira (shelf life) e redução significativa do desperdício na cadeia produtiva.'
                        ]
                    ]
                ]
            ]
        );

        $insights->sections()->updateOrCreate(
            ['key' => 'insights_why_choose'],
            [
                'content' => [
                    'badge' => 'Diferencial',
                    'title' => 'Por que nos Escolher?',
                    'description' => 'Conhecimento, vivência e experiência em todas as etapas da cadeia produtiva de vegetais frescos processados.'
                ]
            ]
        );

        // 5. Page: Contato
        $contatoPage = \App\Models\Page::updateOrCreate(
            ['slug' => 'contato'],
            [
                'title' => 'Fale Conosco | VegQuality - Consultoria para Agroindústria',
                'meta_description' => 'Entre em contato com a VegQuality. Tire suas dúvidas, solicite orçamentos para consultoria, implementação do Veg Oxi 200 ou treinamentos.',
            ]
        );

        $contatoPage->sections()->updateOrCreate(
            ['key' => 'contato_hero'],
            [
                'content' => [
                    'title' => 'Fale Conosco',
                    'subtitle' => 'Tire suas dúvidas ou envie uma solicitação para nossa equipe. Estamos prontos para ajudar sua agroindústria.',
                ]
            ]
        );

        $contatoPage->sections()->updateOrCreate(
            ['key' => 'contato_info'],
            [
                'content' => [
                    'title' => 'Nossos Canais',
                    'description' => 'Escolha o canal de sua preferência para falar conosco ou envie uma mensagem no formulário ao lado.',
                    'phone' => '+55 11 5194-0325',
                    'phone_hours' => 'Atendimento de Seg. a Sex. das 8h às 18h',
                    'whatsapp' => '+55 11 97834-8438',
                    'whatsapp_desc' => 'Fale diretamente com nossa equipe',
                    'email' => 'vegquality@vegquality.com.br',
                    'email_desc' => 'Nós respondemos em até um dia útil',
                ]
            ]
        );

        $contatoPage->sections()->updateOrCreate(
            ['key' => 'contato_form'],
            [
                'content' => [
                    'title' => 'Envie uma Mensagem',
                    'submit_text' => 'Enviar Mensagem',
                    'success_title' => 'Mensagem Enviada!',
                    'success_message' => 'Obrigado pelo seu contato. Nossa equipe técnica analisará sua mensagem e entrará em contato em breve.',
                ]
            ]
        );
    }
}
