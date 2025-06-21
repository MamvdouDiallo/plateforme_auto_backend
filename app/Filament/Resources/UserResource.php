<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
//use App\Models\Role;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Spatie\Permission\Models\Role;


class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    /*
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }
*/

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informations personnelles')
                    ->schema([
                        Forms\Components\TextInput::make('nom')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('prenom')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('username')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),
                    ])->columns(3),

                Forms\Components\Section::make('Coordonnées')
                    ->schema([
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),

                        Forms\Components\TextInput::make('telephone')
                            ->tel()
                            ->nullable(),
                    ])->columns(2),

                Forms\Components\Section::make('Localisation')
                    ->schema([
                        Forms\Components\TextInput::make('adresse')
                            ->nullable(),

                        Forms\Components\TextInput::make('ville')
                            ->nullable(),

                        Forms\Components\TextInput::make('code_postal')
                            ->nullable(),

                        Forms\Components\TextInput::make('pays')
                            ->nullable(),
                    ])->columns(2),

                Forms\Components\Section::make('Sécurité')
                    ->schema([
                        Forms\Components\TextInput::make('password')
                            ->password()
                            ->required(fn(string $operation): bool => $operation === 'create')
                            ->dehydrated(fn(?string $state): bool => filled($state))
                            ->maxLength(255)
                            ->confirmed(),

                        Forms\Components\TextInput::make('password_confirmation')
                            ->password()
                            ->requiredWith('password')
                            ->maxLength(255),
                    ]),

                     Forms\Components\Select::make('role_id') // Utilisez votre clé étrangère
                ->label('Rôle')
                ->relationship('role', 'libelle') // Relation AU SINGULIER
                ->required()
                ->native(false),
            ]);
    }

    /*

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
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

*/
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nom')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('prenom')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('username')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('email')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('roles.libelle')
                    ->badge()
                    ->color('primary')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('ville')
                    ->options(fn() => User::pluck('ville', 'ville')->unique()),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

        public static function getNavigationBadge(): ?string
        {
            return Static::getModel()::count();
        }



}
