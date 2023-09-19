<?php

namespace App\Filament\Staff\Resources\MileageClaimResource\Pages;

use App\Filament\Staff\Resources\MileageClaimResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMileageClaims extends ListRecords
{
    protected static string $resource = MileageClaimResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
