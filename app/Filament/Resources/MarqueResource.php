<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MarqueResource\Pages;
use App\Filament\Resources\MarqueResource\RelationManagers;
use App\Models\Marque;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MarqueResource extends Resource
{
    protected static ?string $model = Marque::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\FileUpload::make('logo')
                ->required()
                ->image()
                ->directory('vehicules/images'),
            Forms\Components\TextInput::make('libelle')
                ->required()
                ->maxLength(255)
                ->unique(ignoreRecord: true),
            Forms\Components\MarkdownEditor::make('description')
                ->nullable()
                ->columnSpanFull(),
        ]);
}

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('logo')->disk('public')->circular(),
                Tables\Columns\TextColumn::make('libelle')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
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
            'index' => Pages\ListMarques::route('/'),
            'create' => Pages\CreateMarque::route('/create'),
            'edit' => Pages\EditMarque::route('/{record}/edit'),
        ];
    }

        public static function getNavigationBadge(): ?string
        {
            return Static::getModel()::count();
        }
}
