<?php

namespace App\Filament\Resources\M001MasterGelombangResource\Pages;

use App\Filament\Resources\M001MasterGelombangResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageM001MasterGelombangs extends ManageRecords
{
    protected static string $resource = M001MasterGelombangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
