<?php

namespace App\Filament\Resources\MileageClaimResource\Pages;

use App\Filament\Resources\MileageClaimResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMileageClaim extends EditRecord
{
    protected static string $resource = MileageClaimResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
