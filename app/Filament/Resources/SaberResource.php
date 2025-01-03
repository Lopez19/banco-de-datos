<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SaberResource\Pages;
use App\Filament\Resources\SaberResource\RelationManagers;
use App\Models\Saber;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Components\Tables\CuratorColumn;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SaberResource extends Resource
{
    protected static ?string $model = Saber::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationLabel = 'Saberes';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('titulo')
                    ->label('Título')
                    ->required(),
                TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->helperText('genere con el siguiente formato: "titulo-del-saber"'),
                RichEditor::make('descripcion')
                    ->label('Descripción')
                    ->required()
                    ->columnSpanFull(),
                Select::make('area_tematica_id')
                    ->label('Área temática')
                    ->relationship('areaTematica', 'nombre')
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        TextInput::make('nombre')
                            ->label('Nombre')
                            ->maxLength(255)
                            ->required(),
                    ])
                    ->required(),
                Select::make('format_id')
                    ->label('Formato')
                    ->relationship('format', 'nombre')
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        TextInput::make('nombre')
                            ->label('Nombre')
                            ->maxLength(255)
                            ->required(),
                    ])
                    ->required(),
                TextInput::make('palabras_clave')
                    ->label('Palabras clave')
                    ->required()
                    ->helperText('Separar palabras clave con comas'),
                TextInput::make('autor')
                    ->label('Autor')
                    ->required(),
                TextInput::make('enlace_adicional')
                    ->url()
                    ->nullable()
                    ->label('Enlace adicional'),
                CuratorPicker::make('media_id')
                    ->label('Archivo')
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('titulo')
                    ->searchable()
                    ->label('Título'),
                TextColumn::make('areaTematica.nombre')
                    ->searchable()
                    ->sortable()
                    ->label('Área temática'),
                TextColumn::make('format.nombre')
                    ->searchable()
                    ->sortable()
                    ->label('Formato'),
                TextColumn::make('palabras_clave')
                    ->searchable()
                    ->label('Palabras clave')
                    ->badge()
                    ->separator(','),
                CuratorColumn::make('media_id')
                    ->label('Archivo')
                    ->size(40),
            ])
            ->filters([
                SelectFilter::make('area_tematica_id')
                    ->label('Área temática')
                    ->options(
                        fn(): array => \App\Models\AreaTematica::pluck('nombre', 'id')->toArray(),
                    ),
                SelectFilter::make('format_id')
                    ->label('Formato')
                    ->options(
                        fn(): array => \App\Models\Format::pluck('nombre', 'id')->toArray(),
                    ),

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListSabers::route('/'),
            'create' => Pages\CreateSaber::route('/create'),
            'edit' => Pages\EditSaber::route('/{record}/edit'),
        ];
    }
}
