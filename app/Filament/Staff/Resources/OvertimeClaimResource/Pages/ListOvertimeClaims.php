<?php

namespace App\Filament\Staff\Resources\OvertimeClaimResource\Pages;

use App\Filament\Staff\Resources\OvertimeClaimResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOvertimeClaims extends ListRecords
{
    protected static string $resource = OvertimeClaimResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
