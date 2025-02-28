<?php

namespace App\Filament\Widgets;

use App\Models\Autor;
use App\Models\Editora;
use App\Models\LivroDigital;
use App\Models\LivroFisico;
use App\Models\User;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverView extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Usuários', User::query()->count())
            ->description('Usuários do sistema')
            ->descriptionIcon('heroicon-s-user-group', IconPosition::Before)
            ->chart([7, 2, 18, 3, 15, 4, 17])
            ->color('warning'),
            Stat::make('Livros Físicos', LivroDigital::query()->count())
            ->description('Livros Físicos')
            ->descriptionIcon('heroicon-s-bookmark-square', IconPosition::Before)
            ->chart([0,0,2,7,3,10])
            ->color('success'),
            Stat::make('Livros Digitais', LivroFisico::query()->count())
            ->description('Livros Digitais')
            ->descriptionIcon('heroicon-s-book-open')
            ->color('danger'),
        ];
    }
}
