<?php

namespace App\Filament\Staff\Resources\MileageClaimResource\Pages;

use App\Filament\Staff\Resources\MileageClaimResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMileageClaim extends ViewRecord
{
    protected static string $resource = MileageClaimResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
