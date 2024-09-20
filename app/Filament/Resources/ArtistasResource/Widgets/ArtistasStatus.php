<?php

namespace App\Filament\Resources\ArtistasResource\Widgets;

use App\Models\Artistas;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ArtistasStatus extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total de Artistas Cadastradas', Artistas::query()->count())
        ];
    }
}
