<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SaberResource\Pages;
use App\Filament\Resources\SaberResource\RelationManagers;
use App\Models\Saber;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
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

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('titulo')
                    ->label('Título')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('descripcion')
                    ->label('Descripción')
                    ->maxLength(65535)
                    ->autosize()
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
                Select::make('formato')
                    ->label('Formato')
                    ->options([
                        'Articulos' => 'Articulos',
                        'Video' => 'Video',
                        'Manuales' => 'Manuales',
                        'Entrevistas' => 'Entrevistas'
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
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('titulo')
                    ->searchable()
                    ->label('Título'),
                TextColumn::make('descripcion')
                    ->searchable()
                    ->label('Descripción')
                    ->wrap(),
                TextColumn::make('areaTematica.nombre')
                    ->searchable()
                    ->sortable()
                    ->label('Área temática'),
                TextColumn::make('formato')
                    ->searchable()
                    ->sortable()
                    ->label('Formato'),
                TextColumn::make('palabras_clave')
                    ->searchable()
                    ->label('Palabras clave')
                    ->badge()
                    ->separator(','),
            ])
            ->filters([
                SelectFilter::make('area_tematica_id')
                    ->label('Área temática')
                    ->options(
                        fn(): array => \App\Models\AreaTematica::pluck('nombre', 'id')->toArray(),
                    ),
                SelectFilter::make('formato')
                    ->label('Formato')
                    ->options([
                        'Articulos' => 'Articulos',
                        'Video' => 'Video',
                        'Manuales' => 'Manuales',
                        'Entrevistas' => 'Entrevistas'
                    ]),

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
