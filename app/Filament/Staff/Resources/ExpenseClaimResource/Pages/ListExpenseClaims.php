<?php

namespace App\Filament\Staff\Resources\ExpenseClaimResource\Pages;

use App\Filament\Staff\Resources\ExpenseClaimResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListExpenseClaims extends ListRecords
{
    protected static string $resource = ExpenseClaimResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
