<?php

namespace App\Filament\Resources\MusicasResource\Pages;

use App\Filament\Resources\MusicasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMusicas extends EditRecord
{
    protected static string $resource = MusicasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
