<?php

namespace App\Filament\Resources\TrainerTeachingRecordResource\Pages;

use App\Filament\Resources\TrainerTeachingRecordResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTrainerTeachingRecord extends EditRecord
{
    protected static string $resource = TrainerTeachingRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
