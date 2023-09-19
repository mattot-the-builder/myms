<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OvertimeClaimResource\Pages;
use App\Filament\Resources\OvertimeClaimResource\RelationManagers;
use App\Models\OvertimeClaim;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OvertimeClaimResource extends Resource
{
    protected static ?string $model = OvertimeClaim::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';
    protected static ?string $navigationGroup = 'MYMS e-love';

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
                        Forms\Components\TextInput::make('ot_code')
                            ->required()
                            ->numeric(),
                    ])->columns(2),

                Forms\Components\Section::make('Items')
                    ->schema([
                        Forms\Components\Repeater::make('items')
                            ->schema([
                                Forms\Components\DatePicker::make('date')
                                    ->required(),
                                Forms\Components\TimePicker::make('start_time')
                                    ->required(),
                                Forms\Components\TimePicker::make('end_time')
                                    ->required()
                                    ->live()
                                    ->afterStateUpdated(function (Get $get, Set $set) {
                                        $total_hours = Carbon::parse($get('end_time'))->diffInHours(Carbon::parse($get('start_time')));

                                        if ($total_hours >= 8) {
                                            $total_hours -= 1;
                                        }
                                        $set('total_hours', $total_hours);
                                    }),
                                Forms\Components\TextInput::make('details')
                                    ->required()
                                    ->columnSpanFull(),
                                Forms\Components\TextInput::make('total_hours')
                                    ->numeric()
                                    ->readOnly(),
                            ])
                            ->columns(3)
                            ->itemLabel(fn (array $state): ?string => $state['details'] ?? null)
                            ->collapsible()
                            ->columnSpanFull()
                            ->live()
                            ->afterStateUpdated(function (Get $get, Set $set) {
                                $total_hours = 0;
                                foreach ($get('items') as $item) {
                                    $total_hours += $item['total_hours'];
                                }
                                $set('total_hours', $total_hours);

                                $total_claim = $total_hours * $get('ot_code');
                                $set('total_claim', $total_claim);
                            }),

                    ]),

                Forms\Components\TextInput::make('total_hours')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('total_claim')
                    ->required()
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
                Tables\Columns\TextColumn::make('total_hours')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ot_code')
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
            'index' => Pages\ListOvertimeClaims::route('/'),
            'create' => Pages\CreateOvertimeClaim::route('/create'),
            'view' => Pages\ViewOvertimeClaim::route('/{record}'),
            'edit' => Pages\EditOvertimeClaim::route('/{record}/edit'),
        ];
    }
}
