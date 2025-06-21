<?php

namespace App\Filament\Resources\ModelVehiculeResource\Pages;

use App\Filament\Resources\ModelVehiculeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditModelVehicule extends EditRecord
{
    protected static string $resource = ModelVehiculeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

            protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}
}
