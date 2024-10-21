<?php

namespace App\Filament\Resources\M002MasterPendidikanResource\Pages;

use App\Filament\Resources\M002MasterPendidikanResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageM002MasterPendidikans extends ManageRecords
{
    protected static string $resource = M002MasterPendidikanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
