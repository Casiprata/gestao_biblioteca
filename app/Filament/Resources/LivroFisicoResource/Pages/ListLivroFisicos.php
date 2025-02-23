<?php

namespace App\Filament\Resources\LivroFisicoResource\Pages;

use App\Filament\Resources\LivroFisicoResource;
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
