<?php

use Illuminate\Database\Migrations\Migration;
use App\Models\Section;
use App\Models\Article;

return new class extends Migration
{
    public function up(): void
    {
        // Helper lambda to assign translation if missing, empty, or identical to PT
        $setEn = function (array &$arr, string $key, string $enValue) {
            $ptKey = str_replace('_en', '', $key);
            $currentEn = $arr[$key] ?? null;
            $ptVal = $arr[$ptKey] ?? null;

            if (empty($currentEn) || $currentEn === $ptVal) {
                $arr[$key] = $enValue;
            }
        };

        // 1. Comprehensive Section Translations
        $sections = Section::all();

        foreach ($sections as $section) {
            $key = $section->key;
            $content = $section->content ?? [];

            switch ($key) {
                case 'hero':
                    if (isset($content['slides']) && is_array($content['slides'])) {
                        foreach ($content['slides'] as $i => &$slide) {
                            $setEn($slide, 'title_en', 'Solutions for the processed fresh produce agro-industry.');
                            $setEn($slide, 'subtitle_en', 'Cutting-edge technological and biotechnology solutions for shelf-life extension and food safety in your production.');
                            $setEn($slide, 'btn1_text_en', 'Services');
                            $setEn($slide, 'btn2_text_en', 'Veg Oxi 200');
                            $setEn($slide, 'badge1_text_en', '+20 years of experience.');
                            $setEn($slide, 'badge2_text_en', 'Food Safety');
                        }
                        unset($slide);
                    }
                    break;

                case 'about':
                    $setEn($content, 'badge_en', 'Behind VegQuality');
                    $setEn($content, 'title_en', 'Passion that Delivers Results!');
                    $setEn($content, 'highlight_text_en', 'How to turn science into an ally for the field and the consumer\'s table?');
                    $setEn($content, 'desc1_en', 'That was the question that drove Dr. Roseane Bob\'s trajectory.');
                    $setEn($content, 'desc2_en', 'As a nutritionist specializing in food safety and sustainability, Roseane always immersed herself in the routine of growers and agro-industries. In these experiences, the harsh reality of waste and post-harvest produce processing challenges in Brazil became glaringly evident, revealing a massive loss across the fresh produce chain.');
                    $setEn($content, 'desc3_en', 'The answer to this challenge came on two complementary fronts:');
                    $setEn($content, 'desc4_en', 'With this ecosystem of solutions, Dr. Roseane and her team of collaborators and partners unite the sustainable growth of agricultural businesses with the consumer\'s right to have fresher, longer-lasting, and safer produce at home.');
                    $setEn($content, 'feature1_title_en', 'VegQuality');
                    $setEn($content, 'feature1_desc_en', 'Practical, highly specialized, and affordable consulting designed to bring efficiency and safety solutions from small to large producers.');
                    $setEn($content, 'feature2_title_en', 'Veg Oxi 200');
                    $setEn($content, 'feature2_desc_en', 'An exclusive innovation worldwide. This processing aid drastically reduces losses of processed fresh produce ready for consumption and eliminates the need for harmful additives such as sulfites.');
                    $setEn($content, 'cta_text_en', 'Learn More');
                    break;

                case 'home_offering':
                    $setEn($content, 'badge_en', 'What We Offer');
                    $setEn($content, 'title_en', 'Complete Solutions for Processed Produce Industry');
                    $setEn($content, 'description_en', 'For over two decades, we have been a benchmark in consulting and solutions for the fresh produce supply chain (Fruits, Vegetables, and Greens).');
                    if (isset($content['cards']) && is_array($content['cards'])) {
                        $enCards = [
                            ['title_en' => 'Consulting', 'description_en' => 'Comprehensive operational diagnostics, natural shelf-life extension, and custom biotechnology application to eliminate losses in your washed produce production.', 'link_text_en' => 'Learn more'],
                            ['title_en' => 'Training', 'description_en' => 'Specialized team training in Good Manufacturing Practices (GMP), sanitary control, and technical handling, ensuring compliance with current standards.', 'link_text_en' => 'Learn more'],
                            ['title_en' => 'Business Plan', 'description_en' => 'Strategic commercial development, economic feasibility of processing plants, and B2B distribution channel structuring.', 'link_text_en' => 'Learn more'],
                            ['title_en' => 'Veg Oxi 200', 'description_en' => 'Technological replacement for sulfites and sodium metabisulfite. Safe organic antioxidant with excellent cost-benefit of just 1 cent per vegetable.', 'link_text_en' => 'Learn more'],
                        ];
                        foreach ($content['cards'] as $i => &$card) {
                            if (isset($enCards[$i])) {
                                $setEn($card, 'title_en', $enCards[$i]['title_en']);
                                $setEn($card, 'description_en', $enCards[$i]['description_en']);
                                $setEn($card, 'link_text_en', $enCards[$i]['link_text_en']);
                            }
                        }
                        unset($card);
                    }
                    break;

                case 'home_why_choose':
                case 'insights_why_choose':
                    $setEn($content, 'badge_en', 'Our Edge');
                    $setEn($content, 'title_en', 'Why Choose Us?');
                    $setEn($content, 'description_en', 'Knowledge, practical background, and experience across all stages of the processed fresh produce chain.');
                    break;

                case 'home_insights':
                case 'insights_cards':
                    $setEn($content, 'badge_en', 'VegQuality Insights');
                    $setEn($content, 'title_en', 'Knowledge that Transforms Business');
                    $setEn($content, 'description_en', 'Our insights and methodologies to support your agro-industry at every stage of the production chain.');
                    if (isset($content['cards']) && is_array($content['cards'])) {
                        $enInsightCards = [
                            ['title_en' => 'Processes', 'description_en' => 'Hygienic-sanitary operational standardization and industrial processes optimized for zero waste.'],
                            ['title_en' => 'Equipment', 'description_en' => 'Sizing of ideal machinery and selection of correct technologies for your processing line.'],
                            ['title_en' => 'Cold Chain', 'description_en' => 'Strict thermal monitoring from field to point of sale, ensuring freshness and shelf compliance.'],
                            ['title_en' => 'Packaging', 'description_en' => 'Selection of technical passive modified atmosphere (MAP) films suitable for each vegetable.'],
                        ];
                        foreach ($content['cards'] as $i => &$card) {
                            if (isset($enInsightCards[$i])) {
                                $setEn($card, 'title_en', $enInsightCards[$i]['title_en']);
                                $setEn($card, 'description_en', $enInsightCards[$i]['description_en']);
                            }
                        }
                        unset($card);
                    }
                    break;

                case 'product_highlight':
                    $setEn($content, 'badge_en', 'Biotechnology');
                    $setEn($content, 'title_en', 'Veg Oxi 200 - Processing Aid');
                    $setEn($content, 'subtitle_en', 'An Investment Worth Making!');
                    $setEn($content, 'cost_with_unit_en', 'Cents');
                    $setEn($content, 'cost_with_desc_en', 'Per Fresh Vegetable');
                    $setEn($content, 'cost_with_tag_en', 'Sulfite-Free (Safe)');
                    $setEn($content, 'cost_without_unit_en', 'Cents');
                    $setEn($content, 'cost_without_desc_en', 'Per Oxidized Vegetable');
                    $setEn($content, 'cost_without_tag_en', 'With Metabisulfite (Toxic)');
                    $setEn($content, 'cta_text_en', 'Acquire Veg Oxi 200');
                    break;

                case 'home_contact_cta':
                    $setEn($content, 'badge_en', 'Contact Us');
                    $setEn($content, 'title_en', 'Ready to transform your production?');
                    $setEn($content, 'subtitle_en', 'Get in touch with us today and speak directly with a VegQuality technical specialist.');
                    $setEn($content, 'address_en', 'São Paulo / SP - Brazil');
                    break;

                case 'empresa_hero':
                    $setEn($content, 'title_en', 'Consulting & Solutions for Agro-Industry');
                    $setEn($content, 'subtitle_en', 'Science and technology united to ensure safer, healthier, and more profitable food.');
                    break;

                case 'empresa_stats':
                    $setEn($content, 'stat_text_en', 'of Tons Saved from Food Waste');
                    break;

                case 'empresa_sulfito':
                    $setEn($content, 'badge_en', 'VegQuality');
                    $setEn($content, 'title_en', '100% Sulfite-Free');
                    $setEn($content, 'description_en', 'Did you know that sodium metabisulfite is widely used as a preservative in fresh processed produce? 🌱 With <strong>Veg Oxi 200</strong>, that is a thing of the past!');
                    $setEn($content, 'check1_en', 'Free from sulfur dioxide.');
                    $setEn($content, 'check2_en', 'Preserves food naturally.');
                    $setEn($content, 'check3_en', 'Respects consumer and operator health.');
                    break;

                case 'empresa_frescor':
                    $setEn($content, 'badge_en', 'VegQuality');
                    $setEn($content, 'title_en', '360° Consulting');
                    $setEn($content, 'highlight_text_en', 'Transform your line of fresh, ready-to-eat produce!');
                    $setEn($content, 'description_en', 'At VegQuality, we offer customized solutions and expert consulting to boost technical efficiency and operational safety in your processing plant.');
                    $setEn($content, 'feature1_title_en', 'Extend Shelf Life');
                    $setEn($content, 'feature1_desc_en', 'Significantly extend product durability while maintaining natural freshness longer.');
                    $setEn($content, 'feature2_title_en', 'Reduce Costs & Losses');
                    $setEn($content, 'feature2_desc_en', 'Minimize production waste through standardized processes and state-of-the-art technology.');
                    $setEn($content, 'feature3_title_en', 'Elevate Standards');
                    $setEn($content, 'feature3_desc_en', 'Ensure strict compliance with sanitary standards and deliver top quality to the market.');
                    break;

                case 'empresa_quem_somos':
                    $setEn($content, 'badge_en', 'Leadership & Science');
                    $setEn($content, 'title_en', 'VegQuality Story<br><span style="color: var(--color-veg-primary);">Consulting that delivers results!</span>');
                    $setEn($content, 'description1_en', 'VegQuality is more than a consultancy: it is a strategic partner for companies operating in the fresh produce agro-industry, from the field to distribution points.');
                    $setEn($content, 'description2_en', 'Combining science, innovation, practical experience, and purpose, we deliver customized solutions that strengthen quality, safety, sustainability, and profitability in sanitized fresh produce processing.');
                    $setEn($content, 'image_caption_en', 'Dr. Roseane Bob, founder and director of VegQuality');
                    $setEn($content, 'card1_label_en', 'Expertise');
                    $setEn($content, 'card2_label_en', 'Experience');
                    $setEn($content, 'card3_label_en', 'Results');
                    break;

                case 'servicos_hero':
                    $setEn($content, 'title_en', 'Services Offered');
                    $setEn($content, 'subtitle_en', 'Cutting-edge strategic and operational solutions to elevate profitability and quality standards in agro-industry.');
                    break;

                case 'servicos_catalog':
                    $setEn($content, 'badge_en', 'Our Services');
                    $setEn($content, 'title_en', '360° Consulting for Fresh Produce Agro-Industry: From Field to Shelf');
                    $setEn($content, 'service1_badge_en', 'Consulting');
                    $setEn($content, 'service1_title_en', 'Consulting');
                    $setEn($content, 'service1_desc_en', 'Make your agro-industrial production more efficient, safe, and profitable. Our technical consulting accompanies your product from field to shelf.');
                    $setEn($content, 'service2_badge_en', 'Training');
                    $setEn($content, 'service2_title_en', 'Training');
                    $setEn($content, 'service2_desc_en', 'Practical Training for Real Results. Having well-crafted procedures, manuals, and SOPs is essential, but the real challenge is turning them into consistent daily actions.');
                    $setEn($content, 'service3_badge_en', 'Projects');
                    $setEn($content, 'service3_title_en', 'Business Plan');
                    $setEn($content, 'service3_desc_en', 'Processed Fresh Produce Agro-Industry: The fastest growing market that demands professionalism.');
                    break;

                case 'servicos_faq':
                    $setEn($content, 'badge_en', 'Technical FAQ');
                    $setEn($content, 'title_en', 'Frequently Asked Questions');
                    $setEn($content, 'description_en', 'Clarify your technical questions regarding industrial processes, legislation, and agricultural biotechnology.');
                    if (isset($content['faqs']) && is_array($content['faqs'])) {
                        foreach ($content['faqs'] as &$faq) {
                            $setEn($faq, 'question_en', $faq['question']);
                            $setEn($faq, 'answer_en', $faq['answer']);
                        }
                        unset($faq);
                    }
                    break;

                case 'servicos_clientes':
                    $setEn($content, 'badge_en', 'Successful Partnerships');
                    $setEn($content, 'title_en', 'Some of Our Clients');
                    $setEn($content, 'description_en', 'Brands and agricultural cooperatives that rely on VegQuality\'s technical and biotechnological support.');
                    break;

                case 'servicos_contacts':
                    $setEn($content, 'conversar_title_en', 'Still have questions about adapting your plant or want to apply Veg Oxi 200 technology to your business?<br><span style="color: var(--color-veg-primary);">LET\'S TALK!</span>');
                    $setEn($content, 'conversar_p1_title_en', 'Sulfite-Free');
                    $setEn($content, 'conversar_p1_desc_en', 'If you work with fresh, washed, ready-to-eat produce, Veg Oxi 200 is the healthy, effective alternative to metabisulfite and other sulfites.');
                    $setEn($content, 'conversar_p2_title_en', 'Real Profit');
                    $setEn($content, 'conversar_p2_desc_en', 'Veg Oxi 200: the only natural and effective antioxidant that replaces sulfites, extends produce shelf life, preserves quality and healthiness, and reduces breakdown losses.');
                    $setEn($content, 'action_box_title_en', 'Transform Your Production');
                    $setEn($content, 'action_box_desc_en', 'Rely on VegQuality\'s expertise and technological innovation to optimize your fresh produce processes.');
                    $setEn($content, 'action_box_cta_text_en', 'Talk to Us');
                    $setEn($content, 'indicator1_label_en', 'Sulfite-Free');
                    $setEn($content, 'indicator2_label_en', 'Profit over losses');
                    $setEn($content, 'promo_title_en', 'Schedule a technical diagnosis with our team of food engineers and specialists.');
                    $setEn($content, 'promo_cta_text_en', 'Talk to a Specialist');
                    break;

                case 'veg_oxi_hero':
                    $setEn($content, 'title_en', 'Veg Oxi 200');
                    $setEn($content, 'subtitle_en', 'Innovative technology for preservation, extended shelf life, and complete elimination of sodium metabisulfite.');
                    break;

                case 'veg_oxi_facts':
                    $setEn($content, 'badge_en', 'Behind the Product');
                    $setEn($content, 'title_en', 'Facts about Veg Oxi 200');
                    if (isset($content['cards']) && is_array($content['cards'])) {
                        $enFactCards = [
                            ['title_en' => 'Scientifically Developed', 'desc_en' => 'Formulated based on years of research in post-harvest food technology.', 'body_en' => 'Developed to replace sodium metabisulfite without leaving toxic residues or altering taste and aroma.'],
                            ['title_en' => 'Sulfite-Free & Organic', 'desc_en' => 'Eliminates chemical preservatives harmful to health.', 'body_en' => '100% natural formula compliant with health and environmental regulatory standards.'],
                            ['title_en' => 'Proven Cost-Benefit', 'desc_en' => 'Drastically reduces waste and breakdown losses.', 'body_en' => 'Costs only around 1 cent per processed vegetable, generating real profit by preserving quality.'],
                            ['title_en' => 'Easy Industrial Application', 'desc_en' => 'Integrates seamlessly into existing wash and sanitization lines.', 'body_en' => 'Requires no costly machinery overhauls; easily dosed into standard processing wash tanks.'],
                        ];
                        foreach ($content['cards'] as $i => &$card) {
                            if (isset($enFactCards[$i])) {
                                $setEn($card, 'title_en', $enFactCards[$i]['title_en']);
                                $setEn($card, 'desc_en', $enFactCards[$i]['desc_en']);
                                $setEn($card, 'body_en', $enFactCards[$i]['body_en']);
                            }
                        }
                        unset($card);
                    }
                    break;

                case 'veg_oxi_downloads':
                    $setEn($content, 'badge_en', 'Learn More');
                    $setEn($content, 'title_en', 'Additional Details');
                    if (isset($content['downloads']) && is_array($content['downloads'])) {
                        foreach ($content['downloads'] as &$dl) {
                            $setEn($dl, 'title_en', $dl['title']);
                            $setEn($dl, 'desc_en', $dl['desc']);
                        }
                        unset($dl);
                    }
                    break;

                case 'veg_oxi_contacts':
                    $setEn($content, 'badge_en', 'Distribution');
                    $setEn($content, 'title_en', 'Veg Oxi 200 Distribution');
                    if (isset($content['contacts']) && is_array($content['contacts'])) {
                        foreach ($content['contacts'] as &$ct) {
                            $setEn($ct, 'title_en', $ct['title']);
                            $setEn($ct, 'desc_en', $ct['desc']);
                        }
                        unset($ct);
                    }
                    $setEn($content, 'promo_title_en', 'Transform your production with Veg Oxi 200 today.');
                    $setEn($content, 'promo_cta_text_en', 'Contact Us');
                    break;

                case 'insights_hero':
                    $setEn($content, 'title_en', 'VegQuality Insights');
                    $setEn($content, 'subtitle_en', 'Knowledge, practical background, and experience across all stages of the processed fresh produce supply chain.');
                    break;

                case 'contato_hero':
                    $setEn($content, 'title_en', 'Contact Us');
                    $setEn($content, 'subtitle_en', 'Have questions or need assistance? Our team is ready to support your agro-industry.');
                    break;

                case 'contato_info':
                    $setEn($content, 'title_en', 'Our Channels');
                    $setEn($content, 'description_en', 'Choose your preferred channel to contact us or send a message using the form.');
                    $setEn($content, 'phone_hours_en', 'Mon to Fri, 8am to 6pm (BRT)');
                    $setEn($content, 'whatsapp_desc_en', 'Speak directly with our technical team');
                    $setEn($content, 'email_desc_en', 'We reply within 1 business day');
                    break;

                case 'contato_form':
                    $setEn($content, 'title_en', 'Send Us a Message');
                    $setEn($content, 'submit_text_en', 'Send Message');
                    $setEn($content, 'success_title_en', 'Message Sent!');
                    $setEn($content, 'success_message_en', 'Thank you for getting in touch. Our technical team will analyze your message and respond shortly.');
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
