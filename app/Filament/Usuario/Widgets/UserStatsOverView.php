<?php

namespace App\Filament\Usuario\Widgets;

use App\Models\LivroDigital;
use App\Models\LivroFisico;
use App\Models\User;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UserStatsOverView extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Livros Físicos', LivroDigital::query()->count())
            ->description('Livros Físicos')
            ->descriptionIcon('heroicon-s-bookmark-square', IconPosition::Before)
            ->chart([0, 0, 2, 7, 3, 10])
            ->color('success'),
            Stat::make('Livros Digitais', LivroFisico::query()->count())
            ->description('Livros Digitais')
            ->descriptionIcon('heroicon-s-book-open')
            ->chart([10, 0, 2, 7, 3, 10])
            ->color('warning'),
        ];
    }
}
