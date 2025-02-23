<?php

namespace App\Filament\Resources\LivroDigitalResource\Pages;

use App\Filament\Resources\LivroDigitalResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLivroDigital extends CreateRecord
{
    protected static string $resource = LivroDigitalResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
