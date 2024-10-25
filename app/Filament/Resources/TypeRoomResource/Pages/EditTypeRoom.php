<?php

namespace App\Filament\Resources\TypeRoomResource\Pages;

use App\Filament\Resources\TypeRoomResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTypeRoom extends EditRecord
{
    protected static string $resource = TypeRoomResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
