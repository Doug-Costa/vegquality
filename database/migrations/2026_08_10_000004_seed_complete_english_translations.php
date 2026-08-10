<?php

use Illuminate\Database\Migrations\Migration;
use App\Models\Section;
use App\Models\Article;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Comprehensive Section Translations
        $sections = Section::all();

        foreach ($sections as $section) {
            $key = $section->key;
            $content = $section->content ?? [];

            switch ($key) {
                case 'hero':
                    if (isset($content['slides']) && is_array($content['slides'])) {
                        foreach ($content['slides'] as $i => &$slide) {
                            $slide['title_en'] = $slide['title_en'] ?? 'Solutions for the processed fresh produce agro-industry.';
                            $slide['subtitle_en'] = $slide['subtitle_en'] ?? 'Cutting-edge technological and biotechnology solutions for shelf-life extension and food safety in your production.';
                            $slide['btn1_text_en'] = $slide['btn1_text_en'] ?? 'Services';
                            $slide['btn2_text_en'] = $slide['btn2_text_en'] ?? 'Veg Oxi 200';
                            $slide['badge1_text_en'] = $slide['badge1_text_en'] ?? '+20 years of experience.';
                            $slide['badge2_text_en'] = $slide['badge2_text_en'] ?? 'Food Safety';
                        }
                        unset($slide);
                    }
                    break;

                case 'about':
                    $content['badge_en'] = $content['badge_en'] ?? 'Behind VegQuality';
                    $content['title_en'] = $content['title_en'] ?? 'Passion that Delivers Results!';
                    $content['highlight_text_en'] = $content['highlight_text_en'] ?? 'How to turn science into an ally for the field and the consumer\'s table?';
                    $content['desc1_en'] = $content['desc1_en'] ?? 'That was the question that drove Dr. Roseane Bob\'s trajectory.';
                    $content['desc2_en'] = $content['desc2_en'] ?? 'As a nutritionist specializing in food safety and sustainability, Roseane always immersed herself in the routine of growers and agro-industries. In these experiences, the harsh reality of waste and post-harvest produce processing challenges in Brazil became glaringly evident, revealing a massive loss across the fresh produce chain.';
                    $content['desc3_en'] = $content['desc3_en'] ?? 'The answer to this challenge came on two complementary fronts:';
                    $content['desc4_en'] = $content['desc4_en'] ?? 'With this ecosystem of solutions, Dr. Roseane and her team of collaborators and partners unite the sustainable growth of agricultural businesses with the consumer\'s right to have fresher, longer-lasting, and safer produce at home.';
                    $content['feature1_title_en'] = $content['feature1_title_en'] ?? 'VegQuality';
                    $content['feature1_desc_en'] = $content['feature1_desc_en'] ?? 'Practical, highly specialized, and affordable consulting designed to bring efficiency and safety solutions from small to large producers.';
                    $content['feature2_title_en'] = $content['feature2_title_en'] ?? 'Veg Oxi 200';
                    $content['feature2_desc_en'] = $content['feature2_desc_en'] ?? 'An exclusive innovation worldwide. This processing aid drastically reduces losses of processed fresh produce ready for consumption and eliminates the need for harmful additives such as sulfites.';
                    $content['cta_text_en'] = $content['cta_text_en'] ?? 'Learn More';
                    break;

                case 'home_offering':
                    $content['badge_en'] = $content['badge_en'] ?? 'What We Offer';
                    $content['title_en'] = $content['title_en'] ?? 'Complete Solutions for Processed Produce Industry';
                    $content['description_en'] = $content['description_en'] ?? 'For over two decades, we have been a benchmark in consulting and solutions for the fresh produce supply chain (Fruits, Vegetables, and Greens).';
                    if (isset($content['cards']) && is_array($content['cards'])) {
                        $enCards = [
                            ['title_en' => 'Consulting', 'description_en' => 'Comprehensive operational diagnostics, natural shelf-life extension, and custom biotechnology application to eliminate losses in your washed produce production.', 'link_text_en' => 'Learn more'],
                            ['title_en' => 'Training', 'description_en' => 'Specialized team training in Good Manufacturing Practices (GMP), sanitary control, and technical handling, ensuring compliance with current standards.', 'link_text_en' => 'Learn more'],
                            ['title_en' => 'Business Plan', 'description_en' => 'Strategic commercial development, economic feasibility of processing plants, and B2B distribution channel structuring.', 'link_text_en' => 'Learn more'],
                            ['title_en' => 'Veg Oxi 200', 'description_en' => 'Technological replacement for sulfites and sodium metabisulfite. Safe organic antioxidant with excellent cost-benefit of just 1 cent per vegetable.', 'link_text_en' => 'Learn more'],
                        ];
                        foreach ($content['cards'] as $i => &$card) {
                            if (isset($enCards[$i])) {
                                $card['title_en'] = $card['title_en'] ?? $enCards[$i]['title_en'];
                                $card['description_en'] = $card['description_en'] ?? $enCards[$i]['description_en'];
                                $card['link_text_en'] = $card['link_text_en'] ?? $enCards[$i]['link_text_en'];
                            }
                        }
                        unset($card);
                    }
                    break;

                case 'home_why_choose':
                case 'insights_why_choose':
                    $content['badge_en'] = $content['badge_en'] ?? 'Our Edge';
                    $content['title_en'] = $content['title_en'] ?? 'Why Choose Us?';
                    $content['description_en'] = $content['description_en'] ?? 'Knowledge, practical background, and experience across all stages of the processed fresh produce chain.';
                    break;

                case 'home_insights':
                case 'insights_cards':
                    $content['badge_en'] = $content['badge_en'] ?? 'VegQuality Insights';
                    $content['title_en'] = $content['title_en'] ?? 'Knowledge that Transforms Business';
                    $content['description_en'] = $content['description_en'] ?? 'Our insights and methodologies to support your agro-industry at every stage of the production chain.';
                    if (isset($content['cards']) && is_array($content['cards'])) {
                        $enInsightCards = [
                            ['title_en' => 'Processes', 'description_en' => 'Hygienic-sanitary operational standardization and industrial processes optimized for zero waste.'],
                            ['title_en' => 'Equipment', 'description_en' => 'Sizing of ideal machinery and selection of correct technologies for your processing line.'],
                            ['title_en' => 'Cold Chain', 'description_en' => 'Strict thermal monitoring from field to point of sale, ensuring freshness and shelf compliance.'],
                            ['title_en' => 'Packaging', 'description_en' => 'Selection of technical passive modified atmosphere (MAP) films suitable for each vegetable.'],
                        ];
                        foreach ($content['cards'] as $i => &$card) {
                            if (isset($enInsightCards[$i])) {
                                $card['title_en'] = $card['title_en'] ?? $enInsightCards[$i]['title_en'];
                                $card['description_en'] = $card['description_en'] ?? $enInsightCards[$i]['description_en'];
                            }
                        }
                        unset($card);
                    }
                    break;

                case 'product_highlight':
                    $content['badge_en'] = $content['badge_en'] ?? 'Biotechnology';
                    $content['title_en'] = $content['title_en'] ?? 'Veg Oxi 200 - Processing Aid';
                    $content['subtitle_en'] = $content['subtitle_en'] ?? 'An Investment Worth Making!';
                    $content['cost_with_unit_en'] = $content['cost_with_unit_en'] ?? 'Cents';
                    $content['cost_with_desc_en'] = $content['cost_with_desc_en'] ?? 'Per Fresh Vegetable';
                    $content['cost_with_tag_en'] = $content['cost_with_tag_en'] ?? 'Sulfite-Free (Safe)';
                    $content['cost_without_unit_en'] = $content['cost_without_unit_en'] ?? 'Cents';
                    $content['cost_without_desc_en'] = $content['cost_without_desc_en'] ?? 'Per Oxidized Vegetable';
                    $content['cost_without_tag_en'] = $content['cost_without_tag_en'] ?? 'With Metabisulfite (Toxic)';
                    $content['cta_text_en'] = $content['cta_text_en'] ?? 'Acquire Veg Oxi 200';
                    break;

                case 'home_contact_cta':
                    $content['badge_en'] = $content['badge_en'] ?? 'Contact Us';
                    $content['title_en'] = $content['title_en'] ?? 'Ready to transform your production?';
                    $content['subtitle_en'] = $content['subtitle_en'] ?? 'Get in touch with us today and speak directly with a VegQuality technical specialist.';
                    $content['address_en'] = $content['address_en'] ?? 'São Paulo / SP - Brazil';
                    break;

                case 'empresa_hero':
                    $content['title_en'] = $content['title_en'] ?? 'Consulting & Solutions for Agro-Industry';
                    $content['subtitle_en'] = $content['subtitle_en'] ?? 'Science and technology united to ensure safer, healthier, and more profitable food.';
                    break;

                case 'empresa_stats':
                    $content['stat_text_en'] = $content['stat_text_en'] ?? 'of Tons Saved from Food Waste';
                    break;

                case 'empresa_sulfito':
                    $content['badge_en'] = $content['badge_en'] ?? 'VegQuality';
                    $content['title_en'] = $content['title_en'] ?? '100% Sulfite-Free';
                    $content['description_en'] = $content['description_en'] ?? 'Did you know that sodium metabisulfite is widely used as a preservative in fresh processed produce? 🌱 With <strong>Veg Oxi 200</strong>, that is a thing of the past!';
                    $content['check1_en'] = $content['check1_en'] ?? 'Free from sulfur dioxide.';
                    $content['check2_en'] = $content['check2_en'] ?? 'Preserves food naturally.';
                    $content['check3_en'] = $content['check3_en'] ?? 'Respects consumer and operator health.';
                    break;

                case 'empresa_frescor':
                    $content['badge_en'] = $content['badge_en'] ?? 'VegQuality';
                    $content['title_en'] = $content['title_en'] ?? '360° Consulting';
                    $content['highlight_text_en'] = $content['highlight_text_en'] ?? 'Transform your line of fresh, ready-to-eat produce!';
                    $content['description_en'] = $content['description_en'] ?? 'At VegQuality, we offer customized solutions and expert consulting to boost technical efficiency and operational safety in your processing plant.';
                    $content['feature1_title_en'] = $content['feature1_title_en'] ?? 'Extend Shelf Life';
                    $content['feature1_desc_en'] = $content['feature1_desc_en'] ?? 'Significantly extend product durability while maintaining natural freshness longer.';
                    $content['feature2_title_en'] = $content['feature2_title_en'] ?? 'Reduce Costs & Losses';
                    $content['feature2_desc_en'] = $content['feature2_desc_en'] ?? 'Minimize production waste through standardized processes and state-of-the-art technology.';
                    $content['feature3_title_en'] = $content['feature3_title_en'] ?? 'Elevate Standards';
                    $content['feature3_desc_en'] = $content['feature3_desc_en'] ?? 'Ensure strict compliance with sanitary standards and deliver top quality to the market.';
                    break;

                case 'empresa_quem_somos':
                    $content['badge_en'] = $content['badge_en'] ?? 'Leadership & Science';
                    $content['title_en'] = $content['title_en'] ?? 'VegQuality Story<br><span style="color: var(--color-veg-primary);">Consulting that delivers results!</span>';
                    $content['description1_en'] = $content['description1_en'] ?? 'VegQuality is more than a consultancy: it is a strategic partner for companies operating in the fresh produce agro-industry, from the field to distribution points.';
                    $content['description2_en'] = $content['description2_en'] ?? 'Combining science, innovation, practical experience, and purpose, we deliver customized solutions that strengthen quality, safety, sustainability, and profitability in sanitized fresh produce processing.';
                    $content['image_caption_en'] = $content['image_caption_en'] ?? 'Dr. Roseane Bob, founder and director of VegQuality';
                    $content['card1_label_en'] = $content['card1_label_en'] ?? 'Expertise';
                    $content['card2_label_en'] = $content['card2_label_en'] ?? 'Experience';
                    $content['card3_label_en'] = $content['card3_label_en'] ?? 'Results';
                    break;

                case 'servicos_hero':
                    $content['title_en'] = $content['title_en'] ?? 'Services Offered';
                    $content['subtitle_en'] = $content['subtitle_en'] ?? 'Cutting-edge strategic and operational solutions to elevate profitability and quality standards in agro-industry.';
                    break;

                case 'servicos_catalog':
                    $content['badge_en'] = $content['badge_en'] ?? 'Our Services';
                    $content['title_en'] = $content['title_en'] ?? '360° Consulting for Fresh Produce Agro-Industry: From Field to Shelf';
                    $content['service1_badge_en'] = $content['service1_badge_en'] ?? 'Consulting';
                    $content['service1_title_en'] = $content['service1_title_en'] ?? 'Consulting';
                    $content['service1_desc_en'] = $content['service1_desc_en'] ?? 'Make your agro-industrial production more efficient, safe, and profitable. Our technical consulting accompanies your product from field to shelf.';
                    $content['service2_badge_en'] = $content['service2_badge_en'] ?? 'Training';
                    $content['service2_title_en'] = $content['service2_title_en'] ?? 'Training';
                    $content['service2_desc_en'] = $content['service2_desc_en'] ?? 'Practical Training for Real Results. Having well-crafted procedures, manuals, and SOPs is essential, but the real challenge is turning them into consistent daily actions.';
                    $content['service3_badge_en'] = $content['service3_badge_en'] ?? 'Projects';
                    $content['service3_title_en'] = $content['service3_title_en'] ?? 'Business Plan';
                    $content['service3_desc_en'] = $content['service3_desc_en'] ?? 'Processed Fresh Produce Agro-Industry: The fastest growing market that demands professionalism.';
                    break;

                case 'servicos_faq':
                    $content['badge_en'] = $content['badge_en'] ?? 'Technical FAQ';
                    $content['title_en'] = $content['title_en'] ?? 'Frequently Asked Questions';
                    $content['description_en'] = $content['description_en'] ?? 'Clarify your technical questions regarding industrial processes, legislation, and agricultural biotechnology.';
                    if (isset($content['faqs']) && is_array($content['faqs'])) {
                        foreach ($content['faqs'] as &$faq) {
                            $faq['question_en'] = $faq['question_en'] ?? $faq['question'];
                            $faq['answer_en'] = $faq['answer_en'] ?? $faq['answer'];
                        }
                        unset($faq);
                    }
                    break;

                case 'servicos_clientes':
                    $content['badge_en'] = $content['badge_en'] ?? 'Successful Partnerships';
                    $content['title_en'] = $content['title_en'] ?? 'Some of Our Clients';
                    $content['description_en'] = $content['description_en'] ?? 'Brands and agricultural cooperatives that rely on VegQuality\'s technical and biotechnological support.';
                    break;

                case 'servicos_contacts':
                    $content['conversar_title_en'] = $content['conversar_title_en'] ?? 'Still have questions about adapting your plant or want to apply Veg Oxi 200 technology to your business?<br><span style="color: var(--color-veg-primary);">LET\'S TALK!</span>';
                    $content['conversar_p1_title_en'] = $content['conversar_p1_title_en'] ?? 'Sulfite-Free';
                    $content['conversar_p1_desc_en'] = $content['conversar_p1_desc_en'] ?? 'If you work with fresh, washed, ready-to-eat produce, Veg Oxi 200 is the healthy, effective alternative to metabisulfite and other sulfites.';
                    $content['conversar_p2_title_en'] = $content['conversar_p2_title_en'] ?? 'Real Profit';
                    $content['conversar_p2_desc_en'] = $content['conversar_p2_desc_en'] ?? 'Veg Oxi 200: the only natural and effective antioxidant that replaces sulfites, extends produce shelf life, preserves quality and healthiness, and reduces breakdown losses.';
                    $content['action_box_title_en'] = $content['action_box_title_en'] ?? 'Transform Your Production';
                    $content['action_box_desc_en'] = $content['action_box_desc_en'] ?? 'Rely on VegQuality\'s expertise and technological innovation to optimize your fresh produce processes.';
                    $content['action_box_cta_text_en'] = $content['action_box_cta_text_en'] ?? 'Talk to Us';
                    $content['indicator1_label_en'] = $content['indicator1_label_en'] ?? 'Sulfite-Free';
                    $content['indicator2_label_en'] = $content['indicator2_label_en'] ?? 'Profit over losses';
                    $content['promo_title_en'] = $content['promo_title_en'] ?? 'Schedule a technical diagnosis with our team of food engineers and specialists.';
                    $content['promo_cta_text_en'] = $content['promo_cta_text_en'] ?? 'Talk to a Specialist';
                    break;

                case 'veg_oxi_hero':
                    $content['title_en'] = $content['title_en'] ?? 'Veg Oxi 200';
                    $content['subtitle_en'] = $content['subtitle_en'] ?? 'Innovative technology for preservation, extended shelf life, and complete elimination of sodium metabisulfite.';
                    break;

                case 'veg_oxi_facts':
                    $content['badge_en'] = $content['badge_en'] ?? 'Behind the Product';
                    $content['title_en'] = $content['title_en'] ?? 'Facts about Veg Oxi 200';
                    if (isset($content['cards']) && is_array($content['cards'])) {
                        $enFactCards = [
                            ['title_en' => 'Scientifically Developed', 'desc_en' => 'Formulated based on years of research in post-harvest food technology.', 'body_en' => 'Developed to replace sodium metabisulfite without leaving toxic residues or altering taste and aroma.'],
                            ['title_en' => 'Sulfite-Free & Organic', 'desc_en' => 'Eliminates chemical preservatives harmful to health.', 'body_en' => '100% natural formula compliant with health and environmental regulatory standards.'],
                            ['title_en' => 'Proven Cost-Benefit', 'desc_en' => 'Drastically reduces waste and breakdown losses.', 'body_en' => 'Costs only around 1 cent per processed vegetable, generating real profit by preserving quality.'],
                            ['title_en' => 'Easy Industrial Application', 'desc_en' => 'Integrates seamlessly into existing wash and sanitization lines.', 'body_en' => 'Requires no costly machinery overhauls; easily dosed into standard processing wash tanks.'],
                        ];
                        foreach ($content['cards'] as $i => &$card) {
                            if (isset($enFactCards[$i])) {
                                $card['title_en'] = $card['title_en'] ?? $enFactCards[$i]['title_en'];
                                $card['desc_en'] = $card['desc_en'] ?? $enFactCards[$i]['desc_en'];
                                $card['body_en'] = $card['body_en'] ?? $enFactCards[$i]['body_en'];
                            }
                        }
                        unset($card);
                    }
                    break;

                case 'veg_oxi_downloads':
                    $content['badge_en'] = $content['badge_en'] ?? 'Learn More';
                    $content['title_en'] = $content['title_en'] ?? 'Additional Details';
                    if (isset($content['downloads']) && is_array($content['downloads'])) {
                        foreach ($content['downloads'] as &$dl) {
                            $dl['title_en'] = $dl['title_en'] ?? $dl['title'];
                            $dl['desc_en'] = $dl['desc_en'] ?? $dl['desc'];
                        }
                        unset($dl);
                    }
                    break;

                case 'veg_oxi_contacts':
                    $content['badge_en'] = $content['badge_en'] ?? 'Distribution';
                    $content['title_en'] = $content['title_en'] ?? 'Veg Oxi 200 Distribution';
                    if (isset($content['contacts']) && is_array($content['contacts'])) {
                        foreach ($content['contacts'] as &$ct) {
                            $ct['title_en'] = $ct['title_en'] ?? $ct['title'];
                            $ct['desc_en'] = $ct['desc_en'] ?? $ct['desc'];
                        }
                        unset($ct);
                    }
                    $content['promo_title_en'] = $content['promo_title_en'] ?? 'Transform your production with Veg Oxi 200 today.';
                    $content['promo_cta_text_en'] = $content['promo_cta_text_en'] ?? 'Contact Us';
                    break;

                case 'insights_hero':
                    $content['title_en'] = $content['title_en'] ?? 'VegQuality Insights';
                    $content['subtitle_en'] = $content['subtitle_en'] ?? 'Knowledge, practical background, and experience across all stages of the processed fresh produce supply chain.';
                    break;

                case 'contato_hero':
                    $content['title_en'] = $content['title_en'] ?? 'Contact Us';
                    $content['subtitle_en'] = $content['subtitle_en'] ?? 'Have questions or need assistance? Our team is ready to support your agro-industry.';
                    break;

                case 'contato_info':
                    $content['title_en'] = $content['title_en'] ?? 'Our Channels';
                    $content['description_en'] = $content['description_en'] ?? 'Choose your preferred channel to contact us or send a message using the form.';
                    $content['phone_hours_en'] = $content['phone_hours_en'] ?? 'Mon to Fri, 8am to 6pm (BRT)';
                    $content['whatsapp_desc_en'] = $content['whatsapp_desc_en'] ?? 'Speak directly with our technical team';
                    $content['email_desc_en'] = $content['email_desc_en'] ?? 'We reply within 1 business day';
                    break;

                case 'contato_form':
                    $content['title_en'] = $content['title_en'] ?? 'Send Us a Message';
                    $content['submit_text_en'] = $content['submit_text_en'] ?? 'Send Message';
                    $content['success_title_en'] = $content['success_title_en'] ?? 'Message Sent!';
                    $content['success_message_en'] = $content['success_message_en'] ?? 'Thank you for getting in touch. Our technical team will analyze your message and respond shortly.';
                    break;
            }

            $section->content = $content;
            $section->save();
        }

        // 2. Ensure all Articles have English fallback
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
    }
};
