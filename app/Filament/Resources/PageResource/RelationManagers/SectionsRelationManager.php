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
                    ->schema(fn ($record) => self::getSectionSchema($record?->key))
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
                        'hero' => 'Home - Hero / Banner Principal',
                        'product_highlight' => 'Home - Destaque do Produto (Veg Oxi 200)',
                        'about' => 'Home - Sobre Nós (Dra. Roseane Bob)',
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
                        default => ucwords(str_replace('_', ' ', $state)),
                    }),
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
                Forms\Components\Grid::make(2)
                    ->schema([
                        Forms\Components\TextInput::make('badge')
                            ->label('Badge Superior')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('title')
                            ->label('Título Principal')
                            ->helperText('Use tags HTML como <span> para destacar textos se desejar.')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('subtitle')
                            ->label('Subtítulo / Descrição')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('cta_text')
                            ->label('Texto do Botão CTA')
                            ->required(),
                        Forms\Components\TextInput::make('cta_link')
                            ->label('Link do Botão CTA')
                            ->required(),
                        
                        Forms\Components\Section::make('Estatísticas Flutuantes')
                            ->schema([
                                Forms\Components\TextInput::make('stat1_title')
                                    ->label('Título Efeito 1'),
                                Forms\Components\TextInput::make('stat1_desc')
                                    ->label('Subtítulo Efeito 1'),
                                Forms\Components\TextInput::make('stat2_title')
                                    ->label('Título Efeito 2'),
                                Forms\Components\TextInput::make('stat2_desc')
                                    ->label('Subtítulo Efeito 2'),
                            ])->columns(2),

                        Forms\Components\Section::make('Carrossel de Imagens do Hero')
                            ->schema([
                                Forms\Components\FileUpload::make('images')
                                    ->label('Imagens do Slide')
                                    ->multiple()
                                    ->directory('hero')
                                    ->disk('public')
                                    ->image()
                                    ->maxSize(102400)
                                    ->helperText('Selecione 1 ou mais imagens. Elas rotacionarão automaticamente no carrossel do topo. (Max 100MB por imagem)'),
                            ]),
                    ])
            ],

            'product_highlight' => [
                Forms\Components\Grid::make(2)
                    ->schema([
                        Forms\Components\TextInput::make('badge')
                            ->label('Badge')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('title')
                            ->label('Título')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('subtitle')
                            ->label('Subtítulo')
                            ->required()
                            ->columnSpanFull(),
                        
                        Forms\Components\Section::make('Card Verde (Com Veg Oxi 200)')
                            ->schema([
                                Forms\Components\TextInput::make('cost_with')
                                    ->label('Número do Custo')
                                    ->placeholder('Ex: 30'),
                                Forms\Components\TextInput::make('cost_with_unit')
                                    ->label('Unidade do Custo')
                                    ->placeholder('Ex: Cents'),
                                Forms\Components\TextInput::make('cost_with_desc')
                                    ->label('Descrição do Custo')
                                    ->placeholder('Ex: Por Vegetal Fresco'),
                                Forms\Components\TextInput::make('cost_with_tag')
                                    ->label('Etiqueta do Custo')
                                    ->placeholder('Ex: Livre de Sulfitos (Seguro)'),
                            ])->columns(2),

                        Forms\Components\Section::make('Card Vermelho (Sem Veg Oxi 200)')
                            ->schema([
                                Forms\Components\TextInput::make('cost_without')
                                    ->label('Número do Custo')
                                    ->placeholder('Ex: 80'),
                                Forms\Components\TextInput::make('cost_without_unit')
                                    ->label('Unidade do Custo')
                                    ->placeholder('Ex: Cents'),
                                Forms\Components\TextInput::make('cost_without_desc')
                                    ->label('Descrição do Custo')
                                    ->placeholder('Ex: Por Vegetal Oxidado'),
                                Forms\Components\TextInput::make('cost_without_tag')
                                    ->label('Etiqueta do Custo')
                                    ->placeholder('Ex: Com Metabissulfito (Tóxico)'),
                            ])->columns(2),

                        Forms\Components\FileUpload::make('image')
                                    ->label('Imagem Comparativa')
                                    ->image()
                                    ->directory('products')
                                    ->disk('public')
                                    ->maxSize(102400)
                                    ->helperText('Max 100MB.')
                                    ->columnSpanFull(),

                        Forms\Components\TextInput::make('cta_text')
                            ->label('Texto do Botão CTA')
                            ->required(),
                        Forms\Components\TextInput::make('cta_link')
                            ->label('Link do Botão CTA')
                            ->required(),
                    ])
            ],

            'about' => [
                Forms\Components\Grid::make(2)
                    ->schema([
                        Forms\Components\TextInput::make('badge')
                            ->label('Badge')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('title')
                            ->label('Título Principal')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('highlight_text')
                            ->label('Texto em Destaque')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('desc1')
                            ->label('Parágrafo 1')
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('desc2')
                            ->label('Parágrafo 2')
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('desc3')
                            ->label('Parágrafo 3')
                            ->columnSpanFull(),
                        
                        Forms\Components\Section::make('Pilar 1')
                            ->schema([
                                Forms\Components\TextInput::make('feature1_title')
                                    ->label('Título'),
                                Forms\Components\Textarea::make('feature1_desc')
                                    ->label('Descrição'),
                            ])->columns(1),

                        Forms\Components\Section::make('Pilar 2')
                            ->schema([
                                Forms\Components\TextInput::make('feature2_title')
                                    ->label('Título'),
                                Forms\Components\Textarea::make('feature2_desc')
                                    ->label('Descrição'),
                            ])->columns(1),

                        Forms\Components\Textarea::make('desc4')
                            ->label('Parágrafo 4 (Final)')
                            ->columnSpanFull(),

                        Forms\Components\FileUpload::make('image')
                                    ->label('Imagem de Perfil / Ilustrativa')
                                    ->image()
                                    ->directory('about')
                                    ->disk('public')
                                    ->maxSize(102400)
                                    ->helperText('Max 100MB.')
                                    ->columnSpanFull(),

                        Forms\Components\TextInput::make('cta_text')
                            ->label('Texto do Botão CTA')
                            ->required(),
                        Forms\Components\TextInput::make('cta_link')
                            ->label('Link do Botão CTA')
                            ->required(),
                    ])
            ],

            'empresa_hero' => [
                Forms\Components\Grid::make(1)
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Título')
                            ->required(),
                        Forms\Components\Textarea::make('subtitle')
                            ->label('Subtítulo')
                            ->required(),
                    ])
            ],

            'empresa_stats' => [
                Forms\Components\Grid::make(2)
                    ->schema([
                        Forms\Components\TextInput::make('stat_number')
                            ->label('Número / Indicador')
                            ->placeholder('Ex: 25 M')
                            ->required(),
                        Forms\Components\TextInput::make('stat_text')
                            ->label('Descrição do Indicador')
                            ->placeholder('Ex: de Toneladas Salvas do Desperdício')
                            ->required(),
                    ])
            ],

            'empresa_sulfito' => [
                Forms\Components\Grid::make(1)
                    ->schema([
                        Forms\Components\TextInput::make('badge')
                            ->label('Badge')
                            ->required(),
                        Forms\Components\TextInput::make('title')
                            ->label('Título')
                            ->required(),
                        Forms\Components\Textarea::make('description')
                            ->label('Descrição')
                            ->required(),
                        Forms\Components\Section::make('Itens do Checklist')
                            ->schema([
                                Forms\Components\TextInput::make('check1')
                                    ->label('Check 1')
                                    ->required(),
                                Forms\Components\TextInput::make('check2')
                                    ->label('Check 2')
                                    ->required(),
                                Forms\Components\TextInput::make('check3')
                                    ->label('Check 3')
                                    ->required(),
                            ])
                    ])
            ],

            'empresa_frescor' => [
                Forms\Components\Grid::make(2)
                    ->schema([
                        Forms\Components\TextInput::make('badge')
                            ->label('Badge')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('title')
                            ->label('Título Principal')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('highlight_text')
                            ->label('Texto em Destaque')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('description')
                            ->label('Descrição Geral')
                            ->required()
                            ->columnSpanFull(),
                        
                        Forms\Components\FileUpload::make('image')
                                    ->label('Imagem do Lado Direito')
                                    ->image()
                                    ->directory('empresa')
                                    ->disk('public')
                                    ->maxSize(102400)
                                    ->helperText('Max 100MB.')
                                    ->columnSpanFull(),

                        Forms\Components\Section::make('Ponto 1')
                            ->schema([
                                Forms\Components\TextInput::make('feature1_title')
                                    ->label('Título')
                                    ->required(),
                                Forms\Components\Textarea::make('feature1_desc')
                                    ->label('Descrição')
                                    ->required(),
                            ]),
                        Forms\Components\Section::make('Ponto 2')
                            ->schema([
                                Forms\Components\TextInput::make('feature2_title')
                                    ->label('Título')
                                    ->required(),
                                Forms\Components\Textarea::make('feature2_desc')
                                    ->label('Descrição')
                                    ->required(),
                            ]),
                        Forms\Components\Section::make('Ponto 3')
                            ->schema([
                                Forms\Components\TextInput::make('feature3_title')
                                    ->label('Título')
                                    ->required(),
                                Forms\Components\Textarea::make('feature3_desc')
                                    ->label('Descrição')
                                    ->required(),
                            ])->columnSpanFull(),
                    ])
            ],

            'empresa_quem_somos' => [
                Forms\Components\Grid::make(2)
                    ->schema([
                        Forms\Components\TextInput::make('badge')
                            ->label('Badge')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('title')
                            ->label('Título Principal')
                            ->helperText('Pode usar tags HTML como <br> e <span>')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('description1')
                            ->label('Descrição - Parágrafo 1')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('description2')
                            ->label('Descrição - Parágrafo 2')
                            ->required()
                            ->columnSpanFull(),

                        Forms\Components\FileUpload::make('image')
                                    ->label('Imagem da Liderança')
                                    ->image()
                                    ->directory('empresa')
                                    ->disk('public')
                                    ->maxSize(102400)
                                    ->helperText('Max 100MB.')
                                    ->columnSpanFull(),
                        Forms\Components\TextInput::make('image_caption')
                            ->label('Legenda da Imagem')
                            ->columnSpanFull(),

                        Forms\Components\Section::make('Indicadores (Cards Inferiores)')
                            ->schema([
                                Forms\Components\TextInput::make('card1_num')->label('Card 1 - Número'),
                                Forms\Components\TextInput::make('card1_label')->label('Card 1 - Rótulo'),
                                Forms\Components\TextInput::make('card2_num')->label('Card 2 - Número'),
                                Forms\Components\TextInput::make('card2_label')->label('Card 2 - Rótulo'),
                                Forms\Components\TextInput::make('card3_num')->label('Card 3 - Número'),
                                Forms\Components\TextInput::make('card3_label')->label('Card 3 - Rótulo'),
                            ])->columns(2)->columnSpanFull(),
                    ])
            ],

            'servicos_hero' => [
                Forms\Components\Grid::make(1)
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Título')
                            ->required(),
                        Forms\Components\Textarea::make('subtitle')
                            ->label('Subtítulo')
                            ->required(),
                    ])
            ],

            'servicos_catalog' => [
                Forms\Components\Grid::make(2)
                    ->schema([
                        Forms\Components\TextInput::make('badge')
                            ->label('Badge')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('title')
                            ->label('Título Principal')
                            ->required()
                            ->columnSpanFull(),

                        Forms\Components\Section::make('Serviço 1')
                            ->schema([
                                Forms\Components\TextInput::make('service1_badge')->label('Mini Badge')->required(),
                                Forms\Components\TextInput::make('service1_title')->label('Título')->required(),
                                Forms\Components\Textarea::make('service1_desc')->label('Descrição')->required(),
                                Forms\Components\TextInput::make('service1_link')->label('Link do WhatsApp')->required(),
                            ]),
                        
                        Forms\Components\Section::make('Serviço 2')
                            ->schema([
                                Forms\Components\TextInput::make('service2_badge')->label('Mini Badge')->required(),
                                Forms\Components\TextInput::make('service2_title')->label('Título')->required(),
                                Forms\Components\Textarea::make('service2_desc')->label('Descrição')->required(),
                                Forms\Components\TextInput::make('service2_link')->label('Link do WhatsApp')->required(),
                            ]),

                        Forms\Components\Section::make('Serviço 3 (Destaque Grande)')
                            ->schema([
                                Forms\Components\TextInput::make('service3_badge')->label('Mini Badge')->required(),
                                Forms\Components\TextInput::make('service3_title')->label('Título')->required(),
                                Forms\Components\Textarea::make('service3_desc')->label('Descrição')->required(),
                                Forms\Components\TextInput::make('service3_link')->label('Link do Botão')->required(),
                            ])->columnSpanFull(),
                    ])
            ],

            'servicos_faq' => [
                Forms\Components\Grid::make(1)
                    ->schema([
                        Forms\Components\TextInput::make('badge')
                            ->label('Badge')
                            ->required(),
                        Forms\Components\TextInput::make('title')
                            ->label('Título Principal')
                            ->required(),
                        Forms\Components\Textarea::make('description')
                            ->label('Subtítulo / Descrição')
                            ->required(),
                        
                        Forms\Components\Section::make('Lista de Perguntas Frequentes (FAQ)')
                            ->schema([
                                Forms\Components\Repeater::make('faqs')
                                    ->label('FAQ')
                                    ->schema([
                                        Forms\Components\Select::make('category')
                                            ->label('Categoria do FAQ')
                                            ->options([
                                                'Categoria 1: Mercado e Estratégia' => 'Mercado e Estratégia',
                                                'Categoria 2: Tecnologia e Conservação (Veg Oxi 200)' => 'Tecnologia e Conservação (Veg Oxi 200)',
                                                'Categoria 3: Maquinários e Layout' => 'Maquinários e Layout',
                                                'Categoria 4: Operação e Qualidade' => 'Operação e Qualidade',
                                                'Categoria 5: Legislação (SISP-POV)' => 'Legislação (SISP-POV)',
                                            ])
                                            ->required(),
                                        Forms\Components\TextInput::make('question')
                                            ->label('Pergunta')
                                            ->required(),
                                        Forms\Components\Textarea::make('answer')
                                            ->label('Resposta')
                                            ->required(),
                                    ])
                                    ->collapsible()
                                    ->orderable()
                                    ->defaultItems(1)
                                    ->columnSpanFull(),
                            ])
                    ])
            ],

            'servicos_clientes' => [
                Forms\Components\Grid::make(1)
                    ->schema([
                        Forms\Components\TextInput::make('badge')
                            ->label('Badge')
                            ->required(),
                        Forms\Components\TextInput::make('title')
                            ->label('Título')
                            ->required(),
                        Forms\Components\Textarea::make('description')
                            ->label('Descrição')
                            ->required(),
                        
                        Forms\Components\FileUpload::make('logos')
                            ->label('Logos dos Clientes')
                            ->multiple()
                            ->directory('clientes')
                            ->disk('public')
                            ->image()
                            ->maxSize(102400)
                            ->helperText('Carregue os logotipos das cooperativas e marcas clientes. (Max 100MB por imagem)'),
                    ])
            ],

            'servicos_contacts' => [
                Forms\Components\Grid::make(2)
                    ->schema([
                        Forms\Components\Section::make('Painel Esquerdo - Fale Conosco')
                            ->schema([
                                Forms\Components\Textarea::make('conversar_title')
                                    ->label('Título da Seção')
                                    ->helperText('Pode usar tags HTML como <br> e <span>')
                                    ->required(),
                                Forms\Components\TextInput::make('conversar_p1_title')->label('Pilar 1 - Título')->required(),
                                Forms\Components\Textarea::make('conversar_p1_desc')->label('Pilar 1 - Descrição')->required(),
                                Forms\Components\TextInput::make('conversar_p2_title')->label('Pilar 2 - Título')->required(),
                                Forms\Components\Textarea::make('conversar_p2_desc')->label('Pilar 2 - Descrição')->required(),
                            ])->columnSpanFull(),

                        Forms\Components\Section::make('Card Direito - Caixa de Ação')
                            ->schema([
                                Forms\Components\TextInput::make('action_box_title')->label('Título do Card')->required(),
                                Forms\Components\Textarea::make('action_box_desc')->label('Descrição')->required(),
                                Forms\Components\TextInput::make('action_box_cta_text')->label('Texto do Botão CTA')->required(),
                                Forms\Components\TextInput::make('action_box_cta_link')->label('Link do Botão CTA')->required(),
                                Forms\Components\TextInput::make('indicator1_num')->label('Indicador 1 - Número')->required(),
                                Forms\Components\TextInput::make('indicator1_label')->label('Indicador 1 - Descrição')->required(),
                                Forms\Components\TextInput::make('indicator2_num')->label('Indicador 2 - Número')->required(),
                                Forms\Components\TextInput::make('indicator2_label')->label('Indicador 2 - Descrição')->required(),
                            ])->columns(2)->columnSpanFull(),

                        Forms\Components\Section::make('Banner Promocional Superior/Inferior')
                            ->schema([
                                Forms\Components\Textarea::make('promo_title')->label('Texto Promocional')->required(),
                                Forms\Components\TextInput::make('promo_cta_text')->label('Texto do Botão CTA')->required(),
                                Forms\Components\TextInput::make('promo_cta_link')->label('Link do Botão CTA')->required(),
                            ])->columnSpanFull(),
                    ])
            ],

            default => [],
        };
    }
}
