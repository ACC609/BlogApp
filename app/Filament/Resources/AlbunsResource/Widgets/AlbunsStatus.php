<?php

namespace App\Filament\Resources\AlbunsResource\Widgets;

use App\Models\Albuns;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AlbunsStatus extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total de Albums Cadastradas', Albuns::query()->count())
        ];
    }
}
