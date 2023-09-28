<?php

namespace App\Filament\Resources\TrainerTeachingRecordResource\Pages;

use App\Filament\Resources\TrainerTeachingRecordResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTrainerTeachingRecords extends ListRecords
{
    protected static string $resource = TrainerTeachingRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
