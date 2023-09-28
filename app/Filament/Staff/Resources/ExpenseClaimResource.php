<?php

namespace App\Filament\Staff\Resources;

use App\Filament\Staff\Resources\ExpenseClaimResource\Pages;
use App\Filament\Staff\Resources\ExpenseClaimResource\RelationManagers;
use App\Models\ExpenseClaim;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Get;
use Filament\Forms\Set;

class ExpenseClaimResource extends Resource
{
    protected static ?string $model = ExpenseClaim::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('metadata')
                    ->schema([
                        Forms\Components\Select::make('staff_id')
                            ->relationship('staff', 'name')
                            ->required(),
                        Forms\Components\Select::make('status')
                            ->options([
                                'approved' => 'Approved',
                                'pending' => 'Pending',
                                'rejected' => 'Rejected',
                                'claimed' => 'Claimed'
                            ])
                            ->required(),
                    ])->columns(2),
                Forms\Components\Section::make('Items')
                    ->schema([
                        Forms\Components\Repeater::make('items')
                            ->schema([
                                Forms\Components\DatePicker::make('date')
                                    ->required(),
                                Forms\Components\TextInput::make('amount')
                                    ->required()
                                    ->numeric(),
                                Forms\Components\TextInput::make('details')
                                    ->required()
                                    ->columnSpanFull(),
                                SpatieMediaLibraryFileUpload::make('expense_item')
                                    ->label('Attachment')
                                    ->collection('expense_items')
                                    ->columnSpanFull(),
                            ])
                            ->columns(2)
                            ->itemLabel(fn (array $state): ?string => $state['details'] ?? null)
                            ->collapsible()
                            ->columnSpanFull()
                            ->live()
                            ->afterStateUpdated(function (Get $get, Set $set) {
                                $total_claim = 0;
                                foreach ($get('items') as $item) {
                                    $total_claim += $item['amount'];
                                }
                                $set('total_claim', $total_claim);
                            }),

                    ]),
                Forms\Components\TextInput::make('total_claim')
                    ->required()
                    ->readOnly()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('staff.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_claim')
                    ->numeric()
                    ->money('myr')
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'claimed' => 'gray',
                        'approved' => 'success',
                        'rejected' => 'danger',
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListExpenseClaims::route('/'),
            'create' => Pages\CreateExpenseClaim::route('/create'),
            'view' => Pages\ViewExpenseClaim::route('/{record}'),
            'edit' => Pages\EditExpenseClaim::route('/{record}/edit'),
        ];
    }
}
