<?php

namespace App\Filament\Staff\Resources\TrainerTeachingRecordResource\Pages;

use App\Filament\Staff\Resources\TrainerTeachingRecordResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageTrainerTeachingRecords extends ManageRecords
{
    protected static string $resource = TrainerTeachingRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
