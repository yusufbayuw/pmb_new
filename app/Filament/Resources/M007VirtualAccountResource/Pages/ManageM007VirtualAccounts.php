<?php

namespace App\Filament\Resources\M007VirtualAccountResource\Pages;

use App\Filament\Resources\M007VirtualAccountResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageM007VirtualAccounts extends ManageRecords
{
    protected static string $resource = M007VirtualAccountResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
