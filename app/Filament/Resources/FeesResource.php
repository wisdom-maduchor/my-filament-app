<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FeesResource\Pages;
use App\Filament\Resources\FeesResource\RelationManagers;
use App\Models\Fees;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FeesResource extends Resource
{
    protected static ?string $model = fees::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('student_id')
                    // ->relationship('student', 'first_name')
                    ->required(),
                Forms\Components\TextInput::make('amount')->numeric()->required(),
                Forms\Components\DatePicker::make('payment_date')->required(),
                Forms\Components\TextInput::make('payment_method'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('student.first_name')->label('Student'),
                Tables\Columns\TextColumn::make('amount'),
                Tables\Columns\TextColumn::make('payment_date')->date(),
                Tables\Columns\TextColumn::make('payment_method'),
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
            'index' => Pages\ListFees::route('/'),
            'create' => Pages\CreateFees::route('/create'),
            'edit' => Pages\EditFees::route('/{record}/edit'),
        ];
    }
}
