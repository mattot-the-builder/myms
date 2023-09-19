<?php

namespace App\Filament\User\Resources\CourseRegistrationResource\Pages;

use App\Filament\User\Resources\CourseRegistrationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCourseRegistrations extends ListRecords
{
    protected static string $resource = CourseRegistrationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
