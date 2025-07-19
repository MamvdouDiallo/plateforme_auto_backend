<?php

namespace App\Filament\Resources;
use Filament\Forms\Components\Hidden; // <-- Ajoute cette ligne
use Illuminate\Support\Str;
use Filament\Tables\Filters\SelectFilter; // <-- Ajoutez cet import en haut du fichier

use App\Filament\Resources\VehiculeResource\Pages;
use App\Filament\Resources\VehiculeResource\RelationManagers;
use App\Models\ModelVehicule;
use App\Models\Vehicule;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;
//use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class VehiculeResource extends Resource
{
    protected static ?string $model = Vehicule::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck';

    // public static function form(Form $form): Form
    // {

    //     return $form
    //     ->schema([
    //          Forms\Components\Section::make('Images du véhicule')
    //             ->schema([
    //                 Forms\Components\FileUpload::make('image1')
    //                     ->label('Image Principale')
    //                     ->image()
    //                     ->directory('vehicules/images')
    //                     ->nullable(),
                        
    //                 Forms\Components\FileUpload::make('image2')
    //                     ->label('Image 2')
    //                     ->image()
    //                     ->directory('vehicules/images')
    //                     ->nullable(),
                        
    //                 Forms\Components\FileUpload::make('image3')
    //                     ->label('Image 3')
    //                     ->image()
    //                     ->directory('vehicules/images')
    //                     ->nullable(),
                        
    //                 Forms\Components\FileUpload::make('image4')
    //                     ->label('Image 4')
    //                     ->image()
    //                     ->directory('vehicules/images')
    //                     ->nullable(),
                        
    //                 Forms\Components\FileUpload::make('image5')
    //                     ->label('Image 5')
    //                     ->image()
    //                     ->directory('vehicules/images')
    //                     ->nullable(),
    //             ])
    //             ->columns(2), 
  
    //             Forms\Components\Fieldset::make('Informations techniques du véhicule')
    //                 ->schema([
    //                     Forms\Components\TextInput::make('libelle')
    //                         ->label('Nom du véhicule')
    //                         ->maxLength(255),

    //                     Forms\Components\TextInput::make('version')
    //                         ->maxLength(255),

    //                     Forms\Components\TextInput::make('etat')
    //                         ->maxLength(255),

    //                     Forms\Components\TextInput::make('kilometrage')
    //                         ->maxLength(255),

    //                     Forms\Components\TextInput::make('prix')
    //                         ->required()
    //                         ->numeric()
    //                         ->default(0),
    //                 ]),
    //             Forms\Components\Fieldset::make('Caractéristiques mécaniques')
    //                 ->schema([
    //                     Forms\Components\TextInput::make('type_transmission')
    //                         ->label('Transmission')
    //                         ->maxLength(255),

    //                     Forms\Components\TextInput::make('type_carburant')
    //                         ->label('Type de carburant')
    //                         ->maxLength(255),

    //                     Forms\Components\TextInput::make('traction')
    //                         ->label('Traction')
    //                         ->maxLength(255),

    //                     Forms\Components\TextInput::make('type_conduite')
    //                         ->label('Type de conduite')
    //                         ->maxLength(255),
    //                 ]),
    //             Forms\Components\Fieldset::make('Capacité du véhicule')
    //                 ->schema([
    //                     Forms\Components\TextInput::make('nombre_porte')
    //                         ->label('Nombre de portes')
    //                         ->required()
    //                         ->numeric()
    //                         ->default(0),

    //                     Forms\Components\TextInput::make('nombre_place')
    //                         ->label('Nombre de places')
    //                         ->required()
    //                         ->numeric()
    //                         ->default(0),
    //                 ]),

    //             Forms\Components\Fieldset::make('Options & équipements')
    //                 ->schema([
    //                     Forms\Components\TextInput::make('option_interieur')
    //                         ->label('Options intérieures')
    //                         ->maxLength(255),

    //                     Forms\Components\TextInput::make('option_exterieur')
    //                         ->label('Options extérieures')
    //                         ->maxLength(255),

    //                     Forms\Components\TextInput::make('option_security')
    //                         ->label('Sécurité')
    //                         ->maxLength(255),

    //                     Forms\Components\TextInput::make('option_radio')
    //                         ->label('Radio')
    //                         ->maxLength(255),

    //                     Forms\Components\TextInput::make('autre_option')
    //                         ->label('Autres options')
    //                         ->maxLength(255),
    //                 ]),

    //             Forms\Components\Fieldset::make('Liens avec d’autres entités')
    //                 ->schema([
    //                     Forms\Components\Select::make('marque_id')
    //                         ->label('Marque')
    //                         ->relationship('marque', 'libelle') // Supposons que 'nom' est le champ à afficher
    //                         ->required()
    //                         ->searchable()
    //                         ->preload()
    //                         ->live()
    //                         ->afterStateUpdated(function (Forms\Set $set) {
    //                             $set('model_vehicule_id', null); // Réinitialise le modèle quand la marque change
    //                         }),

    //                     Forms\Components\Select::make('model_vehicule_id')
    //                         ->label('Modèle')
    //                         ->relationship('modele', 'libelle') // Supposons que 'nom' est le champ à afficher
    //                         ->required()
    //                         ->searchable()
    //                         ->preload(),


    //                     Forms\Components\Select::make('category_id')
    //                         ->label('Catégorie')
    //                         ->relationship('categorie', 'libelle') // Supposons que 'nom' est le champ à afficher
    //                         ->required()
    //                         ->searchable()
    //                         ->preload(),
    //                 ]),
    //         ]);
    // }

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Forms\Components\Section::make('Images du véhicule')
                ->schema([
                    Forms\Components\FileUpload::make('image1')
                        ->label('Image Principale')
                        ->image()
                        ->directory('vehicules/images')
                        ->nullable(),
                        
                    Forms\Components\FileUpload::make('image2')
                        ->label('Image 2')
                        ->image()
                        ->directory('vehicules/images')
                        ->nullable(),
                        
                    Forms\Components\FileUpload::make('image3')
                        ->label('Image 3')
                        ->image()
                        ->directory('vehicules/images')
                        ->nullable(),
                        
                    Forms\Components\FileUpload::make('image4')
                        ->label('Image 4')
                        ->image()
                        ->directory('vehicules/images')
                        ->nullable(),
                        
                    Forms\Components\FileUpload::make('image5')
                        ->label('Image 5')
                        ->image()
                        ->directory('vehicules/images')
                        ->nullable(),

                        Forms\Components\FileUpload::make('image6')
                        ->label('Image 6')
                        ->image()
                        ->directory('vehicules/images')
                        ->nullable(),

                        Forms\Components\FileUpload::make('image7')
                        ->label('Image 7')
                        ->image()
                        ->directory('vehicules/images')
                        ->nullable(),

                        Forms\Components\FileUpload::make('image8')
                        ->label('Image 8')
                        ->image()
                        ->directory('vehicules/images')
                        ->nullable(),

                        Forms\Components\FileUpload::make('image9')
                        ->label('Image 9')
                        ->image()
                        ->directory('vehicules/images')
                        ->nullable(),

                        Forms\Components\FileUpload::make('image10')
                        ->label('Image 10')
                        ->image()
                        ->directory('vehicules/images')
                        ->nullable(),

                        Forms\Components\FileUpload::make('image11')
                        ->label('Image 11')
                        ->image()
                        ->directory('vehicules/images')
                        ->nullable(),

                        Forms\Components\FileUpload::make('image12')
                        ->label('Image 12')
                        ->image()
                        ->directory('vehicules/images')
                        ->nullable(),
                ])
                ->columns(2), 
  
            Forms\Components\Fieldset::make('Informations générales du véhicule')
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
                        
                    Forms\Components\TextInput::make('vin')
                        ->label('Numéro VIN')
                        ->maxLength(255),
                        
                    Forms\Components\TextInput::make('color')
                        ->label('Couleur'),
                        
                    Forms\Components\TextInput::make('year')
                        ->label('Année')
                        ->numeric()
                        ->minValue(1900)
                        ->maxValue(now()->year),
                ]),
                
            Forms\Components\Fieldset::make('Caractéristiques techniques')
                ->schema([
                    Forms\Components\TextInput::make('size')
                        ->label('Taille/Dimensions'),
                        
                    Forms\Components\TextInput::make('condition')
                        ->label('Condition générale'),
                        
                    Forms\Components\TextInput::make('engine')
                        ->label('Moteur'),
                        
                    Forms\Components\TextInput::make('cylinders')
                        ->label('Nombre de cylindres')
                        ->numeric(),
                        
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

            Forms\Components\Fieldset::make('Description et documents')
                ->schema([
                    Forms\Components\Textarea::make('description')
                        ->label('Description détaillée')
                        ->columnSpanFull(),
                        
                    Forms\Components\FileUpload::make('technical_sheet')
                        ->label('Fiche technique')
                        ->directory('vehicules/images')
                        ->acceptedFileTypes(['application/pdf']),
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

            Forms\Components\Fieldset::make('Liens avec d\'autres entités')
                ->schema([
                    Forms\Components\Select::make('marque_id')
                        ->label('Marque')
                        ->relationship('marque', 'libelle')
                        ->required()
                        ->searchable()
                        ->preload()
                        ->live()
                        ->afterStateUpdated(function (Forms\Set $set) {
                            $set('model_vehicule_id', null);
                        }),

                    Forms\Components\Select::make('model_vehicule_id')
                        ->label('Modèle')
                        ->relationship('modele', 'libelle')
                        ->required()
                        ->searchable()
                        ->preload(),

                    Forms\Components\Select::make('category_id')
                        ->label('Catégorie')
                        ->relationship('categorie', 'libelle')
                        ->required()
                        ->searchable()
                        ->preload(),
                ]),
        ]);
}
public static function afterCreate(Model $record, array $data): void
{
    if (isset($data['images_paths'])) {
        foreach ($data['images_paths'] as $path) {
            $record->images()->create(['path' => $path]);
        }
    }
}

public static function mutateFormDataBeforeSave(array $data): array
{
    // Stocke les chemins des images dans 'images_paths'
    if (isset($data['images'])) {
        $data['images_paths'] = $data['images'];
        unset($data['images']); // Évite l'erreur "parameterize()"
    }
    return $data;
}





    // public static function table(Table $table): Table
    // {
    //     return $table
    //         ->columns([
    //         // Colonne pour afficher la première image
    //         Tables\Columns\ImageColumn::make('image1')
    //             ->label('Image Principale')
    //             ->size(40),
    //             Tables\Columns\TextColumn::make('type_transmission')
    //                 ->searchable(),
    //             Tables\Columns\TextColumn::make('libelle')
    //                 ->searchable(),
    //             Tables\Columns\TextColumn::make('etat')
    //                 ->searchable(),
    //             Tables\Columns\TextColumn::make('type_carburant')
    //                 ->searchable(),
    //             Tables\Columns\TextColumn::make('type_conduite')
    //                 ->searchable(),
    //             Tables\Columns\TextColumn::make('version')
    //                 ->searchable(),
    //             Tables\Columns\TextColumn::make('nombre_porte')
    //                 ->numeric()
    //                 ->sortable(),
    //             Tables\Columns\TextColumn::make('nombre_place')
    //                 ->numeric()
    //                 ->sortable(),
    //             Tables\Columns\TextColumn::make('traction')
    //                 ->searchable(),
    //             Tables\Columns\TextColumn::make('option_interieur')
    //                 ->searchable(),
    //             Tables\Columns\TextColumn::make('option_exterieur')
    //                 ->searchable(),
    //             Tables\Columns\TextColumn::make('option_security')
    //                 ->searchable(),
    //             Tables\Columns\TextColumn::make('option_radio')
    //                 ->searchable(),
    //             Tables\Columns\TextColumn::make('autre_option')
    //                 ->searchable(),
    //             Tables\Columns\TextColumn::make('kilometrage')
    //                 ->searchable(),
    //             Tables\Columns\TextColumn::make('prix')
    //                 ->numeric()
    //                 ->sortable(),
    //             Tables\Columns\TextColumn::make('modele.libelle')
    //                 ->label('Modèle')
    //                 ->sortable(),

    //             Tables\Columns\TextColumn::make('marque.libelle')
    //                 ->label('Marque')
    //                 ->sortable(),

    //             Tables\Columns\TextColumn::make('categorie.libelle')
    //                 ->label('Catégorie')
    //                 ->sortable(),
    //             Tables\Columns\TextColumn::make('created_at')
    //                 ->dateTime()
    //                 ->sortable()
    //                 ->toggleable(isToggledHiddenByDefault: true),
    //             Tables\Columns\TextColumn::make('updated_at')
    //                 ->dateTime()
    //                 ->sortable()
    //                 ->toggleable(isToggledHiddenByDefault: true),
    //         ])
    //         ->filters([
    //             //
    //         ])
    //         ->actions([
    //             Tables\Actions\EditAction::make(),
    //             Tables\Actions\DeleteAction::make(),
    //             Tables\Actions\ViewAction::make(),
    //         ])
    //         ->bulkActions([
    //             Tables\Actions\BulkActionGroup::make([
    //                 Tables\Actions\DeleteBulkAction::make(),
    //             ]),
    //         ]);

    //     info("Tentative de  d'1 ");
    // }
    public static function table(Table $table): Table
{
    return $table
        ->columns([
            // Colonne pour afficher la première image
            Tables\Columns\ImageColumn::make('image1')
                ->label('Image')
                ->size(40),
                
            Tables\Columns\TextColumn::make('libelle')
                ->searchable()
                ->sortable()
                ->label('Nom'),
                
            Tables\Columns\TextColumn::make('marque.libelle')
                ->label('Marque')
                ->sortable(),
                
            Tables\Columns\TextColumn::make('modele.libelle')
                ->label('Modèle')
                ->sortable(),
                
            Tables\Columns\TextColumn::make('year')
                ->label('Année')
                ->sortable()
                ->toggleable(),
                
            Tables\Columns\TextColumn::make('color')
                ->label('Couleur')
                ->searchable()
                ->toggleable(),
                
            Tables\Columns\TextColumn::make('prix')
                ->numeric()
                ->sortable()
                ->money('EUR'), // Adaptez la devise
                
            Tables\Columns\TextColumn::make('kilometrage')
                ->label('Km')
                ->numeric()
                ->sortable()
                ->toggleable(),
                
            Tables\Columns\TextColumn::make('etat')
                ->searchable()
                ->toggleable(),
                
            Tables\Columns\TextColumn::make('condition')
                ->label('Condition')
                ->searchable()
                ->toggleable(),
                
            Tables\Columns\TextColumn::make('engine')
                ->label('Moteur')
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true),
                
            Tables\Columns\TextColumn::make('cylinders')
                ->label('Cylindres')
                ->numeric()
                ->toggleable(isToggledHiddenByDefault: true),
                
            Tables\Columns\TextColumn::make('vin')
                ->label('VIN')
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true),
                
            Tables\Columns\TextColumn::make('type_transmission')
                ->label('Transmission')
                ->toggleable(),
                
            Tables\Columns\TextColumn::make('type_carburant')
                ->label('Carburant')
                ->toggleable(),
                
            Tables\Columns\TextColumn::make('categorie.libelle')
                ->label('Catégorie')
                ->toggleable(isToggledHiddenByDefault: true),
                
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
            // Vous pouvez ajouter des filtres pour les nouveaux champs ici
            SelectFilter::make('year')
                ->options(fn () => range(2000, date('Y')))
                ->label('Année'),
                
            SelectFilter::make('color')
                ->options([
                    'Noir' => 'Noir',
                    'Blanc' => 'Blanc',
                    'Rouge' => 'Rouge',
                    'Bleu' => 'Bleu',
                    'Vert' => 'Vert',
                    'Jaune' => 'Jaune',
                    'Orange' => 'Orange',
                    'Violet' => 'Violet',
                    'Gris' => 'Gris',
                    'Argent' => 'Argent',
                ]),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListVehicules::route('/'),
            'create' => Pages\CreateVehicule::route('/create'),
            'edit' => Pages\EditVehicule::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }


}
