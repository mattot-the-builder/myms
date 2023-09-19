<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\CourseRegistrationResource\Pages;
use App\Filament\User\Resources\CourseRegistrationResource\RelationManagers;
use App\Models\Course;
use App\Models\CourseRegistration;
use Filament\Forms;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CourseRegistrationResource extends Resource
{
    protected static ?string $model = CourseRegistration::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Wizard::make([
                    Wizard\Step::make('Select Course')
                        ->schema([

                            Forms\Components\Select::make('course_id')
                                ->label('Course Name')
                                ->relationship('course', 'name')
                                ->preload()
                                ->searchable()
                                ->live()
                                ->afterStateUpdated(function (Get $get, Set $set) {
                                    if ($get('course_id')) {
                                        $set('name', Course::find($get('course_id'))->name);
                                        $set('fee', Course::find($get('course_id'))->fee);
                                        $set('contents', Course::find($get('course_id'))->contents);
                                        $set('date', Course::find($get('course_id'))->date);
                                        $set('started_at', Course::find($get('course_id'))->started_at);
                                        $set('ended_at', Course::find($get('course_id'))->ended_at);
                                    } else {
                                        $set('name', null);
                                        $set('fee', null);
                                        $set('contents', null);
                                        $set('date', null);
                                        $set('started_at', null);
                                        $set('ended_at', null);
                                    }
                                })
                                ->required(),

                            Forms\Components\Section::make('Course Details')
                                ->schema([
                                    Forms\Components\TextInput::make('name')
                                        ->readOnly(),
                                    Forms\Components\TextInput::make('fee')
                                        ->readOnly()
                                        ->prefix('RM')
                                        ->numeric(),
                                    Forms\Components\DatePicker::make('date')
                                        ->readOnly(),
                                    Forms\Components\TextInput::make('started_at')
                                        ->readOnly(),
                                    Forms\Components\TextInput::make('ended_at')
                                        ->readOnly(),
                                ])->columns(3),
                        ]),

                    Wizard\Step::make('Registration Details')
                        ->schema([
                            Forms\Components\Section::make('Personal Details')
                                ->schema([
                                    Forms\Components\Select::make('user_id')
                                        ->relationship('user', 'name')
                                        ->required(),
                                    Forms\Components\TextInput::make('name')
                                        ->required(),
                                    Forms\Components\TextInput::make('ic_number')
                                        ->required(),
                                    Forms\Components\TextInput::make('contact')
                                        ->required(),
                                    Forms\Components\TextInput::make('address')
                                        ->required(),
                                ])->columns(2),
                            Forms\Components\Section::make('Work Details')
                                ->schema([
                                    Forms\Components\TextInput::make('company_name')
                                        ->required(),
                                    Forms\Components\TextInput::make('position')
                                        ->required(),
                                    Forms\Components\TextInput::make('competency')
                                        ->required(),
                                    Forms\Components\Toggle::make('is_sponsored')
                                        ->required(),
                                ])->columns(2)
                        ]),

                ])->columnSpanFull(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('course.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ic_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact')
                    ->searchable(),
                Tables\Columns\TextColumn::make('company_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_sponsored')
                    ->boolean(),
                Tables\Columns\TextColumn::make('competency')
                    ->searchable(),
                Tables\Columns\TextColumn::make('position')
                    ->searchable(),
                Tables\Columns\TextColumn::make('payment_id')
                    ->searchable(),
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

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Registration Details')
                    ->schema([
                        TextEntry::make('name'),
                        TextEntry::make('course.name'),
                        TextEntry::make('ic_number'),
                        TextEntry::make('contact'),
                        TextEntry::make('address'),
                        TextEntry::make('payment_id'),
                    ])->columns(2),

                Section::make('Work Details')
                    ->schema([
                        TextEntry::make('company_name'),
                        TextEntry::make('position'),
                        TextEntry::make('competency'),
                        IconEntry::make('is_sponsored')
                            ->boolean(),
                    ])->columns(2)
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
            'index' => Pages\ListCourseRegistrations::route('/'),
            'create' => Pages\CreateCourseRegistration::route('/create'),
            'view' => Pages\ViewCourseRegistration::route('/{record}'),
            'edit' => Pages\EditCourseRegistration::route('/{record}/edit'),
        ];
    }
}
