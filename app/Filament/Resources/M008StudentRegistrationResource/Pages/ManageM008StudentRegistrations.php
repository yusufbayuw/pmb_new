<?php

namespace App\Filament\Resources\M008StudentRegistrationResource\Pages;

use App\Filament\Resources\M008StudentRegistrationResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageM008StudentRegistrations extends ManageRecords
{
    protected static string $resource = M008StudentRegistrationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
