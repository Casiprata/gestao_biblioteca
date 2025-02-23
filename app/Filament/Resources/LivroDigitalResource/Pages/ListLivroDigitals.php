<?php

namespace App\Filament\Resources\LivroDigitalResource\Pages;

use App\Filament\Resources\LivroDigitalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLivroDigitals extends ListRecords
{
    protected static string $resource = LivroDigitalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
