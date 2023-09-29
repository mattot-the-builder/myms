<?php

namespace App\Filament\Staff\Resources;

use App\Filament\Staff\Resources\StaffResource\Pages;
use App\Filament\Staff\Resources\StaffResource\RelationManagers;
use App\Models\Staff;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class StaffResource extends Resource
{
    protected static ?string $model = Staff::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';
    protected static ?string $modelLabel = 'Staff Profile';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', auth()->user()->id);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Personal Details')
                    ->schema([
                        Forms\Components\TextInput::make('user_id')
                            ->default(auth()->user()->id)
                            ->required()
                            ->readOnly(),
                        Forms\Components\Radio::make('gender')
                            ->options([
                                'Male' => 'Male',
                                'Female' => 'Female'
                            ])
                            ->inline()
                            ->columnSpanFull()
                            ->required(),
                        Forms\Components\TextInput::make('name')
                            ->required(),
                        Forms\Components\TextInput::make('age')
                            ->required()
                            ->numeric(),
                        Forms\Components\Textarea::make('address')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('contact')
                            ->numeric()
                            ->maxLength(12)
                            ->minLength(9)
                            ->prefix('+60')
                            ->numeric()
                            ->required(),
                        Forms\Components\DatePicker::make('dob')
                            ->label('Date of Birth')
                            ->required(),
                        Forms\Components\TextInput::make('pob')
                            ->label('Place of Birth')
                            ->required(),
                        Forms\Components\TextInput::make('education')
                            ->required(),
                    ])->columns(2),

                Forms\Components\Section::make('Company Details')
                    ->schema([
                        Forms\Components\Radio::make('staff_status')
                            ->options([
                                'Permanent Staff' => 'Permanent Staff',
                                'Contract Staff' => 'Contract Staff',
                                'Internship' => 'Internship',
                            ])
                            ->inline()
                            ->columnSpanFull()
                            ->required(),
                        Forms\Components\TextInput::make('position')
                            ->required(),
                        Forms\Components\DatePicker::make('start_date_working')
                            ->required(),
                    ])->columns(2),


                Forms\Components\Section::make('Identification Card')
                    ->schema([
                            SpatieMediaLibraryFileUpload::make('front_ic')
                                ->collection('front_ic_collection')
                                ->required(),
                            SpatieMediaLibraryFileUpload::make('back_ic')
                                ->collection('back_ic_collection')
                                ->required(),
                        Forms\Components\TextInput::make('ic_number')
                            ->length(12)
                            ->numeric()
                            ->required(),
                    ])->columns(2),

                Forms\Components\Section::make('Marital Status')
                    ->schema([
                        Forms\Components\TextInput::make('marital_status')
                            ->required()
                            ->columns(2),
                        Forms\Components\TextInput::make('spouse_name'),
                        Forms\Components\TextInput::make('spouse_contact')
                            ->numeric()
                            ->maxLength(12)
                            ->minLength(9)
                            ->prefix('+60'),
                        Forms\Components\TextInput::make('spouse_position'),
                        Forms\Components\TextInput::make('spouse_company'),
                    ])->columns(2),

                Forms\Components\Section::make('Emergency Contact')
                    ->schema([
                        Forms\Components\TextInput::make('emergency_contact')
                            ->numeric()
                            ->maxLength(12)
                            ->minLength(9)
                            ->prefix('+60')
                            ->required(),
                        Forms\Components\TextInput::make('emergency_contact_relationship')
                            ->required(),
                    ])->columns(2),


                Forms\Components\Section::make('Vehicle Details')
                    ->schema([
                        Forms\Components\TextInput::make('vehicle_registration'),
                        Forms\Components\TextInput::make('vehicle_type'),
                        Forms\Components\TextInput::make('vehicle_model'),
                    ])->columns(3),

                Forms\Components\Toggle::make('is_approved')
                    ->required(),
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact')
                    ->searchable(),
                Tables\Columns\TextColumn::make('position')
                    ->searchable(),
                Tables\Columns\TextColumn::make('staff_status')
                    ->label('Status')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('ic_number')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\IconColumn::make('is_approved')
                    ->label('Approved')
                    ->boolean(),
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
            'index' => Pages\ListStaff::route('/'),
            'create' => Pages\CreateStaff::route('/create'),
            'view' => Pages\ViewStaff::route('/{record}'),
            'edit' => Pages\EditStaff::route('/{record}/edit'),
        ];
    }
}
