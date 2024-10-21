<?php

namespace App\Filament\Resources\M003MasterPekerjaanResource\Pages;

use App\Filament\Resources\M003MasterPekerjaanResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageM003MasterPekerjaans extends ManageRecords
{
    protected static string $resource = M003MasterPekerjaanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
