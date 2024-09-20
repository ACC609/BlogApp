<?php

namespace App\Filament\Resources\MusicasResource\Widgets;

use App\Models\Musicas;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class MusicasStatus extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total de Musicas Cadastradas', Musicas::query()->count())
        ];
    }
}
