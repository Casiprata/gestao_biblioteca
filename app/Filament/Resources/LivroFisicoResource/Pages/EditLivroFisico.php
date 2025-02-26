<?php

namespace App\Filament\Resources\LivroFisicoResource\Pages;

use App\Filament\Resources\LivroFisicoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLivroFisico extends EditRecord
{
    protected static string $resource = LivroFisicoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
