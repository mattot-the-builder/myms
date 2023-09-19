<?php

namespace App\Filament\Resources\OvertimeClaimResource\Pages;

use App\Filament\Resources\OvertimeClaimResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewOvertimeClaim extends ViewRecord
{
    protected static string $resource = OvertimeClaimResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
