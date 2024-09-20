<?php

namespace App\Filament\Resources\MusicasResource\Pages;

use App\Filament\Resources\MusicasResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMusicas extends ListRecords
{
    protected static string $resource = MusicasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
