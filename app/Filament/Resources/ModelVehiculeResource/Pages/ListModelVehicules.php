<?php

namespace App\Filament\Resources\ModelVehiculeResource\Pages;

use App\Filament\Resources\ModelVehiculeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListModelVehicules extends ListRecords
{
    protected static string $resource = ModelVehiculeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
