<?php

namespace App\Filament\Resources\AlbunsResource\Pages;

use App\Filament\Resources\AlbunsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAlbuns extends EditRecord
{
    protected static string $resource = AlbunsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
