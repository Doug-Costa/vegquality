<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Filament\Resources\ArticleResource\RelationManagers;
use App\Models\Article;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Radar FLV';

    protected static ?string $modelLabel = 'Artigo (Radar FLV)';

    protected static ?string $pluralModelLabel = 'Radar FLV';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(12)
                    ->schema([
                        // Coluna Principal (Conteúdo)
                        Forms\Components\Grid::make(1)
                            ->columnSpan(8)
                            ->schema([
                                Forms\Components\Section::make('Conteúdo do Artigo')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->label('Título do Artigo')
                                            ->required()
                                            ->maxLength(255)
                                            ->live(onBlur: true)
                                            ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => 
                                                $operation === 'create' ? $set('slug', \Illuminate\Support\Str::slug($state)) : null
                                            ),
                                        Forms\Components\TextInput::make('slug')
                                            ->label('Slug / URL do Artigo')
                                            ->required()
                                            ->maxLength(255)
                                            ->prefix('/radar/')
                                            ->unique(Article::class, 'slug', ignoreRecord: true),
                                        Forms\Components\Textarea::make('excerpt')
                                            ->label('Resumo (Excerpt)')
                                            ->placeholder('Escreva uma breve introdução que aparecerá nos cards do Radar FLV...')
                                            ->rows(3)
                                            ->columnSpanFull(),
                                        Forms\Components\RichEditor::make('content')
                                            ->label('Corpo do Artigo')
                                            ->required()
                                            ->columnSpanFull(),
                                    ])
                            ]),

                        // Coluna Lateral (Configurações)
                        Forms\Components\Grid::make(1)
                            ->columnSpan(4)
                            ->schema([
                                Forms\Components\Section::make('Status & Agendamento')
                                    ->schema([
                                        Forms\Components\Select::make('status')
                                            ->label('Status de Publicação')
                                            ->options([
                                                'draft' => 'Rascunho',
                                                'published' => 'Publicado',
                                            ])
                                            ->default('draft')
                                            ->required(),
                                        Forms\Components\DateTimePicker::make('published_at')
                                            ->label('Data de Publicação')
                                            ->default(now())
                                            ->helperText('Agende definindo uma data/hora futura.'),
                                    ]),

                                Forms\Components\Section::make('Mídia')
                                    ->schema([
                                        Forms\Components\FileUpload::make('cover_image')
                                            ->label('Imagem de Capa')
                                            ->image()
                                            ->directory('articles')
                                            ->disk('public')
                                            ->maxSize(102400)
                                            ->helperText('Max 100MB.'),
                                    ]),

                                Forms\Components\Section::make('Autoria & Categorização')
                                    ->schema([
                                        Forms\Components\Select::make('columnist_id')
                                            ->label('Colunista')
                                            ->relationship('columnist', 'name')
                                            ->searchable()
                                            ->preload()
                                            ->createOptionForm([
                                                Forms\Components\TextInput::make('name')
                                                    ->label('Nome Completo')
                                                    ->required()
                                                    ->maxLength(255)
                                                    ->live(onBlur: true)
                                                    ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => 
                                                        $operation === 'create' ? $set('slug', \Illuminate\Support\Str::slug($state)) : null
                                                    ),
                                                Forms\Components\TextInput::make('slug')
                                                    ->label('Slug')
                                                    ->required()
                                                    ->maxLength(255)
                                                    ->unique('columnists', 'slug'),
                                                Forms\Components\TextInput::make('role')
                                                    ->label('Cargo / Título')
                                                    ->maxLength(255),
                                                Forms\Components\FileUpload::make('avatar')
                                                    ->label('Foto de Perfil')
                                                    ->image()
                                                    ->directory('columnists')
                                                    ->disk('public')
                                                    ->maxSize(102400)
                                                    ->helperText('Max 100MB.'),
                                                Forms\Components\Textarea::make('bio')
                                                    ->label('Biografia')
                                                    ->rows(3)
                                                    ->maxLength(500),
                                            ])
                                            ->placeholder('Selecione ou crie um colunista')
                                            ->helperText('Clique em + para adicionar um colunista inline.'),

                                        Forms\Components\TextInput::make('author_name')
                                            ->label('Autor Estático (Fallback)')
                                            ->placeholder('Ex: Roseane Bob')
                                            ->helperText('Usado apenas se nenhum colunista for selecionado.')
                                            ->maxLength(255),

                                        Forms\Components\Select::make('category')
                                            ->label('Categoria')
                                            ->options([
                                                'Legislação' => 'Legislação',
                                                'Tecnologia' => 'Tecnologia',
                                                'Regulatório' => 'Regulatório',
                                                'Planejamento' => 'Planejamento',
                                                'Geral' => 'Geral',
                                            ])
                                            ->default('Geral')
                                            ->required(),

                                        Forms\Components\TagsInput::make('tags')
                                            ->label('Tags')
                                            ->placeholder('Adicionar tag...')
                                            ->separator(','),
                                    ]),
                            ]),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('cover_image')
                    ->label('Capa')
                    ->disk('public')
                    ->square(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Título')
                    ->searchable()
                    ->sortable()
                    ->limit(40),
                Tables\Columns\TextColumn::make('columnist.name')
                    ->label('Colunista')
                    ->searchable()
                    ->sortable()
                    ->default(fn ($record) => $record->author_name ?: 'Roseane Bob'),
                Tables\Columns\TextColumn::make('category')
                    ->label('Categoria')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'draft' => 'gray',
                        'published' => 'success',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('published_at')
                    ->label('Publicado / Agendado')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'draft' => 'Rascunho',
                        'published' => 'Publicado',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
