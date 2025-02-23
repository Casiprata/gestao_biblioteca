<?php

namespace App\Filament\Resources\EditoraResource\Pages;

use App\Filament\Resources\EditoraResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEditoras extends ListRecords
{
    protected static string $resource = EditoraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
