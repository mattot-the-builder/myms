<?php

namespace App\Filament\Staff\Resources;

use App\Filament\Staff\Resources\TrainerTeachingRecordResource\Pages;
use App\Filament\Staff\Resources\TrainerTeachingRecordResource\RelationManagers;
use App\Models\TrainerTeachingRecord;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TrainerTeachingRecordResource extends Resource
{
    protected static ?string $model = TrainerTeachingRecord::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('course_id')
                    ->relationship('course', 'name')
                    ->required(),
                Forms\Components\TextInput::make('user_id')
                    ->default(auth()->user()->id)
                    ->readOnly()
                    ->required(),
                Forms\Components\DateTimePicker::make('clock_in')
                    ->required(),
                Forms\Components\DateTimePicker::make('clock_out')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('course.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Trainer')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('clock_in')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('clock_out')
                    ->dateTime()
                    ->sortable(),
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
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageTrainerTeachingRecords::route('/'),
        ];
    }
}
