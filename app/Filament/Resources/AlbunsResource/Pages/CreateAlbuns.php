<?php

namespace App\Filament\Resources\AlbunsResource\Pages;

use App\Filament\Resources\AlbunsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Albuns;

class CreateAlbuns extends CreateRecord
{
    protected static string $resource = AlbunsResource::class;

    /* protected function handleRecordCreation(array $data): Albuns
    {
        // Exibe os dados enviados no formulário
        dd($data);

        // Continue com a criação do registro
        return parent::handleRecordCreation($data);
    } */
}
