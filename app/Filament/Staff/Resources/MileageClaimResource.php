<?php

namespace App\Filament\Staff\Resources;

use App\Filament\Staff\Resources\MileageClaimResource\Pages;
use App\Filament\Staff\Resources\MileageClaimResource\RelationManagers;
use App\Models\MileageClaim;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MileageClaimResource extends Resource
{
    protected static ?string $model = MileageClaim::class;

    protected static ?string $navigationIcon = 'heroicon-o-map';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Section::make('Trip Details')
                    ->schema([
                        Forms\Components\TextInput::make('staff_id')
                            ->default(auth()->user()->staff->id)
                            ->readOnly()
                            // ->hidden()
                            ->required(),
                        Forms\Components\DatePicker::make('trip_date')
                            ->required(),
                        Forms\Components\TextInput::make('trip_name')
                            ->required(),
                        Forms\Components\TextInput::make('starting_location')
                            ->required(),
                        Forms\Components\TextInput::make('destination')
                            ->required(),
                    ])->columns(2),

                Forms\Components\Section::make('Claim Details')
                    ->schema([
                        Forms\Components\TextInput::make('mileage')
                            ->required()
                            ->suffix('KM')
                            ->numeric(),
                        Forms\Components\TextInput::make('fuel_cost')
                            ->required()
                            ->prefix('RM')
                            ->numeric(),
                        Forms\Components\TextInput::make('total_claim')
                            ->required()
                            ->prefix('RM')
                            ->numeric(),
                        SpatieMediaLibraryFileUpload::make('mileage_claim')
                            ->label('Attachment')
                            ->columnSpanFull()
                            ->collection('mileage_claims'),
                    ])->columns(2),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('staff.name')
                    ->label('Staff')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('trip_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mileage')
                    ->suffix(' KM')
                    ->searchable(),
                Tables\Columns\TextColumn::make('total_claim')
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
            'index' => Pages\ListMileageClaims::route('/'),
            'create' => Pages\CreateMileageClaim::route('/create'),
            'view' => Pages\ViewMileageClaim::route('/{record}'),
            'edit' => Pages\EditMileageClaim::route('/{record}/edit'),
        ];
    }
}
