<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use App\Models\Section;
use App\Models\Article;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Seed / Merge EN translations into Section JSON content
        $sections = Section::all();
        
        $translations = [
            'hero' => [
                'slides' => [
                    [
                        'image' => 'assets/hero/farmer-with-crate-of-ripe-vegetables-2025-02-18-13-20-58-utc-scaled.jpg',
                        'title' => 'Soluções para a agroindústria de vegetais frescos processados.',
                        'title_en' => 'Solutions for the processed fresh produce agro-industry.',
                        'subtitle' => 'Soluções tecnológicas e biotecnologia de ponta para extensão de shelf-life e segurança dos alimentos na sua produção.',
                        'subtitle_en' => 'Cutting-edge technological and biotechnology solutions for shelf-life extension and food safety in your production.',
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
                    ]
                ]
            ],
            'about' => [
                'badge' => 'VegQuality',
                'badge_en' => 'VegQuality',
                'title' => 'Liderança e Ciência em Soluções para FLV Processados',
                'title_en' => 'Leadership and Science in Fresh Produce Solutions',
                'highlight_text' => 'Transformamos a cadeia de vegetais frescos com inovação biotecnológica e consultoria especializada.',
                'highlight_text_en' => 'We transform the fresh produce chain with biotechnological innovation and expert consulting.',
                'desc1' => 'Fundada pela Dra. Roseane Bob, a VegQuality oferece soluções integradas para maximizar o shelf-life e a segurança dos alimentos.',
                'desc1_en' => 'Founded by Dr. Roseane Bob, VegQuality provides integrated solutions to maximize shelf life and food safety.',
                'desc2' => 'Atuamos diretamente na linha de produção, eliminando sulfitos e implementando padronização de processos.',
                'desc2_en' => 'We operate directly on the production line, eliminating sulfites and implementing process standardization.',
                'feature1_title' => 'Biotecnologia Limpa',
                'feature1_title_en' => 'Clean Biotechnology',
                'feature1_desc' => 'Veg Oxi 200: a alternativa 100% natural ao metabissulfito de sódio.',
                'feature1_desc_en' => 'Veg Oxi 200: the 100% natural alternative to sodium metabisulfite.',
                'feature2_title' => 'Consultoria 360°',
                'feature2_title_en' => '360° Consulting',
                'feature2_desc' => 'Do diagnóstico de campo à adequação regulatória e treinamento técnico de equipes.',
                'feature2_desc_en' => 'From field diagnostics to regulatory compliance and technical team training.',
            ],
            'home_offering' => [
                'badge' => 'O Que Oferecemos',
                'badge_en' => 'What We Offer',
                'title' => 'Soluções Completas para a Sua Agroindústria',
                'title_en' => 'Complete Solutions for Your Agro-Industry',
                'subtitle' => 'Combinamos consultoria científica, treinamentos operacionais e biotecnologia inovadora.',
                'subtitle_en' => 'We combine scientific consulting, operational training, and innovative biotechnology.',
                'card1_title' => 'Consultoria Técnica',
                'card1_title_en' => 'Technical Consulting',
                'card1_desc' => 'Diagnóstico operacional, otimização de maquinários e extensão de shelf-life do campo à gôndola.',
                'card1_desc_en' => 'Operational diagnostics, machinery optimization, and shelf-life extension from field to shelf.',
                'card2_title' => 'Biotecnologia Veg Oxi 200',
                'card2_title_en' => 'Veg Oxi 200 Biotechnology',
                'card2_desc' => 'Coadjuvante de tecnologia natural, livre de sulfitos, que preserva cor, frescor e nutrientes.',
                'card2_desc_en' => 'Natural processing aid, sulfite-free, preserving color, freshness, and nutrients.',
                'card3_title' => 'Treinamentos de Equipe',
                'card3_title_en' => 'Team Training',
                'card3_desc' => 'Capacitação prática no chão de fábrica em Boas Práticas de Fabricação (BPF) e manipulação técnica.',
                'card3_desc_en' => 'Hands-on factory floor training in Good Manufacturing Practices (GMP) and technical handling.',
                'card4_title' => 'Planos de Negócios',
                'card4_title_en' => 'Business Plans',
                'card4_desc' => 'Estudos de viabilidade técnica e financeira para estruturação e expansão de agroindústrias de FLV.',
                'card4_desc_en' => 'Technical and financial feasibility studies for structuring and expanding fresh produce plants.',
            ],
            'home_insights' => [
                'badge' => 'Insights VegQuality',
                'badge_en' => 'VegQuality Insights',
                'title' => 'Conhecimento que Transforma o Negócio',
                'title_en' => 'Knowledge that Transforms Business',
                'description' => 'Nossos insights e metodologias para apoiar sua agroindústria em todas as etapas da cadeia produtiva.',
                'description_en' => 'Our insights and methodologies to support your agro-industry at every stage of the production chain.',
                'cards' => [
                    [
                        'title' => 'Processos',
                        'title_en' => 'Processes',
                        'icon' => 'settings',
                        'description' => 'Padronização higiênico-sanitária operacional e processos industriais otimizados para zero desperdício.',
                        'description_en' => 'Hygienic-sanitary operational standardization and industrial processes optimized for zero waste.'
                    ],
                    [
                        'title' => 'Equipamentos',
                        'title_en' => 'Equipment',
                        'icon' => 'cpu',
                        'description' => 'Dimensionamento de maquinários ideais e escolha de tecnologias corretas para sua linha de processamento.',
                        'description_en' => 'Sizing of ideal machinery and selection of correct technologies for your processing line.'
                    ],
                    [
                        'title' => 'Cadeia de Frio',
                        'title_en' => 'Cold Chain',
                        'icon' => 'thermometer',
                        'description' => 'Monitoramento térmico rigoroso do campo ao ponto de venda, garantindo frescor e conformidade de gôndola.',
                        'description_en' => 'Strict thermal monitoring from field to point of sale, ensuring freshness and shelf compliance.'
                    ],
                    [
                        'title' => 'Embalagens',
                        'title_en' => 'Packaging',
                        'icon' => 'box',
                        'description' => 'Seleção de filmes técnicos de atmosfera modificada passiva (MAP) adequados para cada hortaliça.',
                        'description_en' => 'Selection of technical passive modified atmosphere (MAP) films suitable for each vegetable.'
                    ]
                ]
            ],
            'home_why_choose' => [
                'badge' => 'Diferencial',
                'badge_en' => 'Our Edge',
                'title' => 'Por que nos Escolher?',
                'title_en' => 'Why Choose Us?',
                'description' => 'Conhecimento, vivência e experiência em todas as etapas da cadeia produtiva de vegetais frescos processados.',
                'description_en' => 'Knowledge, practical background, and experience across all stages of the processed fresh produce chain.'
            ],
            'home_contact_cta' => [
                'badge' => 'Fale Conosco',
                'badge_en' => 'Contact Us',
                'title' => 'Pronto para transformar a sua produção de hortaliças?',
                'title_en' => 'Ready to transform your vegetable production?',
                'subtitle' => 'Entre em contato conosco hoje mesmo e fale diretamente com um especialista técnico da VegQuality.',
                'subtitle_en' => 'Get in touch with us today and speak directly with a VegQuality technical specialist.',
            ],
            'empresa_hero' => [
                'title' => 'Consultoria e Soluções para a Agroindústria',
                'title_en' => 'Consulting and Solutions for Agro-Industry',
                'subtitle' => 'Ciência e tecnologia aliadas para garantir alimentos mais seguros, saudáveis e lucrativos.',
                'subtitle_en' => 'Science and technology united to ensure safer, healthier, and more profitable food.',
            ],
            'empresa_sulfito' => [
                'badge' => 'VegQuality',
                'badge_en' => 'VegQuality',
                'title' => '100% Livre de sulfitos',
                'title_en' => '100% Sulfite-Free',
                'description' => 'Você sabia que o metabissulfito de sódio (dióxido de enxofre) é amplamente usado como conservante nos vegetais frescos processados? 🌱 Com o <strong>Veg Oxi 200</strong>, isso fica definitivamente no passado!',
                'description_en' => 'Did you know that sodium metabisulfite is widely used as a preservative in fresh processed produce? 🌱 With <strong>Veg Oxi 200</strong>, that is a thing of the past!',
                'check1' => 'Livre de dióxido de enxofre.',
                'check1_en' => 'Sulfur dioxide free.',
                'check2' => 'Preserva alimentos de forma natural.',
                'check2_en' => 'Preserves food naturally.',
                'check3' => 'Respeita a saúde do consumidor e do operador.',
                'check3_en' => 'Respects consumer and operator health.',
            ],
            'empresa_frescor' => [
                'badge' => 'VegQuality',
                'badge_en' => 'VegQuality',
                'title' => 'Consultoria 360°',
                'title_en' => '360° Consulting',
                'highlight_text' => 'Transforme sua linha de vegetais frescos prontos para o consumo!',
                'highlight_text_en' => 'Transform your line of fresh, ready-to-eat produce!',
                'description' => 'Na Veg Quality, oferecemos soluções personalizadas e consultoria especializada para impulsionar a eficiência técnica e a segurança operacional da sua planta de processamento.',
                'description_en' => 'At VegQuality, we offer customized solutions and expert consulting to boost the technical efficiency and operational safety of your processing plant.',
                'feature1_title' => 'Aumentar a durabilidade',
                'feature1_title_en' => 'Extend Shelf Life',
                'feature1_desc' => 'Amplie consideravelmente o shelf-life e mantenha o frescor natural dos produtos por mais tempo.',
                'feature1_desc_en' => 'Significantly extend shelf life and maintain natural product freshness for longer.',
                'feature2_title' => 'Reduzir custos e perdas',
                'feature2_title_en' => 'Reduce Costs & Losses',
                'feature2_desc' => 'Minimize desperdícios na produção por meio de processos padronizados e tecnologia de ponta.',
                'feature2_desc_en' => 'Minimize production waste through standardized processes and cutting-edge technology.',
                'feature3_title' => 'Elevar os padrões',
                'feature3_title_en' => 'Raise Standards',
                'feature3_desc' => 'Garanta conformidade estrita com normas sanitárias e entregue máxima qualidade ao mercado.',
                'feature3_desc_en' => 'Ensure strict compliance with sanitary standards and deliver top quality to the market.',
            ],
            'empresa_quem_somos' => [
                'badge' => 'Liderança e Ciência',
                'badge_en' => 'Leadership & Science',
                'title' => 'História da VegQuality<br><span style="color: var(--color-veg-primary);">Consultoria que gera resultados!</span>',
                'title_en' => 'VegQuality Story<br><span style="color: var(--color-veg-primary);">Consulting that delivers results!</span>',
                'description1' => 'A VegQuality é mais que uma consultoria: é uma parceira estratégica para empresas que atuam na agroindústria de vegetais frescos, do campo aos pontos de distribuição.',
                'description1_en' => 'VegQuality is more than a consultancy: it is a strategic partner for companies in the fresh produce agro-industry, from the field to distribution points.',
                'description2' => 'Combinando ciência, inovação, experiência prática e propósito, entregamos soluções personalizadas que fortalecem a qualidade, a segurança, a sustentabilidade e a rentabilidade da agroindústria de vegetais frescos higienizados.',
                'description2_en' => 'Combining science, innovation, practical experience, and purpose, we deliver tailored solutions that strengthen quality, safety, sustainability, and profitability in the fresh produce industry.',
                'card1_label' => 'Expertise',
                'card1_label_en' => 'Expertise',
                'card2_label' => 'Experiência',
                'card2_label_en' => 'Experience',
                'card3_label' => 'Resultados',
                'card3_label_en' => 'Results',
            ],
            'servicos_hero' => [
                'title' => 'Serviços Oferecidos',
                'title_en' => 'Services Offered',
                'subtitle' => 'Soluções estratégicas e operacionais de ponta para elevar a rentabilidade e o padrão de qualidade na agroindústria.',
                'subtitle_en' => 'Cutting-edge strategic and operational solutions to boost profitability and quality standards in agro-industry.',
            ],
            'servicos_catalog' => [
                'badge' => 'Nossos Serviços - Soluções',
                'badge_en' => 'Our Services & Solutions',
                'title' => 'Consultoria 360° para a Agroindústria de FLV: Do Campo à Gôndola',
                'title_en' => '360° Consulting for Fresh Produce: From Field to Shelf',
                'service1_badge' => 'Consultoria',
                'service1_badge_en' => 'Consulting',
                'service1_title' => 'Consultoria',
                'service1_title_en' => 'Consulting',
                'service1_desc' => 'Sua produção agroindustrial mais eficiente, segura e lucrativa. Nossa consultoria técnica acompanha o seu produto do campo à gôndola.',
                'service1_desc_en' => 'Make your agro-industrial production more efficient, safe, and profitable. Our technical consulting accompanies your product from field to shelf.',
                'service2_badge' => 'Treinamentos',
                'service2_badge_en' => 'Training',
                'service2_title' => 'Treinamentos',
                'service2_title_en' => 'Training',
                'service2_desc' => 'Capacitação Prática para Resultados Reais. Ter procedimentos, manuais e POPs bem elaborados é fundamental, mas o verdadeiro desafio é transformá-los em ações consistentes.',
                'service2_desc_en' => 'Practical Training for Real Results. Having well-crafted procedures, manuals, and SOPs is essential, but the real challenge is turning them into consistent daily actions.',
                'service3_badge' => 'Projetos',
                'service3_badge_en' => 'Projects',
                'service3_title' => 'Plano de Negócios',
                'service3_title_en' => 'Business Plan',
                'service3_desc' => 'Agroindústria de FLV Processado: O mercado que mais cresce, mas que não aceita amadorismo.',
                'service3_desc_en' => 'Processed Fresh Produce Agro-Industry: The fastest growing market that demands professionalism.',
            ],
            'veg_oxi_hero' => [
                'title' => 'Veg Oxi 200',
                'title_en' => 'Veg Oxi 200',
                'subtitle' => 'Tecnologia inovadora para conservação, shelf-life estendido e eliminação total do metabissulfito de sódio.',
                'subtitle_en' => 'Innovative technology for preservation, extended shelf life, and complete elimination of sodium metabisulfite.',
            ],
            'veg_oxi_facts' => [
                'badge' => 'Por Trás do Produto',
                'badge_en' => 'Behind the Product',
                'title' => 'Fatos sobre o Veg Oxi 200',
                'title_en' => 'Facts about Veg Oxi 200',
            ],
            'insights_hero' => [
                'title' => 'Insights VegQuality',
                'title_en' => 'VegQuality Insights',
                'subtitle' => 'Conhecimento, vivência e experiência em todas as etapas da cadeia produtiva de vegetais frescos processados.',
                'subtitle_en' => 'Knowledge, practical background, and experience across all stages of the processed fresh produce chain.',
            ],
            'insights_cards' => [
                'badge' => 'Insights',
                'badge_en' => 'Insights',
                'title' => 'Como a VegQuality Pode Apoiar seu Negócio',
                'title_en' => 'How VegQuality Can Support Your Business',
            ],
            'contato_hero' => [
                'title' => 'Fale Conosco',
                'title_en' => 'Contact Us',
                'subtitle' => 'Tire suas dúvidas ou envie uma solicitação para nossa equipe. Estamos prontos para ajudar sua agroindústria.',
                'subtitle_en' => 'Have questions or need assistance? Our team is ready to support your agro-industry.',
            ],
            'contato_info' => [
                'title' => 'Nossos Canais',
                'title_en' => 'Our Channels',
                'description' => 'Escolha o canal de sua preferência para falar conosco ou envie uma mensagem no formulário ao lado.',
                'description_en' => 'Choose your preferred channel to contact us or send a message using the form.',
                'phone_hours' => 'Atendimento de Seg. a Sex. das 8h às 18h',
                'phone_hours_en' => 'Mon to Fri, 8am to 6pm (BRT)',
                'whatsapp_desc' => 'Fale diretamente com nossa equipe',
                'whatsapp_desc_en' => 'Speak directly with our technical team',
                'email_desc' => 'Nós respondemos em até um dia útil',
                'email_desc_en' => 'We reply within 1 business day',
            ],
            'contato_form' => [
                'title' => 'Envie uma Mensagem',
                'title_en' => 'Send Us a Message',
                'submit_text' => 'Enviar Mensagem',
                'submit_text_en' => 'Send Message',
                'success_title' => 'Mensagem Enviada!',
                'success_title_en' => 'Message Sent!',
                'success_message' => 'Obrigado pelo seu contato. Nossa equipe técnica analisará sua mensagem e entrará em contato em breve.',
                'success_message_en' => 'Thank you for getting in touch. Our technical team will analyze your message and respond shortly.',
            ],
        ];

        foreach ($sections as $section) {
            $key = $section->key;
            if (isset($translations[$key])) {
                $content = $section->content ?? [];
                $defaults = $translations[$key];
                
                // Recursively merge default _en keys if missing
                $mergedContent = array_merge($defaults, $content);
                $section->content = $mergedContent;
                $section->save();
            }
        }

        // 2. Populate English fields for Articles (Radar FLV)
        $articleTranslations = [
            'falhas-de-processo-ou-insumo-inadequado' => [
                'title_en' => 'Process Failures vs. Inadequate Inputs: Where to Focus for Consistent Results',
                'excerpt_en' => 'Inputs cannot fix process flaws or training gaps. Learn how operational standardization and team training drive real quality in fresh produce processing.',
                'content_en' => '<h3>Inputs do not fix process flaws or training gaps</h3><p>No matter how effective an input is, it cannot compensate for weaknesses in the operational process. Consistent results depend primarily on well-defined, standardized steps, correct dilutions, water within proper parameters, sufficient contact time, and clear records of any operational changes.</p><p>Above all, results depend on trained teams who understand not only "how to do it", but why each step matters. When results vary, the most efficient approach is always to evaluate the process and team training before revising the input used.</p><h3>Clear process + prepared team = consistent results</h3><p>To ensure input efficiency, it is essential to map each process step precisely, standardize operating procedures, ensure the team understands each input\'s role, and invest in continuous training.</p>',
            ],
            'colheita-de-grandes-resultados' => [
                'title_en' => 'Harvesting Great Results: Consulting and Innovation in Fresh Produce',
                'excerpt_en' => 'This year, we expanded and strengthened our technical consulting programs and customized solutions, driving real results for our clients across the produce supply chain.',
                'content_en' => '<p>This year, we expanded and strengthened our technical consulting programs and customized solutions, driving real results for our clients.</p><p>Our solutions have generated concrete outcomes for companies of all sizes, including significant operational efficiency gains, reduced losses across the chain, and modern quality controls.</p><h3>Veg Oxi 200: Expansion & Performance</h3><p>In 2025, Veg Oxi 200 stood out as the preferred antioxidant solution for the fresh produce industry, delaying oxidation and extending shelf life without sulfites.</p>',
            ],
            'os-desafios-da-agroindustria-de-flv-processados-no-brasil' => [
                'title_en' => 'The Challenges of the Processed Fresh Produce Industry in Brazil',
                'excerpt_en' => 'Working with fresh, washed produce is a daily commitment to nature, food, and science. Explore the market findings and structural challenges facing FLV processing.',
                'content_en' => '<p>Working with fresh, washed produce is more than a profession: it is a daily commitment to nature, food, and science.</p><p>In over 20 years in the fresh produce supply chain, I have witnessed the maturation of a sector that is growing rapidly with immense potential.</p><h3>Field to Factory</h3><p>Quality preservation begins long before processing. In the field, growers manage pests, weather, and climate variations that require technical control and sustainable management.</p>',
            ]
        ];

        foreach ($articleTranslations as $slug => $data) {
            Article::where('slug', $slug)->update($data);
        }

        // For any remaining articles without English titles, copy PT title as fallback
        Article::whereNull('title_en')->orWhere('title_en', '')->get()->each(function ($art) {
            $art->update([
                'title_en' => $art->title,
                'excerpt_en' => $art->excerpt,
                'content_en' => $art->content,
            ]);
        });
    }

    public function down(): void
    {
        // No destructive rollback needed
    }
};
