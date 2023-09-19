<?php

namespace App\Filament\Staff\Resources\OvertimeClaimResource\Pages;

use App\Filament\Staff\Resources\OvertimeClaimResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOvertimeClaim extends EditRecord
{
    protected static string $resource = OvertimeClaimResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
