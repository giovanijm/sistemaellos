<?php

namespace App\Filament\Resources\TypeGenderResource\Pages;

use App\Filament\Resources\TypeGenderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTypeGender extends EditRecord
{
    protected static string $resource = TypeGenderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->icon('heroicon-o-trash'),
        ];
    }
}
