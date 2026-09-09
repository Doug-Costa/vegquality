<?php

namespace App\Filament\Resources\PageResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class SectionsRelationManager extends RelationManager
{
    protected static string $relationship = 'sections';

    protected static ?string $title = 'Seções da Página';
    protected static ?string $modelLabel = 'Seção';
    protected static ?string $pluralModelLabel = 'Seções';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('key')
                    ->label('Chave Identificadora da Seção')
                    ->disabled()
                    ->dehydrated(false)
                    ->columnSpanFull(),
                Forms\Components\Group::make()
                    ->statePath('content')
                    ->schema(fn ($record) => array_merge([
                        Forms\Components\Section::make('Visibilidade da Seção no Site')
                            ->description('Habilite ou desabilite a exibição visual desta seção no site por idioma sem alterar a estrutura do banco de dados.')
                            ->schema([
                                Forms\Components\Toggle::make('is_visible_pt')
                                    ->label('Visível em Português (PT)')
                                    ->default(true),
                                Forms\Components\Toggle::make('is_visible_en')
                                    ->label('Visível em Inglês (EN)')
                                    ->default(true),
                            ])
                            ->columns(2)
                            ->columnSpanFull()
                    ], self::getSectionSchema($record?->key)))
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('key')
            ->columns([
                Tables\Columns\TextColumn::make('key')
                    ->label('Chave da Seção')
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'hero' => 'Home - Hero / Banner Principal (Carrossel)',
                        'product_highlight' => 'Veg Oxi - Destaque do Produto (Veg Oxi 200)',
                        'about' => 'Home - Sobre Nós (Dra. Roseane Bob)',
                        'home_insights' => 'Home - Insights VegQuality (Cards)',
                        'home_why_choose' => 'Home - Por que nos Escolher?',
                        'home_contact_cta' => 'Home - Chamada Final para Contato',
                        'veg_oxi_hero' => 'Veg Oxi - Hero / Banner Superior',
                        'veg_oxi_facts' => 'Veg Oxi - Fatos sobre o Veg Oxi',
                        'veg_oxi_downloads' => 'Veg Oxi - Detalhes Adicionais (Downloads)',
                        'veg_oxi_contacts' => 'Veg Oxi - Canais de Distribuição & Contato',
                        'insights_hero' => 'Insights - Hero / Banner Superior',
                        'insights_cards' => 'Insights - Áreas de Atuação Técnica (Cards)',
                        'insights_why_choose' => 'Insights - Por que nos Escolher?',
                        'empresa_hero' => 'Empresa - Hero / Banner Superior',
                        'empresa_stats' => 'Empresa - Banner de Estatísticas',
                        'empresa_sulfito' => 'Empresa - Seção Livre de Sulfitos',
                        'empresa_frescor' => 'Empresa - Seção Mantendo o Frescor',
                        'empresa_quem_somos' => 'Empresa - Quem Somos',
                        'servicos_hero' => 'Serviços - Hero / Banner Superior',
                        'servicos_catalog' => 'Serviços - Catálogo de Serviços',
                        'servicos_faq' => 'Serviços - FAQ (Perguntas Frequentes)',
                        'servicos_clientes' => 'Serviços - Nossos Clientes',
                        'servicos_contacts' => 'Serviços - Seção Vamos Conversar & Promo',
                        'home_offering' => 'Home - O que Oferecemos (Soluções Completas)',
                        'contato_hero' => 'Contato - Hero / Banner Superior',
                        'contato_info' => 'Contato - Canais de Atendimento',
                        'contato_form' => 'Contato - Formulário e Mensagens',
                        default => ucwords(str_replace('_', ' ', $state)),
                    }),
                Tables\Columns\ToggleColumn::make('content.is_visible_pt')
                    ->label('Visível (PT)')
                    ->default(true),
                Tables\Columns\ToggleColumn::make('content.is_visible_en')
                    ->label('Visível (EN)')
                    ->default(true),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                // Desabilitamos criação manual de seções por aqui pois elas são fixas e semeadas via migration/seeder
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->modalWidth('4xl'),
            ])
            ->bulkActions([
                //
            ]);
    }

    protected static function getSectionSchema(?string $key): array
    {
        if (!$key) {
            return [];
        }

        return match ($key) {
            'hero' => [
                Forms\Components\Repeater::make('slides')
                    ->label('Slides do Carrossel')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->label('Imagem do Slide')
                            ->directory('hero')
                            ->disk('public')
                            ->image()
                            ->maxSize(102400)
                            ->required(),
                        Forms\Components\Tabs::make('Idioma Slide')
                            ->tabs([
                                Forms\Components\Tabs\Tab::make('Português (PT)')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->label('Título Principal (PT)')
                                            ->helperText('Use tags HTML como <span> para destacar se desejar.')
                                            ->required(),
                                        Forms\Components\Textarea::make('subtitle')
                                            ->label('Subtítulo / Descrição (PT)')
                                            ->required(),
                                        Forms\Components\TextInput::make('btn1_text')->label('Texto Botão 1 (PT)'),
                                        Forms\Components\TextInput::make('btn2_text')->label('Texto Botão 2 (PT)'),
                                        Forms\Components\TextInput::make('badge1_text')->label('Badge 1 (PT)'),
                                        Forms\Components\TextInput::make('badge2_text')->label('Badge 2 (PT)'),
                                    ]),
                                Forms\Components\Tabs\Tab::make('Inglês (EN)')
                                    ->schema([
                                        Forms\Components\TextInput::make('title_en')
                                            ->label('Título Principal (EN)'),
                                        Forms\Components\Textarea::make('subtitle_en')
                                            ->label('Subtítulo / Descrição (EN)'),
                                        Forms\Components\TextInput::make('btn1_text_en')->label('Texto Botão 1 (EN)'),
                                        Forms\Components\TextInput::make('btn2_text_en')->label('Texto Botão 2 (EN)'),
                                        Forms\Components\TextInput::make('badge1_text_en')->label('Badge 1 (EN)'),
                                        Forms\Components\TextInput::make('badge2_text_en')->label('Badge 2 (EN)'),
                                    ]),
                            ]),
                        Forms\Components\Grid::make(3)
                            ->schema([
                                Forms\Components\TextInput::make('btn1_link')->label('Link do Botão 1'),
                                Forms\Components\TextInput::make('btn2_link')->label('Link do Botão 2'),
                                Forms\Components\TextInput::make('badge2_link')->label('Link do Badge 2'),
                            ]),
                    ])
                    ->collapsible()
                    ->orderable()
                    ->defaultItems(1)
                    ->columnSpanFull()
            ],

            'product_highlight' => [
                Forms\Components\Tabs::make('Idioma Seção')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Português (PT)')
                            ->schema([
                                Forms\Components\TextInput::make('badge')->label('Badge (PT)')->required(),
                                Forms\Components\TextInput::make('title')->label('Título (PT)')->required(),
                                Forms\Components\TextInput::make('subtitle')->label('Subtítulo (PT)')->required(),
                                Forms\Components\TextInput::make('cta_text')->label('Texto Botão CTA (PT)')->required(),
                                Forms\Components\TextInput::make('cta_link')->label('Link do Botão CTA (PT)'),

                                Forms\Components\Section::make('Card Verde (Com Veg Oxi 200) - PT')
                                    ->schema([
                                        Forms\Components\Toggle::make('show_cost_with')
                                            ->label('Exibir Card Verde (PT)')
                                            ->default(true)
                                            ->columnSpanFull(),
                                        Forms\Components\TextInput::make('cost_with')->label('Número do Custo Verde (Ex: 30)'),
                                        Forms\Components\TextInput::make('cost_with_unit')->label('Unidade do Custo'),
                                        Forms\Components\TextInput::make('cost_with_desc')->label('Descrição do Custo'),
                                        Forms\Components\TextInput::make('cost_with_tag')->label('Etiqueta do Custo'),
                                    ])->columns(4),

                                Forms\Components\Section::make('Card Vermelho (Sem Veg Oxi 200) - PT')
                                    ->schema([
                                        Forms\Components\Toggle::make('show_cost_without')
                                            ->label('Exibir Card Vermelho (PT)')
                                            ->default(true)
                                            ->columnSpanFull(),
                                        Forms\Components\TextInput::make('cost_without')->label('Número do Custo Vermelho (Ex: 80)'),
                                        Forms\Components\TextInput::make('cost_without_unit')->label('Unidade do Custo'),
                                        Forms\Components\TextInput::make('cost_without_desc')->label('Descrição do Custo'),
                                        Forms\Components\TextInput::make('cost_without_tag')->label('Etiqueta do Custo'),
                                    ])->columns(4),
                            ]),
                        Forms\Components\Tabs\Tab::make('Inglês (EN)')
                            ->schema([
                                Forms\Components\TextInput::make('badge_en')->label('Badge (EN)'),
                                Forms\Components\TextInput::make('title_en')->label('Título (EN)'),
                                Forms\Components\TextInput::make('subtitle_en')->label('Subtítulo (EN)'),
                                Forms\Components\TextInput::make('cta_text_en')->label('Texto Botão CTA (EN)'),
                                Forms\Components\TextInput::make('cta_link_en')->label('Link do Botão CTA (EN)'),

                                Forms\Components\Section::make('Card Verde (Com Veg Oxi 200) - EN')
                                    ->schema([
                                        Forms\Components\Toggle::make('show_cost_with_en')
                                            ->label('Exibir Card Verde (EN)')
                                            ->default(true)
                                            ->columnSpanFull(),
                                        Forms\Components\TextInput::make('cost_with_en')->label('Número do Custo Verde (EN) (Ex: 30)'),
                                        Forms\Components\TextInput::make('cost_with_unit_en')->label('Unidade do Custo (EN)'),
                                        Forms\Components\TextInput::make('cost_with_desc_en')->label('Descrição do Custo (EN)'),
                                        Forms\Components\TextInput::make('cost_with_tag_en')->label('Etiqueta do Custo (EN)'),
                                    ])->columns(4),

                                Forms\Components\Section::make('Card Vermelho (Sem Veg Oxi 200) - EN')
                                    ->schema([
                                        Forms\Components\Toggle::make('show_cost_without_en')
                                            ->label('Exibir Card Vermelho (EN)')
                                            ->default(true)
                                            ->columnSpanFull(),
                                        Forms\Components\TextInput::make('cost_without_en')->label('Número do Custo Vermelho (EN) (Ex: 80)'),
                                        Forms\Components\TextInput::make('cost_without_unit_en')->label('Unidade do Custo (EN)'),
                                        Forms\Components\TextInput::make('cost_without_desc_en')->label('Descrição do Custo (EN)'),
                                        Forms\Components\TextInput::make('cost_without_tag_en')->label('Etiqueta do Custo (EN)'),
                                    ])->columns(4),
                            ]),
                    ]),
                Forms\Components\FileUpload::make('image')
                    ->label('Imagem Comparativa')
                    ->image()
                    ->directory('products')
                    ->disk('public')
                    ->maxSize(102400)
                    ->columnSpanFull(),
            ],

            'about' => [
                Forms\Components\Tabs::make('Idioma Seção')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Português (PT)')
                            ->schema([
                                Forms\Components\TextInput::make('badge')->label('Badge (PT)')->required(),
                                Forms\Components\TextInput::make('title')->label('Título Principal (PT)')->required(),
                                Forms\Components\Textarea::make('highlight_text')->label('Texto em Destaque (PT)')->required(),
                                Forms\Components\Textarea::make('desc1')->label('Parágrafo 1 (PT)'),
                                Forms\Components\Textarea::make('desc2')->label('Parágrafo 2 (PT)'),
                                Forms\Components\Textarea::make('desc3')->label('Parágrafo 3 (PT)'),
                                Forms\Components\Textarea::make('desc4')->label('Parágrafo 4 (PT)'),
                                Forms\Components\TextInput::make('feature1_title')->label('Pilar 1 Título (PT)'),
                                Forms\Components\Textarea::make('feature1_desc')->label('Pilar 1 Descrição (PT)'),
                                Forms\Components\TextInput::make('feature2_title')->label('Pilar 2 Título (PT)'),
                                Forms\Components\Textarea::make('feature2_desc')->label('Pilar 2 Descrição (PT)'),
                                Forms\Components\TextInput::make('cta_text')->label('Texto Botão CTA (PT)')->required(),
                            ]),
                        Forms\Components\Tabs\Tab::make('Inglês (EN)')
                            ->schema([
                                Forms\Components\TextInput::make('badge_en')->label('Badge (EN)'),
                                Forms\Components\TextInput::make('title_en')->label('Título Principal (EN)'),
                                Forms\Components\Textarea::make('highlight_text_en')->label('Texto em Destaque (EN)'),
                                Forms\Components\Textarea::make('desc1_en')->label('Parágrafo 1 (EN)'),
                                Forms\Components\Textarea::make('desc2_en')->label('Parágrafo 2 (EN)'),
                                Forms\Components\Textarea::make('desc3_en')->label('Parágrafo 3 (EN)'),
                                Forms\Components\Textarea::make('desc4_en')->label('Parágrafo 4 (EN)'),
                                Forms\Components\TextInput::make('feature1_title_en')->label('Pilar 1 Título (EN)'),
                                Forms\Components\Textarea::make('feature1_desc_en')->label('Pilar 1 Descrição (EN)'),
                                Forms\Components\TextInput::make('feature2_title_en')->label('Pilar 2 Título (EN)'),
                                Forms\Components\Textarea::make('feature2_desc_en')->label('Pilar 2 Descrição (EN)'),
                                Forms\Components\TextInput::make('cta_text_en')->label('Texto Botão CTA (EN)'),
                            ]),
                    ]),
                Forms\Components\Grid::make(2)
                    ->schema([
                        Forms\Components\TextInput::make('cta_link')->label('Link do Botão CTA')->required(),
                        Forms\Components\FileUpload::make('image')
                            ->label('Imagem de Perfil')
                            ->image()
                            ->directory('about')
                            ->disk('public')
                            ->maxSize(102400)
                            ->columnSpanFull(),
                    ])
            ],

            'empresa_hero' => [
                Forms\Components\Tabs::make('Idioma Seção')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Português (PT)')
                            ->schema([
                                Forms\Components\TextInput::make('title')->label('Título (PT)')->required(),
                                Forms\Components\Textarea::make('subtitle')->label('Subtítulo (PT)')->required(),
                            ]),
                        Forms\Components\Tabs\Tab::make('Inglês (EN)')
                            ->schema([
                                Forms\Components\TextInput::make('title_en')->label('Título (EN)'),
                                Forms\Components\Textarea::make('subtitle_en')->label('Subtítulo (EN)'),
                            ]),
                    ])
            ],

            'empresa_stats' => [
                Forms\Components\Tabs::make('Idioma Seção')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Português (PT)')
                            ->schema([
                                Forms\Components\TextInput::make('stat_text')->label('Descrição do Indicador (PT)')->required(),
                            ]),
                        Forms\Components\Tabs\Tab::make('Inglês (EN)')
                            ->schema([
                                Forms\Components\TextInput::make('stat_text_en')->label('Descrição do Indicador (EN)'),
                            ]),
                    ]),
                Forms\Components\TextInput::make('stat_number')->label('Número / Indicador (Ex: 25 M)')->required(),
            ],

            'empresa_sulfito' => [
                Forms\Components\Tabs::make('Idioma Seção')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Português (PT)')
                            ->schema([
                                Forms\Components\TextInput::make('badge')->label('Badge (PT)')->required(),
                                Forms\Components\TextInput::make('title')->label('Título (PT)')->required(),
                                Forms\Components\Textarea::make('description')->label('Descrição (PT)')->required(),
                                Forms\Components\TextInput::make('check1')->label('Check 1 (PT)')->required(),
                                Forms\Components\TextInput::make('check2')->label('Check 2 (PT)')->required(),
                                Forms\Components\TextInput::make('check3')->label('Check 3 (PT)')->required(),
                            ]),
                        Forms\Components\Tabs\Tab::make('Inglês (EN)')
                            ->schema([
                                Forms\Components\TextInput::make('badge_en')->label('Badge (EN)'),
                                Forms\Components\TextInput::make('title_en')->label('Título (EN)'),
                                Forms\Components\Textarea::make('description_en')->label('Descrição (EN)'),
                                Forms\Components\TextInput::make('check1_en')->label('Check 1 (EN)'),
                                Forms\Components\TextInput::make('check2_en')->label('Check 2 (EN)'),
                                Forms\Components\TextInput::make('check3_en')->label('Check 3 (EN)'),
                            ]),
                    ])
            ],

            'empresa_frescor' => [
                Forms\Components\Tabs::make('Idioma Seção')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Português (PT)')
                            ->schema([
                                Forms\Components\TextInput::make('badge')->label('Badge (PT)')->required(),
                                Forms\Components\TextInput::make('title')->label('Título Principal (PT)')->required(),
                                Forms\Components\TextInput::make('highlight_text')->label('Texto em Destaque (PT)')->required(),
                                Forms\Components\Textarea::make('description')->label('Descrição Geral (PT)')->required(),
                                Forms\Components\TextInput::make('feature1_title')->label('Ponto 1 Título (PT)')->required(),
                                Forms\Components\Textarea::make('feature1_desc')->label('Ponto 1 Descrição (PT)')->required(),
                                Forms\Components\TextInput::make('feature2_title')->label('Ponto 2 Título (PT)')->required(),
                                Forms\Components\Textarea::make('feature2_desc')->label('Ponto 2 Descrição (PT)')->required(),
                                Forms\Components\TextInput::make('feature3_title')->label('Ponto 3 Título (PT)')->required(),
                                Forms\Components\Textarea::make('feature3_desc')->label('Ponto 3 Descrição (PT)')->required(),
                            ]),
                        Forms\Components\Tabs\Tab::make('Inglês (EN)')
                            ->schema([
                                Forms\Components\TextInput::make('badge_en')->label('Badge (EN)'),
                                Forms\Components\TextInput::make('title_en')->label('Título Principal (EN)'),
                                Forms\Components\TextInput::make('highlight_text_en')->label('Texto em Destaque (EN)'),
                                Forms\Components\Textarea::make('description_en')->label('Descrição Geral (EN)'),
                                Forms\Components\TextInput::make('feature1_title_en')->label('Ponto 1 Título (EN)'),
                                Forms\Components\Textarea::make('feature1_desc_en')->label('Ponto 1 Descrição (EN)'),
                                Forms\Components\TextInput::make('feature2_title_en')->label('Ponto 2 Título (EN)'),
                                Forms\Components\Textarea::make('feature2_desc_en')->label('Ponto 2 Descrição (EN)'),
                                Forms\Components\TextInput::make('feature3_title_en')->label('Ponto 3 Título (EN)'),
                                Forms\Components\Textarea::make('feature3_desc_en')->label('Ponto 3 Descrição (EN)'),
                            ]),
                    ]),
                Forms\Components\FileUpload::make('image')
                    ->label('Imagem do Lado Direito')
                    ->image()
                    ->directory('empresa')
                    ->disk('public')
                    ->maxSize(102400)
                    ->columnSpanFull(),
            ],

            'empresa_quem_somos' => [
                Forms\Components\Tabs::make('Idioma Seção')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Português (PT)')
                            ->schema([
                                Forms\Components\TextInput::make('badge')->label('Badge (PT)')->required(),
                                Forms\Components\TextInput::make('title')->label('Título Principal (PT)')->required(),
                                Forms\Components\Textarea::make('description1')->label('Parágrafo 1 (PT)')->required(),
                                Forms\Components\Textarea::make('description2')->label('Parágrafo 2 (PT)')->required(),
                                Forms\Components\TextInput::make('image_caption')->label('Legenda Imagem (PT)'),
                                Forms\Components\TextInput::make('card1_label')->label('Card 1 Rótulo (PT)'),
                                Forms\Components\TextInput::make('card2_label')->label('Card 2 Rótulo (PT)'),
                                Forms\Components\TextInput::make('card3_label')->label('Card 3 Rótulo (PT)'),
                            ]),
                        Forms\Components\Tabs\Tab::make('Inglês (EN)')
                            ->schema([
                                Forms\Components\TextInput::make('badge_en')->label('Badge (EN)'),
                                Forms\Components\TextInput::make('title_en')->label('Título Principal (EN)'),
                                Forms\Components\Textarea::make('description1_en')->label('Parágrafo 1 (EN)'),
                                Forms\Components\Textarea::make('description2_en')->label('Parágrafo 2 (EN)'),
                                Forms\Components\TextInput::make('image_caption_en')->label('Legenda Imagem (EN)'),
                                Forms\Components\TextInput::make('card1_label_en')->label('Card 1 Rótulo (EN)'),
                                Forms\Components\TextInput::make('card2_label_en')->label('Card 2 Rótulo (EN)'),
                                Forms\Components\TextInput::make('card3_label_en')->label('Card 3 Rótulo (EN)'),
                            ]),
                    ]),
                Forms\Components\Grid::make(3)
                    ->schema([
                        Forms\Components\TextInput::make('card1_num')->label('Card 1 Número'),
                        Forms\Components\TextInput::make('card2_num')->label('Card 2 Número'),
                        Forms\Components\TextInput::make('card3_num')->label('Card 3 Número'),
                        Forms\Components\FileUpload::make('image')
                            ->label('Imagem da Liderança')
                            ->image()
                            ->directory('empresa')
                            ->disk('public')
                            ->maxSize(102400)
                            ->columnSpanFull(),
                    ])
            ],

            'servicos_hero' => [
                Forms\Components\Tabs::make('Idioma Seção')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Português (PT)')
                            ->schema([
                                Forms\Components\TextInput::make('title')->label('Título (PT)')->required(),
                                Forms\Components\Textarea::make('subtitle')->label('Subtítulo (PT)')->required(),
                            ]),
                        Forms\Components\Tabs\Tab::make('Inglês (EN)')
                            ->schema([
                                Forms\Components\TextInput::make('title_en')->label('Título (EN)'),
                                Forms\Components\Textarea::make('subtitle_en')->label('Subtítulo (EN)'),
                            ]),
                    ])
            ],

            'servicos_catalog' => [
                Forms\Components\Tabs::make('Idioma Seção')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Português (PT)')
                            ->schema([
                                Forms\Components\TextInput::make('badge')->label('Badge (PT)')->required(),
                                Forms\Components\TextInput::make('title')->label('Título Principal (PT)')->required(),
                                Forms\Components\Section::make('Serviço 1')
                                    ->schema([
                                        Forms\Components\TextInput::make('service1_badge')->label('Mini Badge (PT)')->required(),
                                        Forms\Components\TextInput::make('service1_title')->label('Título (PT)')->required(),
                                        Forms\Components\Textarea::make('service1_desc')->label('Descrição (PT)')->required(),
                                    ]),
                                Forms\Components\Section::make('Serviço 2')
                                    ->schema([
                                        Forms\Components\TextInput::make('service2_badge')->label('Mini Badge (PT)')->required(),
                                        Forms\Components\TextInput::make('service2_title')->label('Título (PT)')->required(),
                                        Forms\Components\Textarea::make('service2_desc')->label('Descrição (PT)')->required(),
                                    ]),
                                Forms\Components\Section::make('Serviço 3')
                                    ->schema([
                                        Forms\Components\TextInput::make('service3_badge')->label('Mini Badge (PT)')->required(),
                                        Forms\Components\TextInput::make('service3_title')->label('Título (PT)')->required(),
                                        Forms\Components\Textarea::make('service3_desc')->label('Descrição (PT)')->required(),
                                    ]),
                            ]),
                        Forms\Components\Tabs\Tab::make('Inglês (EN)')
                            ->schema([
                                Forms\Components\TextInput::make('badge_en')->label('Badge (EN)'),
                                Forms\Components\TextInput::make('title_en')->label('Título Principal (EN)'),
                                Forms\Components\Section::make('Serviço 1 - EN')
                                    ->schema([
                                        Forms\Components\TextInput::make('service1_badge_en')->label('Mini Badge (EN)'),
                                        Forms\Components\TextInput::make('service1_title_en')->label('Título (EN)'),
                                        Forms\Components\Textarea::make('service1_desc_en')->label('Descrição (EN)'),
                                    ]),
                                Forms\Components\Section::make('Serviço 2 - EN')
                                    ->schema([
                                        Forms\Components\TextInput::make('service2_badge_en')->label('Mini Badge (EN)'),
                                        Forms\Components\TextInput::make('service2_title_en')->label('Título (EN)'),
                                        Forms\Components\Textarea::make('service2_desc_en')->label('Descrição (EN)'),
                                    ]),
                                Forms\Components\Section::make('Serviço 3 - EN')
                                    ->schema([
                                        Forms\Components\TextInput::make('service3_badge_en')->label('Mini Badge (EN)'),
                                        Forms\Components\TextInput::make('service3_title_en')->label('Título (EN)'),
                                        Forms\Components\Textarea::make('service3_desc_en')->label('Descrição (EN)'),
                                    ]),
                            ]),
                    ]),
                Forms\Components\Grid::make(3)
                    ->schema([
                        Forms\Components\TextInput::make('service1_link')->label('Link Serviço 1')->required(),
                        Forms\Components\TextInput::make('service2_link')->label('Link Serviço 2')->required(),
                        Forms\Components\TextInput::make('service3_link')->label('Link Serviço 3')->required(),
                    ])
            ],

            'servicos_faq' => [
                Forms\Components\Tabs::make('Idioma Seção')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Português (PT)')
                            ->schema([
                                Forms\Components\TextInput::make('badge')->label('Badge (PT)')->required(),
                                Forms\Components\TextInput::make('title')->label('Título Principal (PT)')->required(),
                                Forms\Components\Textarea::make('description')->label('Descrição (PT)')->required(),
                            ]),
                        Forms\Components\Tabs\Tab::make('Inglês (EN)')
                            ->schema([
                                Forms\Components\TextInput::make('badge_en')->label('Badge (EN)'),
                                Forms\Components\TextInput::make('title_en')->label('Título Principal (EN)'),
                                Forms\Components\Textarea::make('description_en')->label('Descrição (EN)'),
                            ]),
                    ]),
                Forms\Components\Repeater::make('faqs')
                    ->label('Perguntas Frequentes (FAQ)')
                    ->schema([
                        Forms\Components\Select::make('category')
                            ->label('Categoria do FAQ')
                            ->options([
                                'Mercado e Estratégia' => 'Mercado e Estratégia',
                                'Tecnologia e Conservação (Veg Oxi 200)' => 'Tecnologia e Conservação (Veg Oxi 200)',
                                'Maquinários e Layout' => 'Maquinários e Layout',
                                'Operação e Qualidade' => 'Operação e Qualidade',
                                'Legislação (SISP-POV)' => 'Legislação (SISP-POV)',
                            ])
                            ->required(),
                        Forms\Components\Tabs::make('Traduções FAQ')
                            ->tabs([
                                Forms\Components\Tabs\Tab::make('Português (PT)')
                                    ->schema([
                                        Forms\Components\TextInput::make('question')->label('Pergunta (PT)')->required(),
                                        Forms\Components\Textarea::make('answer')->label('Resposta (PT)')->required(),
                                    ]),
                                Forms\Components\Tabs\Tab::make('Inglês (EN)')
                                    ->schema([
                                        Forms\Components\TextInput::make('question_en')->label('Pergunta (EN)'),
                                        Forms\Components\Textarea::make('answer_en')->label('Resposta (EN)'),
                                    ]),
                            ]),
                    ])
                    ->collapsible()
                    ->orderable()
                    ->defaultItems(1)
                    ->columnSpanFull()
            ],

            'servicos_clientes' => [
                Forms\Components\Tabs::make('Idioma Seção')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Português (PT)')
                            ->schema([
                                Forms\Components\TextInput::make('badge')->label('Badge (PT)')->required(),
                                Forms\Components\TextInput::make('title')->label('Título (PT)')->required(),
                                Forms\Components\Textarea::make('description')->label('Descrição (PT)')->required(),
                            ]),
                        Forms\Components\Tabs\Tab::make('Inglês (EN)')
                            ->schema([
                                Forms\Components\TextInput::make('badge_en')->label('Badge (EN)'),
                                Forms\Components\TextInput::make('title_en')->label('Título (EN)'),
                                Forms\Components\Textarea::make('description_en')->label('Descrição (EN)'),
                            ]),
                    ]),
                Forms\Components\FileUpload::make('logos')
                    ->label('Logos dos Clientes')
                    ->multiple()
                    ->directory('clientes')
                    ->disk('public')
                    ->image()
                    ->maxSize(102400)
                    ->columnSpanFull(),
            ],

            'servicos_contacts' => [
                Forms\Components\Tabs::make('Idioma Seção')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Português (PT)')
                            ->schema([
                                Forms\Components\Textarea::make('conversar_title')->label('Título Seção (PT)')->required(),
                                Forms\Components\TextInput::make('conversar_p1_title')->label('Pilar 1 Título (PT)')->required(),
                                Forms\Components\Textarea::make('conversar_p1_desc')->label('Pilar 1 Descrição (PT)')->required(),
                                Forms\Components\TextInput::make('conversar_p2_title')->label('Pilar 2 Título (PT)')->required(),
                                Forms\Components\Textarea::make('conversar_p2_desc')->label('Pilar 2 Descrição (PT)')->required(),
                                Forms\Components\TextInput::make('action_box_title')->label('Card Título (PT)')->required(),
                                Forms\Components\Textarea::make('action_box_desc')->label('Card Descrição (PT)')->required(),
                                Forms\Components\TextInput::make('action_box_cta_text')->label('Card CTA Texto (PT)')->required(),
                                Forms\Components\TextInput::make('indicator1_label')->label('Indicador 1 Rótulo (PT)')->required(),
                                Forms\Components\TextInput::make('indicator2_label')->label('Indicador 2 Rótulo (PT)')->required(),
                                Forms\Components\Textarea::make('promo_title')->label('Texto Promocional (PT)')->required(),
                                Forms\Components\TextInput::make('promo_cta_text')->label('Promo CTA Texto (PT)')->required(),
                            ]),
                        Forms\Components\Tabs\Tab::make('Inglês (EN)')
                            ->schema([
                                Forms\Components\Textarea::make('conversar_title_en')->label('Título Seção (EN)'),
                                Forms\Components\TextInput::make('conversar_p1_title_en')->label('Pilar 1 Título (EN)'),
                                Forms\Components\Textarea::make('conversar_p1_desc_en')->label('Pilar 1 Descrição (EN)'),
                                Forms\Components\TextInput::make('conversar_p2_title_en')->label('Pilar 2 Título (EN)'),
                                Forms\Components\Textarea::make('conversar_p2_desc_en')->label('Pilar 2 Descrição (EN)'),
                                Forms\Components\TextInput::make('action_box_title_en')->label('Card Título (EN)'),
                                Forms\Components\Textarea::make('action_box_desc_en')->label('Card Descrição (EN)'),
                                Forms\Components\TextInput::make('action_box_cta_text_en')->label('Card CTA Texto (EN)'),
                                Forms\Components\TextInput::make('indicator1_label_en')->label('Indicador 1 Rótulo (EN)'),
                                Forms\Components\TextInput::make('indicator2_label_en')->label('Indicador 2 Rótulo (EN)'),
                                Forms\Components\Textarea::make('promo_title_en')->label('Texto Promocional (EN)'),
                                Forms\Components\TextInput::make('promo_cta_text_en')->label('Promo CTA Texto (EN)'),
                            ]),
                    ]),
                Forms\Components\Grid::make(3)
                    ->schema([
                        Forms\Components\TextInput::make('action_box_cta_link')->label('Link Card CTA')->required(),
                        Forms\Components\TextInput::make('indicator1_num')->label('Indicador 1 Número')->required(),
                        Forms\Components\TextInput::make('indicator2_num')->label('Indicador 2 Número')->required(),
                        Forms\Components\TextInput::make('promo_cta_link')->label('Link Promo CTA')->required(),
                    ])
            ],

            'veg_oxi_hero' => [
                Forms\Components\Tabs::make('Idioma Seção')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Português (PT)')
                            ->schema([
                                Forms\Components\TextInput::make('title')->label('Título Principal (PT)')->required(),
                                Forms\Components\Textarea::make('subtitle')->label('Subtítulo (PT)')->required(),
                            ]),
                        Forms\Components\Tabs\Tab::make('Inglês (EN)')
                            ->schema([
                                Forms\Components\TextInput::make('title_en')->label('Título Principal (EN)'),
                                Forms\Components\Textarea::make('subtitle_en')->label('Subtítulo (EN)'),
                            ]),
                    ])
            ],

            'veg_oxi_facts' => [
                Forms\Components\Tabs::make('Idioma Seção')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Português (PT)')
                            ->schema([
                                Forms\Components\TextInput::make('badge')->label('Badge (PT)')->required(),
                                Forms\Components\TextInput::make('title')->label('Título Principal (PT)')->required(),
                            ]),
                        Forms\Components\Tabs\Tab::make('Inglês (EN)')
                            ->schema([
                                Forms\Components\TextInput::make('badge_en')->label('Badge (EN)'),
                                Forms\Components\TextInput::make('title_en')->label('Título Principal (EN)'),
                            ]),
                    ]),
                Forms\Components\Repeater::make('cards')
                    ->label('Fatos sobre o Veg Oxi')
                    ->schema([
                        Forms\Components\TextInput::make('icon')->label('Ícone (history, award, factory, settings, etc.)')->required(),
                        Forms\Components\Tabs::make('Traduções Fato')
                            ->tabs([
                                Forms\Components\Tabs\Tab::make('Português (PT)')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')->label('Título Card (PT)')->required(),
                                        Forms\Components\Textarea::make('desc')->label('Descrição Card (PT)')->required(),
                                        Forms\Components\Textarea::make('body')->label('Descrição Modal (PT)')->required(),
                                    ]),
                                Forms\Components\Tabs\Tab::make('Inglês (EN)')
                                    ->schema([
                                        Forms\Components\TextInput::make('title_en')->label('Título Card (EN)'),
                                        Forms\Components\Textarea::make('desc_en')->label('Descrição Card (EN)'),
                                        Forms\Components\Textarea::make('body_en')->label('Descrição Modal (EN)'),
                                    ]),
                            ]),
                    ])
                    ->collapsible()
                    ->orderable()
                    ->defaultItems(3)
                    ->columnSpanFull()
            ],

            'veg_oxi_downloads' => [
                Forms\Components\Tabs::make('Idioma Seção')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Português (PT)')
                            ->schema([
                                Forms\Components\TextInput::make('badge')->label('Badge (PT)')->required(),
                                Forms\Components\TextInput::make('title')->label('Título Principal (PT)')->required(),
                            ]),
                        Forms\Components\Tabs\Tab::make('Inglês (EN)')
                            ->schema([
                                Forms\Components\TextInput::make('badge_en')->label('Badge (EN)'),
                                Forms\Components\TextInput::make('title_en')->label('Título Principal (EN)'),
                            ]),
                    ]),
                Forms\Components\Repeater::make('downloads')
                    ->label('Arquivos para Download')
                    ->schema([
                        Forms\Components\FileUpload::make('file')
                            ->label('Arquivo PDF')
                            ->directory('downloads')
                            ->disk('public')
                            ->maxSize(102400)
                            ->required(),
                        Forms\Components\Tabs::make('Traduções Download')
                            ->tabs([
                                Forms\Components\Tabs\Tab::make('Português (PT)')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')->label('Título Arquivo (PT)')->required(),
                                        Forms\Components\Textarea::make('desc')->label('Descrição Arquivo (PT)')->required(),
                                    ]),
                                Forms\Components\Tabs\Tab::make('Inglês (EN)')
                                    ->schema([
                                        Forms\Components\TextInput::make('title_en')->label('Título Arquivo (EN)'),
                                        Forms\Components\Textarea::make('desc_en')->label('Descrição Arquivo (EN)'),
                                    ]),
                            ]),
                    ])
                    ->collapsible()
                    ->orderable()
                    ->defaultItems(2)
                    ->columnSpanFull()
            ],

            'veg_oxi_contacts' => [
                Forms\Components\Tabs::make('Idioma Seção')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Português (PT)')
                            ->schema([
                                Forms\Components\TextInput::make('badge')->label('Badge (PT)')->required(),
                                Forms\Components\TextInput::make('title')->label('Título Principal (PT)')->required(),
                                Forms\Components\Textarea::make('promo_title')->label('Texto Promocional (PT)')->required(),
                                Forms\Components\TextInput::make('promo_cta_text')->label('Texto Botão CTA (PT)')->required(),
                            ]),
                        Forms\Components\Tabs\Tab::make('Inglês (EN)')
                            ->schema([
                                Forms\Components\TextInput::make('badge_en')->label('Badge (EN)'),
                                Forms\Components\TextInput::make('title_en')->label('Título Principal (EN)'),
                                Forms\Components\Textarea::make('promo_title_en')->label('Texto Promocional (EN)'),
                                Forms\Components\TextInput::make('promo_cta_text_en')->label('Texto Botão CTA (EN)'),
                            ]),
                    ]),
                Forms\Components\Repeater::make('contacts')
                    ->label('Canais de Distribuição / Contatos Regionais')
                    ->schema([
                        Forms\Components\TextInput::make('link')->label('Link do WhatsApp ou Site')->required(),
                        Forms\Components\Tabs::make('Traduções Distribuição')
                            ->tabs([
                                Forms\Components\Tabs\Tab::make('Português (PT)')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')->label('Título Canal (PT)')->required(),
                                        Forms\Components\Textarea::make('desc')->label('Descrição / Contato (PT)')->required(),
                                    ]),
                                Forms\Components\Tabs\Tab::make('Inglês (EN)')
                                    ->schema([
                                        Forms\Components\TextInput::make('title_en')->label('Título Canal (EN)'),
                                        Forms\Components\Textarea::make('desc_en')->label('Descrição / Contato (EN)'),
                                    ]),
                            ]),
                    ])
                    ->collapsible()
                    ->orderable()
                    ->defaultItems(4)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('promo_cta_link')->label('Link Promo CTA')->required(),
            ],

            'insights_hero' => [
                Forms\Components\Tabs::make('Idioma Seção')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Português (PT)')
                            ->schema([
                                Forms\Components\TextInput::make('title')->label('Título Principal (PT)')->required(),
                                Forms\Components\Textarea::make('subtitle')->label('Subtítulo (PT)')->required(),
                            ]),
                        Forms\Components\Tabs\Tab::make('Inglês (EN)')
                            ->schema([
                                Forms\Components\TextInput::make('title_en')->label('Título Principal (EN)'),
                                Forms\Components\Textarea::make('subtitle_en')->label('Subtítulo (EN)'),
                            ]),
                    ])
            ],

            'insights_cards' => [
                Forms\Components\Tabs::make('Idioma Seção')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Português (PT)')
                            ->schema([
                                Forms\Components\TextInput::make('badge')->label('Badge (PT)')->required(),
                                Forms\Components\TextInput::make('title')->label('Título Principal (PT)')->required(),
                            ]),
                        Forms\Components\Tabs\Tab::make('Inglês (EN)')
                            ->schema([
                                Forms\Components\TextInput::make('badge_en')->label('Badge (EN)'),
                                Forms\Components\TextInput::make('title_en')->label('Título Principal (EN)'),
                            ]),
                    ]),
                Forms\Components\Repeater::make('cards')
                    ->label('Cards de Insights')
                    ->schema([
                        Forms\Components\TextInput::make('icon')->label('Ícone (settings, cpu, thermometer, box, etc.)')->required(),
                        Forms\Components\Tabs::make('Traduções Card')
                            ->tabs([
                                Forms\Components\Tabs\Tab::make('Português (PT)')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')->label('Título (PT)')->required(),
                                        Forms\Components\Textarea::make('description')->label('Descrição (PT)')->required(),
                                    ]),
                                Forms\Components\Tabs\Tab::make('Inglês (EN)')
                                    ->schema([
                                        Forms\Components\TextInput::make('title_en')->label('Título (EN)'),
                                        Forms\Components\Textarea::make('description_en')->label('Descrição (EN)'),
                                    ]),
                            ]),
                    ])
                    ->collapsible()
                    ->orderable()
                    ->defaultItems(4)
                    ->columnSpanFull()
            ],

            'insights_why_choose' => [
                Forms\Components\Tabs::make('Idioma Seção')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Português (PT)')
                            ->schema([
                                Forms\Components\TextInput::make('badge')->label('Badge (PT)')->required(),
                                Forms\Components\TextInput::make('title')->label('Título Principal (PT)')->required(),
                                Forms\Components\Textarea::make('description')->label('Descrição (PT)')->required(),
                            ]),
                        Forms\Components\Tabs\Tab::make('Inglês (EN)')
                            ->schema([
                                Forms\Components\TextInput::make('badge_en')->label('Badge (EN)'),
                                Forms\Components\TextInput::make('title_en')->label('Título Principal (EN)'),
                                Forms\Components\Textarea::make('description_en')->label('Descrição (EN)'),
                            ]),
                    ])
            ],

            'home_insights' => [
                Forms\Components\Tabs::make('Idioma Seção')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Português (PT)')
                            ->schema([
                                Forms\Components\TextInput::make('badge')->label('Badge (PT)')->required(),
                                Forms\Components\TextInput::make('title')->label('Título Principal (PT)')->required(),
                                Forms\Components\Textarea::make('description')->label('Descrição Geral (PT)')->required(),
                            ]),
                        Forms\Components\Tabs\Tab::make('Inglês (EN)')
                            ->schema([
                                Forms\Components\TextInput::make('badge_en')->label('Badge (EN)'),
                                Forms\Components\TextInput::make('title_en')->label('Título Principal (EN)'),
                                Forms\Components\Textarea::make('description_en')->label('Descrição Geral (EN)'),
                            ]),
                    ]),
                Forms\Components\Repeater::make('cards')
                    ->label('Cards de Insights')
                    ->schema([
                        Forms\Components\TextInput::make('icon')->label('Ícone (settings, cpu, thermometer, box, etc.)')->required(),
                        Forms\Components\Tabs::make('Traduções Card')
                            ->tabs([
                                Forms\Components\Tabs\Tab::make('Português (PT)')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')->label('Título (PT)')->required(),
                                        Forms\Components\Textarea::make('description')->label('Descrição (PT)')->required(),
                                    ]),
                                Forms\Components\Tabs\Tab::make('Inglês (EN)')
                                    ->schema([
                                        Forms\Components\TextInput::make('title_en')->label('Título (EN)'),
                                        Forms\Components\Textarea::make('description_en')->label('Descrição (EN)'),
                                    ]),
                            ]),
                    ])
                    ->collapsible()
                    ->orderable()
                    ->defaultItems(4)
                    ->columnSpanFull()
            ],

            'home_why_choose' => [
                Forms\Components\Tabs::make('Idioma Seção')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Português (PT)')
                            ->schema([
                                Forms\Components\TextInput::make('badge')->label('Badge (PT)')->required(),
                                Forms\Components\TextInput::make('title')->label('Título Principal (PT)')->required(),
                                Forms\Components\Textarea::make('description')->label('Descrição (PT)')->required(),
                            ]),
                        Forms\Components\Tabs\Tab::make('Inglês (EN)')
                            ->schema([
                                Forms\Components\TextInput::make('badge_en')->label('Badge (EN)'),
                                Forms\Components\TextInput::make('title_en')->label('Título Principal (EN)'),
                                Forms\Components\Textarea::make('description_en')->label('Descrição (EN)'),
                            ]),
                    ])
            ],

            'home_contact_cta' => [
                Forms\Components\Tabs::make('Idioma Seção')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Português (PT)')
                            ->schema([
                                Forms\Components\TextInput::make('badge')->label('Badge (PT)')->required(),
                                Forms\Components\TextInput::make('title')->label('Título Principal (PT)')->required(),
                                Forms\Components\Textarea::make('subtitle')->label('Subtítulo (PT)')->required(),
                                Forms\Components\Textarea::make('address')->label('Endereço Físico (PT)'),
                            ]),
                        Forms\Components\Tabs\Tab::make('Inglês (EN)')
                            ->schema([
                                Forms\Components\TextInput::make('badge_en')->label('Badge (EN)'),
                                Forms\Components\TextInput::make('title_en')->label('Título Principal (EN)'),
                                Forms\Components\Textarea::make('subtitle_en')->label('Subtítulo (EN)'),
                                Forms\Components\Textarea::make('address_en')->label('Endereço Físico (EN)'),
                            ]),
                    ]),
                Forms\Components\Grid::make(2)
                    ->schema([
                        Forms\Components\TextInput::make('phone')->label('Telefone Fixo'),
                        Forms\Components\TextInput::make('whatsapp')->label('WhatsApp'),
                        Forms\Components\TextInput::make('whatsapp_link')->label('Link Direto do WhatsApp')->columnSpanFull(),
                        Forms\Components\TextInput::make('email')->label('E-mail'),
                    ])
            ],

            'home_offering' => [
                Forms\Components\Tabs::make('Idioma Seção')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Português (PT)')
                            ->schema([
                                Forms\Components\TextInput::make('badge')->label('Badge (PT)')->required(),
                                Forms\Components\TextInput::make('title')->label('Título Principal (PT)')->required(),
                                Forms\Components\Textarea::make('description')->label('Subtítulo / Descrição (PT)')->required(),
                            ]),
                        Forms\Components\Tabs\Tab::make('Inglês (EN)')
                            ->schema([
                                Forms\Components\TextInput::make('badge_en')->label('Badge (EN)'),
                                Forms\Components\TextInput::make('title_en')->label('Título Principal (EN)'),
                                Forms\Components\Textarea::make('description_en')->label('Subtítulo / Descrição (EN)'),
                            ]),
                    ]),
                Forms\Components\Repeater::make('cards')
                    ->label('Cards de Serviços (O que Oferecemos)')
                    ->schema([
                        Forms\Components\TextInput::make('icon')->label('Ícone (leaf, graduation-cap, briefcase, shield-check)')->required(),
                        Forms\Components\TextInput::make('link_url')->label('URL do Link')->default('/servicos'),
                        Forms\Components\Tabs::make('Traduções Card')
                            ->tabs([
                                Forms\Components\Tabs\Tab::make('Português (PT)')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')->label('Título Card (PT)')->required(),
                                        Forms\Components\Textarea::make('description')->label('Descrição Card (PT)')->required(),
                                        Forms\Components\TextInput::make('link_text')->label('Texto do Link (PT)')->default('Saiba mais'),
                                    ]),
                                Forms\Components\Tabs\Tab::make('Inglês (EN)')
                                    ->schema([
                                        Forms\Components\TextInput::make('title_en')->label('Título Card (EN)'),
                                        Forms\Components\Textarea::make('description_en')->label('Descrição Card (EN)'),
                                        Forms\Components\TextInput::make('link_text_en')->label('Texto do Link (EN)'),
                                    ]),
                            ]),
                    ])
                    ->collapsible()
                    ->orderable()
                    ->defaultItems(4)
                    ->columnSpanFull()
            ],

            'contato_hero' => [
                Forms\Components\Tabs::make('Idioma Seção')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Português (PT)')
                            ->schema([
                                Forms\Components\TextInput::make('title')->label('Título Principal (PT)')->required(),
                                Forms\Components\Textarea::make('subtitle')->label('Subtítulo (PT)')->required(),
                            ]),
                        Forms\Components\Tabs\Tab::make('Inglês (EN)')
                            ->schema([
                                Forms\Components\TextInput::make('title_en')->label('Título Principal (EN)'),
                                Forms\Components\Textarea::make('subtitle_en')->label('Subtítulo (EN)'),
                            ]),
                    ])
            ],

            'contato_info' => [
                Forms\Components\Tabs::make('Idioma Seção')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Português (PT)')
                            ->schema([
                                Forms\Components\TextInput::make('title')->label('Título Painel (PT)'),
                                Forms\Components\Textarea::make('description')->label('Descrição Painel (PT)'),

                                Forms\Components\Fieldset::make('Canal 1 - Telefone / Atendimento')
                                    ->schema([
                                        Forms\Components\TextInput::make('phone_title')->label('Título Canal 1 (ex: Telefone)'),
                                        Forms\Components\TextInput::make('phone')->label('Número / Contato'),
                                        Forms\Components\TextInput::make('phone_hours')->label('Subtítulo / Horário (PT)'),
                                    ])->columns(3),

                                Forms\Components\Fieldset::make('Canal 2 - WhatsApp / Telegram / SMS')
                                    ->schema([
                                        Forms\Components\TextInput::make('whatsapp_title')->label('Título Canal 2 (ex: WhatsApp, Telegram)'),
                                        Forms\Components\TextInput::make('whatsapp')->label('Número / Link / Contato'),
                                        Forms\Components\TextInput::make('whatsapp_desc')->label('Subtítulo / Descrição (PT)'),
                                    ])->columns(3),

                                Forms\Components\Fieldset::make('Canal 3 - E-mail Comercial')
                                    ->schema([
                                        Forms\Components\TextInput::make('email_title')->label('Título Canal 3 (ex: E-mail Comercial)'),
                                        Forms\Components\TextInput::make('email')->label('Endereço de E-mail'),
                                        Forms\Components\TextInput::make('email_desc')->label('Subtítulo / Descrição (PT)'),
                                    ])->columns(3),
                            ]),
                        Forms\Components\Tabs\Tab::make('Inglês (EN)')
                            ->schema([
                                Forms\Components\TextInput::make('title_en')->label('Título Painel (EN)'),
                                Forms\Components\Textarea::make('description_en')->label('Descrição Painel (EN)'),

                                Forms\Components\Fieldset::make('Canal 1 em Inglês (EN)')
                                    ->schema([
                                        Forms\Components\TextInput::make('phone_title_en')->label('Título Canal 1 em Inglês (ex: Phone)'),
                                        Forms\Components\TextInput::make('phone_hours_en')->label('Subtítulo / Horário (EN)'),
                                    ])->columns(2),

                                Forms\Components\Fieldset::make('Canal 2 em Inglês (EN)')
                                    ->schema([
                                        Forms\Components\TextInput::make('whatsapp_title_en')->label('Título Canal 2 em Inglês (ex: WhatsApp, Telegram)'),
                                        Forms\Components\TextInput::make('whatsapp_desc_en')->label('Subtítulo / Descrição (EN)'),
                                    ])->columns(2),

                                Forms\Components\Fieldset::make('Canal 3 em Inglês (EN)')
                                    ->schema([
                                        Forms\Components\TextInput::make('email_title_en')->label('Título Canal 3 em Inglês (ex: Commercial Email)'),
                                        Forms\Components\TextInput::make('email_desc_en')->label('Subtítulo / Descrição (EN)'),
                                    ])->columns(2),
                            ]),
                        Forms\Components\Tabs\Tab::make('Canais Personalizados (Lista Dinâmica)')
                            ->schema([
                                Forms\Components\Repeater::make('channels')
                                    ->label('Lista Dinâmica de Canais de Contato')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')->label('Título (PT)'),
                                        Forms\Components\TextInput::make('title_en')->label('Título (EN)'),
                                        Forms\Components\TextInput::make('value')->label('Valor / Número / E-mail / Link'),
                                        Forms\Components\TextInput::make('subtitle')->label('Subtítulo / Descrição (PT)'),
                                        Forms\Components\TextInput::make('subtitle_en')->label('Subtítulo / Descrição (EN)'),
                                        Forms\Components\Select::make('icon')
                                            ->label('Ícone (Lucide)')
                                            ->options([
                                                'phone' => 'Telefone (phone)',
                                                'message-circle' => 'WhatsApp / Chat (message-circle)',
                                                'send' => 'Telegram / Enviar (send)',
                                                'mail' => 'E-mail (mail)',
                                                'message-square' => 'SMS / Mensagem (message-square)',
                                                'globe' => 'Website (globe)',
                                                'map-pin' => 'Endereço (map-pin)',
                                                'clock' => 'Horário (clock)',
                                            ])
                                            ->default('message-circle'),
                                    ])
                                    ->columns(2)
                                    ->collapsible()
                                    ->orderable()
                            ]),
                    ]),
            ],

            'contato_form' => [
                Forms\Components\Tabs::make('Idioma Seção')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Português (PT)')
                            ->schema([
                                Forms\Components\TextInput::make('title')->label('Título Formulário (PT)')->required(),
                                Forms\Components\TextInput::make('submit_text')->label('Texto Botão Enviar (PT)')->required(),
                                Forms\Components\TextInput::make('success_title')->label('Título Mensagem Sucesso (PT)')->required(),
                                Forms\Components\Textarea::make('success_message')->label('Texto Mensagem Sucesso (PT)')->required(),
                            ]),
                        Forms\Components\Tabs\Tab::make('Inglês (EN)')
                            ->schema([
                                Forms\Components\TextInput::make('title_en')->label('Título Formulário (EN)'),
                                Forms\Components\TextInput::make('submit_text_en')->label('Texto Botão Enviar (EN)'),
                                Forms\Components\TextInput::make('success_title_en')->label('Título Mensagem Sucesso (EN)'),
                                Forms\Components\Textarea::make('success_message_en')->label('Texto Mensagem Sucesso (EN)'),
                            ]),
                    ])
            ],

            default => [],
        };
    }
}
