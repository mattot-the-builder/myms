<?php

namespace App\Filament\Staff\Resources\ExpenseClaimResource\Pages;

use App\Filament\Staff\Resources\ExpenseClaimResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewExpenseClaim extends ViewRecord
{
    protected static string $resource = ExpenseClaimResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
