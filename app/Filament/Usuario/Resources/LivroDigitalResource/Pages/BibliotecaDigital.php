<?php

namespace App\Filament\Usuario\Resources\LivroDigitalResource\Pages;

use App\Filament\Usuario\Resources\LivroDigitalResource;
use App\Models\LivroDigital;
use Filament\Resources\Pages\Page;

class BibliotecaDigital extends Page
{
    protected static string $resource = LivroDigitalResource::class;

    protected static string $view = 'filament.usuario.resources.livro-digital-resource.pages.biblioteca-digital';
    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    public array $livrosPorGenero = [];

    public function mount()
    {
        $this->livrosPorGenero = LivroDigital::with('genero', 'autor', 'editora')
            ->get()
            ->groupBy(fn($livro) => $livro->genero->nome ?? 'Sem Gênero')
            ->toArray();
    }

    protected function getViewData(): array
    {
        return [
            'livrosPorGenero' => $this->livrosPorGenero,
        ];
    }

}
