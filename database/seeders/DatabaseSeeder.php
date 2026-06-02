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

        // Hero Section
        $home->sections()->updateOrCreate(
            ['key' => 'hero'],
            [
                'content' => [
                    'badge' => 'Biotecnologia & Agroindústria',
                    'title' => 'Consultoria que gera resultados na agroindústria de vegetais frescos',
                    'subtitle' => 'Soluções tecnológicas e biotecnologia de ponta para extensão de shelf-life e segurança dos alimentos na sua produção. Substitua aditivos químicos de forma segura.',
                    'cta_text' => 'Quero Saber Mais',
                    'cta_link' => 'https://wa.me/551151940325?text=Ol%C3%A1%2C%20gostaria%20de%20saber%20mais%20sobre%20as%20solu%C3%A7%C3%B5es%20da%20VegQuality.',
                    'stat1_title' => '100% Seguro',
                    'stat1_desc' => 'Rigores sanitários atendidos',
                    'stat2_title' => 'Biotecnologia Pura',
                    'stat2_desc' => 'Alta durabilidade natural',
                ]
            ]
        );

        // Product Highlight Section
        $home->sections()->updateOrCreate(
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
                    'cta_text' => 'Falar com Especialista',
                    'cta_link' => 'https://wa.me/5511999999999?text=Ol%C3%A1%2C%20gostaria%20de%20saber%20mais%20sobre%20o%20Veg%20Oxi%20200%20para%20minha%20produ%C3%A7%C3%A3o.',
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
    }
}
