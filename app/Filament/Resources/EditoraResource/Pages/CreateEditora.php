<?php

namespace App\Filament\Resources\EditoraResource\Pages;

use App\Filament\Resources\EditoraResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEditora extends CreateRecord
{
    protected static string $resource = EditoraResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
