<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExaminationsResource\Pages;
use App\Filament\Resources\ExaminationsResource\RelationManagers;
use App\Models\Examinations;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ExaminationsResource extends Resource
{
    protected static ?string $model = Examinations::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('class_section_id')
                    // ->relationship('classSection', 'name')
                    ->required(),
                Forms\Components\Select::make('subject_id')
                    // ->relationship('subject', 'name')
                    ->required(),
                Forms\Components\TextInput::make('exam_name')->required(),
                Forms\Components\DatePicker::make('exam_date')->required(),
                Forms\Components\TimePicker::make('start_time'),
                Forms\Components\TimePicker::make('end_time'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('exam_name'),
                Tables\Columns\TextColumn::make('classSection.name')->label('Class'),
                Tables\Columns\TextColumn::make('subject.name')->label('Subject'),
                Tables\Columns\TextColumn::make('exam_date')->date(),
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListExaminations::route('/'),
            'create' => Pages\CreateExaminations::route('/create'),
            'edit' => Pages\EditExaminations::route('/{record}/edit'),
        ];
    }
}
