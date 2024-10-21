<?php

namespace App\Filament\Resources\M006MasterGolonganDarahResource\Pages;

use App\Filament\Resources\M006MasterGolonganDarahResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageM006MasterGolonganDarahs extends ManageRecords
{
    protected static string $resource = M006MasterGolonganDarahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
