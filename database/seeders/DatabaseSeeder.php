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
                            'subtitle' => 'Soluções tecnológicas e biotecnologia de ponta para extensão de shelf-life e segurança dos alimentos na sua produção. Substitua aditivos químicos de forma segura.',
                            'btn1_text' => 'Serviços',
                            'btn1_link' => '/servicos',
                            'btn2_text' => 'Veg Oxi',
                            'btn2_link' => '/veg-oxi',
                            'badge1_text' => '+20 anos de experiência.',
                            'badge2_text' => 'Segurança Alimentar',
                            'badge2_link' => '#home_contact_cta',
                        ],
                        [
                            'image' => 'assets/hero/Home-Veg-scaled.jpg',
                            'title' => 'Consultoria técnica especializada para vegetais frescos.',
                            'subtitle' => 'Diagnóstico operacional, padronização e extensão natural de gôndola. Reduza desperdícios e aumente seus lucros de forma sustentável.',
                            'btn1_text' => 'A Empresa',
                            'btn1_link' => '/empresa',
                            'btn2_text' => '',
                            'btn2_link' => '',
                            'badge1_text' => 'Consultoria Focada em Resultados',
                            'badge2_text' => 'Livre de Sulfitos',
                            'badge2_link' => '/veg-oxi',
                        ],
                        [
                            'image' => 'assets/hero/colhendo-alface.jpg',
                            'title' => 'Tecnologia para conservação e qualidade de vegetais frescos.',
                            'subtitle' => 'Conheça o Veg Oxi 200: antioxidante natural que preserva a cor, sabor e textura originais sem deixar gosto residual.',
                            'btn1_text' => 'Veg Oxi 200',
                            'btn1_link' => '/veg-oxi',
                            'btn2_text' => '',
                            'btn2_link' => '',
                            'badge1_text' => '1¢ Custo por Hortaliça',
                            'badge2_text' => 'Alta Durabilidade',
                            'badge2_link' => '/veg-oxi',
                        ]
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

        // Seeding some dummy blog posts (articles)
        \App\Models\Article::updateOrCreate(
            ['slug' => 'sp-endurece-inspecao-de-vegetais'],
            [
                'title' => 'SP endurece inspeção de vegetais processados',
                'excerpt' => 'No último dia 10 de março de 2026, foi publicado o Decreto nº 70.447, que regulamenta a Lei nº 18.154/2025...',
                'content' => '<p>No último dia 10 de março de 2026, foi publicado o Decreto nº 70.447, que regulamenta a Lei nº 18.154/2025, endurecendo as regras sanitárias no estado de São Paulo...</p>',
                'published_at' => now(),
                'status' => 'published',
            ]
        );

        \App\Models\Article::updateOrCreate(
            ['slug' => 'quem-planeja-escala-lucra'],
            [
                'title' => 'Quem Planeja Escala, Lucra. Quem Improvisa, Perde.',
                'excerpt' => 'Evite prejuízos na cadeia de hortifrúti. Estruturar processos operacionais de higienização de FLV com clareza...',
                'content' => '<p>Evite prejuízos na cadeia de hortifrúti. Estruturar processos operacionais de higienização de FLV com clareza...</p>',
                'published_at' => now(),
                'status' => 'published',
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

        $empresa->sections()->updateOrCreate(
            ['key' => 'empresa_stats'],
            [
                'content' => [
                    'stat_number' => '25 M',
                    'stat_text' => 'de Toneladas Salvas do Desperdício',
                ]
            ]
        );

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
                    'title' => 'Mantendo o frescor da colheita',
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
                    'title' => 'VegQuality<br><span style="color: var(--color-veg-primary);">Consultoria que gera resultados!</span>',
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
                    'badge' => 'Nossos Serviços',
                    'title' => 'Soluções Completas & Especializadas',
                    'service1_badge' => 'Projetos',
                    'service1_title' => 'Plano de Negócios',
                    'service1_desc' => 'Auxiliamos empreendedores que desejam iniciar, estruturar, ampliar ou profissionalizar operações na produção de vegetais frescos processados.',
                    'service1_link' => 'https://wa.me/5511978348438?text=Ol%C3%A1%2C%20gostaria%20de%20saber%20mais%20sobre%20a%20consultoria%20em%20Plano%20de%20Neg%C3%B3cios.',
                    'service2_badge' => 'Treinamentos',
                    'service2_title' => 'Treinamentos Direcionados',
                    'service2_desc' => 'Treinamentos práticos e teóricos para auxiliar sua equipe na execução dos processos de produção de vegetais frescos processados, do campo à gôndola.',
                    'service2_link' => 'https://wa.me/5511978348438?text=Ol%C3%A1%2C%20gostaria%20de%20saber%20mais%20sobre%20os%20Treinamentos%20Direcionados.',
                    'service3_badge' => 'Tecnologia de Ponta',
                    'service3_title' => 'Veg Oxi 200',
                    'service3_desc' => 'O Veg Oxi 200 contribui para o aumento do shelf-life de FLV pós-colheita e vegetais frescos processados, contribuindo para a substituição definitiva do metabissulfito de sódio e demais sulfitos químicos que prejudicam a saúde.',
                    'service3_link' => 'https://wa.me/5511978348438?text=Ol%C3%A1%2C%20gostaria%20de%20saber%20mais%20sobre%20o%20Veg%20Oxi%20200.',
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
                    'title' => 'Áreas de Atuação Técnica',
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
    }
}
