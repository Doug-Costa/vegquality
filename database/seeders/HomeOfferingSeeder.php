<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;
use RuntimeException;

class HomeOfferingSeeder extends Seeder
{
    /** Create the editable Home offering section without overwriting admin content. */
    public function run(): void
    {
        $home = Page::query()->where('slug', 'home')->first();

        if (! $home) {
            throw new RuntimeException('A pagina home nao foi encontrada; home_offering nao foi criada.');
        }

        $home->sections()->firstOrCreate(
            ['key' => 'home_offering'],
            ['content' => [
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
                ],
            ]],
        );
    }
}
