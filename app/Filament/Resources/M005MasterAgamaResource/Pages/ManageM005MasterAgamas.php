<?php

namespace App\Filament\Resources\M005MasterAgamaResource\Pages;

use App\Filament\Resources\M005MasterAgamaResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageM005MasterAgamas extends ManageRecords
{
    protected static string $resource = M005MasterAgamaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
