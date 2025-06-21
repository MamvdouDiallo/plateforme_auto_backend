<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VehiculeResource\Pages;
use App\Filament\Resources\VehiculeResource\RelationManagers;
use App\Models\Vehicule;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VehiculeResource extends Resource
{
    protected static ?string $model = Vehicule::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Fieldset::make('Images du véhicule')
                    ->schema([
                        Forms\Components\FileUpload::make('images')
                            ->label('Ajouter des images')
                            ->multiple()
                          //  ->enableReordering()
                            ->image()
                            ->preserveFilenames()
                            ->maxSize(5120)
                            ->directory('vehicules/images')
                           // ->enableOpen()
                           // ->enableDownload()
                          //  ->enablePreview()
                            ->helperText('Déposez ici plusieurs images du véhicule.'),
                    ])->columnSpanFull(),

                Forms\Components\Fieldset::make('Informations techniques du véhicule')
                    ->schema([
                        Forms\Components\TextInput::make('libelle')
                            ->label('Nom du véhicule')
                            ->maxLength(255),

                        Forms\Components\TextInput::make('version')
                            ->maxLength(255),

                        Forms\Components\TextInput::make('etat')
                            ->maxLength(255),

                        Forms\Components\TextInput::make('kilometrage')
                            ->maxLength(255),

                        Forms\Components\TextInput::make('prix')
                            ->required()
                            ->numeric()
                            ->default(0),
                    ]),

                Forms\Components\Fieldset::make('Caractéristiques mécaniques')
                    ->schema([
                        Forms\Components\TextInput::make('type_transmission')
                            ->label('Transmission')
                            ->maxLength(255),

                        Forms\Components\TextInput::make('type_carburant')
                            ->label('Type de carburant')
                            ->maxLength(255),

                        Forms\Components\TextInput::make('traction')
                            ->label('Traction')
                            ->maxLength(255),

                        Forms\Components\TextInput::make('type_conduite')
                            ->label('Type de conduite')
                            ->maxLength(255),
                    ]),

                Forms\Components\Fieldset::make('Capacité du véhicule')
                    ->schema([
                        Forms\Components\TextInput::make('nombre_porte')
                            ->label('Nombre de portes')
                            ->required()
                            ->numeric()
                            ->default(0),

                        Forms\Components\TextInput::make('nombre_place')
                            ->label('Nombre de places')
                            ->required()
                            ->numeric()
                            ->default(0),
                    ]),

                Forms\Components\Fieldset::make('Options & équipements')
                    ->schema([
                        Forms\Components\TextInput::make('option_interieur')
                            ->label('Options intérieures')
                            ->maxLength(255),

                        Forms\Components\TextInput::make('option_exterieur')
                            ->label('Options extérieures')
                            ->maxLength(255),

                        Forms\Components\TextInput::make('option_security')
                            ->label('Sécurité')
                            ->maxLength(255),

                        Forms\Components\TextInput::make('option_radio')
                            ->label('Radio')
                            ->maxLength(255),

                        Forms\Components\TextInput::make('autre_option')
                            ->label('Autres options')
                            ->maxLength(255),
                    ]),

                Forms\Components\Fieldset::make('Liens avec d’autres entités')
                    ->schema([
                        Forms\Components\TextInput::make('model_vehicule_id')
                            ->label('Modèle')
                            ->required()
                            ->numeric(),

                        Forms\Components\Select::make('marque_id')
                            ->relationship('marque', 'id')
                            ->label('Marque')
                            ->required(),

                        Forms\Components\TextInput::make('category_id')
                            ->label('Catégorie')
                            ->required()
                            ->numeric(),
                    ]),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type_transmission')
                    ->searchable(),
                Tables\Columns\TextColumn::make('libelle')
                    ->searchable(),
                Tables\Columns\TextColumn::make('etat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type_carburant')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type_conduite')
                    ->searchable(),
                Tables\Columns\TextColumn::make('version')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nombre_porte')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nombre_place')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('traction')
                    ->searchable(),
                Tables\Columns\TextColumn::make('option_interieur')
                    ->searchable(),
                Tables\Columns\TextColumn::make('option_exterieur')
                    ->searchable(),
                Tables\Columns\TextColumn::make('option_security')
                    ->searchable(),
                Tables\Columns\TextColumn::make('option_radio')
                    ->searchable(),
                Tables\Columns\TextColumn::make('autre_option')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kilometrage')
                    ->searchable(),
                Tables\Columns\TextColumn::make('prix')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('model_vehicule_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('marque.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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
            'index' => Pages\ListVehicules::route('/'),
            'create' => Pages\CreateVehicule::route('/create'),
            'edit' => Pages\EditVehicule::route('/{record}/edit'),
        ];
    }

            public static function getNavigationBadge(): ?string
        {
            return Static::getModel()::count();
        }
}
