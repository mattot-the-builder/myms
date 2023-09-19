<?php

namespace App\Filament\Staff\Resources\ExpenseClaimResource\Pages;

use App\Filament\Staff\Resources\ExpenseClaimResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditExpenseClaim extends EditRecord
{
    protected static string $resource = ExpenseClaimResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
