<?php

namespace App\Filament\Usuario\Resources\LivroFisicoResource\Pages;

use App\Filament\Usuario\Resources\LivroFisicoResource;
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
