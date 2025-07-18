<?php

namespace App\Filament\Resources\BlogsResource\Pages;

use App\Filament\Resources\BlogsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBlogs extends CreateRecord
{
    protected static string $resource = BlogsResource::class;
    protected function mutateFormDataBeforeCreate(array $data):array
    {
        $data['user_id'] = auth()->user()->id;
        return $data;
    }
}
