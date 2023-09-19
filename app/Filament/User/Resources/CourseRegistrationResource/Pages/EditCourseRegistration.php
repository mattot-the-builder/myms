<?php

namespace App\Filament\User\Resources\CourseRegistrationResource\Pages;

use App\Filament\User\Resources\CourseRegistrationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCourseRegistration extends EditRecord
{
    protected static string $resource = CourseRegistrationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
