<?php

namespace App\Filament\Resources\ExaminationsResource\Pages;

use App\Filament\Resources\ExaminationsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditExaminations extends EditRecord
{
    protected static string $resource = ExaminationsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
