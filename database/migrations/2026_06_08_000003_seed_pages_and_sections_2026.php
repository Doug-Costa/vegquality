<?php

use Illuminate\Database\Migrations\Migration;
use App\Models\Page;
use App\Models\Section;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Page: Empresa
        $empresa = Page::updateOrCreate(
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
        $servicos = Page::updateOrCreate(
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
                    'conversar_title' => "Ainda tem dúvidas sobre a adequação da sua planta ou quer aplicar a tecnologia Veg Oxi 200 no seu negócio?\n<span style=\"color: var(--color-veg-primary);\">VAMOS CONVERSAR!</span>",
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
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Deletar as páginas e seções
        $empresa = Page::where('slug', 'empresa')->first();
        if ($empresa) {
            $empresa->sections()->delete();
            $empresa->delete();
        }

        $servicos = Page::where('slug', 'servicos')->first();
        if ($servicos) {
            $servicos->sections()->delete();
            $servicos->delete();
        }
    }
};
