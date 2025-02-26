<?php

namespace App\Filament\Usuario\Resources\LivroDigitalResource\Pages;

use App\Filament\Usuario\Resources\LivroDigitalResource;
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
}
