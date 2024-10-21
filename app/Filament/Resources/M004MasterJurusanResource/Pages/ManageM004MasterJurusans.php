<?php

namespace App\Filament\Resources\M004MasterJurusanResource\Pages;

use App\Filament\Resources\M004MasterJurusanResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageM004MasterJurusans extends ManageRecords
{
    protected static string $resource = M004MasterJurusanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
