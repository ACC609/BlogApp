<?php

namespace App\Filament\Resources\ArtistasResource\Pages;

use App\Filament\Resources\ArtistasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditArtistas extends EditRecord
{
    protected static string $resource = ArtistasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
