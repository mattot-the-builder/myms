<?php

namespace App\Filament\Staff\Resources\StaffResource\Pages;

use App\Filament\Staff\Resources\StaffResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStaff extends EditRecord
{
    protected static string $resource = StaffResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
