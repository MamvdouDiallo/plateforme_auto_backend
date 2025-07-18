<?php

namespace App\Filament\Resources\VehiculeResource\Pages;

use App\Filament\Resources\VehiculeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVehicule extends EditRecord
{
    protected static string $resource = VehiculeResource::class;

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
