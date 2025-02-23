<?php

namespace App\Filament\Resources\LivroFisicoResource\Pages;

use App\Filament\Resources\LivroFisicoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLivroFisico extends CreateRecord
{
    protected static string $resource = LivroFisicoResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
