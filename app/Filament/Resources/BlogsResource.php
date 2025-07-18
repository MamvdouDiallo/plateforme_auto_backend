<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogsResource\Pages;
use App\Filament\Resources\BlogsResource\RelationManagers;
use App\Models\Blog;
use App\Models\Blogs;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BlogsResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('image')
                    ->label('Image')
                    ->image()
                    ->directory('vehicules/images'),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\RichEditor::make('description')
                    ->label('Description détaillée')
                    ->columnSpanFull(),
                Forms\Components\Select::make('tags')
                    ->multiple()  // Permet de sélectionner plusieurs tags
                    ->relationship('tags', 'name')  // 'tags' est la relation, et 'name' est l'attribut à afficher
                    ->required(),
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Image')
                    ->size(40),
                Tables\Columns\TextColumn::make('title')
                    ->limit(50)
                    ->tooltip(fn ($record) => $record->title)
                    ->searchable()
                    ->sortable()
                    ->label('Titre'),
                Tables\Columns\TextColumn::make('tags')
                    ->formatStateUsing(function ($record) {
                        return implode(', ', $record->tags->pluck('name')->toArray());
                    })
                    ->limit(50)
                    ->searchable()
                    ->sortable()
                    ->label('Tags'),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlogs::route('/create'),
            'edit' => Pages\EditBlogs::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return Static::getModel()::count();
    }
}
