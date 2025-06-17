<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ModelVehiculeResource\Pages;
use App\Filament\Resources\ModelVehiculeResource\RelationManagers;
use App\Models\ModelVehicule;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

//use Filament\Resources\Resource;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components;

class ModelVehiculeResource extends Resource
{
    protected static ?string $model = ModelVehicule::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('libelle')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),

                Forms\Components\Textarea::make('description')
                    ->nullable()
                    ->columnSpanFull(),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Components\Section::make('Informations du modèle')
                    ->schema([
                        Components\TextEntry::make('libelle')
                            ->label('Modèle'),

                        Components\TextEntry::make('description')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('libelle')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('description')
                    ->limit(50)
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),

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
            'index' => Pages\ListModelVehicules::route('/'),
            'create' => Pages\CreateModelVehicule::route('/create'),
            'edit' => Pages\EditModelVehicule::route('/{record}/edit'),
        ];
    }
}
