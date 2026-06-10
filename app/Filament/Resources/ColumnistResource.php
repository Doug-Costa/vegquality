<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ColumnistResource\Pages;
use App\Models\Columnist;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class ColumnistResource extends Resource
{
    protected static ?string $model = Columnist::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $modelLabel = 'Colunista';
    protected static ?string $pluralModelLabel = 'Colunistas';
    protected static ?string $navigationGroup = 'Radar FLV';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nome Completo')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => 
                                $operation === 'create' ? $set('slug', Str::slug($state)) : null
                            ),
                        Forms\Components\TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(Columnist::class, 'slug', ignoreRecord: true),
                        Forms\Components\TextInput::make('role')
                            ->label('Cargo / Título')
                            ->placeholder('Ex: Especialista em Higienização de FLV')
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
                            ->placeholder('Escreva uma breve biografia do colunista...')
                            ->rows(4)
                            ->maxLength(1000)
                            ->columnSpanFull(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('avatar')
                    ->label('Foto')
                    ->disk('public')
                    ->circular(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nome')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('role')
                    ->label('Cargo / Título')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('articles_count')
                    ->label('Artigos')
                    ->counts('articles')
                    ->badge()
                    ->color('info'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Cadastrado em')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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
            'index' => Pages\ListColumnists::route('/'),
            'create' => Pages\CreateColumnist::route('/create'),
            'edit' => Pages\EditColumnist::route('/{record}/edit'),
        ];
    }
}
