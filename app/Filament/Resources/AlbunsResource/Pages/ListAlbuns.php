<?php

namespace App\Filament\Resources\AlbunsResource\Pages;

use App\Filament\Resources\AlbunsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAlbuns extends ListRecords
{
    protected static string $resource = AlbunsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
