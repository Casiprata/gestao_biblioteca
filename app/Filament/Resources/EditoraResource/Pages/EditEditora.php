<?php

namespace App\Filament\Resources\EditoraResource\Pages;

use App\Filament\Resources\EditoraResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEditora extends EditRecord
{
    protected static string $resource = EditoraResource::class;

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
