<?php

namespace App\Filament\Resources\LivroDigitalResource\Pages;

use App\Filament\Resources\LivroDigitalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLivroDigital extends EditRecord
{
    protected static string $resource = LivroDigitalResource::class;

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
