<?php

namespace App\Filament\Usuario\Resources\LivroFisicoResource\Pages;

use App\Filament\Usuario\Resources\LivroFisicoResource;
use App\Models\LivroFisico;
use Filament\Resources\Pages\Page;

class BibliotecaFisica extends Page
{
    protected static string $resource = LivroFisicoResource::class;

    protected static string $view = 'filament.usuario.resources.livro-fisico-resource.pages.biblioteca-fisica';

    protected static ?string $navigationIcon = 'heroicon-o-bookmark-square';

    public array $livrosPorGenero = [];

    public function mount()
    {
        $this->livrosPorGenero = LivroFisico::with('genero', 'autor', 'editora')
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
