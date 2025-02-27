<?php

namespace App\Filament\Usuario\Resources\LivroFisicoResource\Pages;

use App\Filament\Usuario\Resources\LivroFisicoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLivroFisicos extends ListRecords
{
    protected static string $resource = LivroFisicoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
