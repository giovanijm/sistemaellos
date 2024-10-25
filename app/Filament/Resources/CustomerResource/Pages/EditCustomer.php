<?php

namespace App\Filament\Resources\CustomerResource\Pages;

use App\Filament\Resources\CustomerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Carbon\Carbon;

class EditCustomer extends EditRecord
{
    protected static string $resource = CustomerResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['documentNumber'] = match($data['type_document_id']){
            '1' => preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/','$1.$2.$3-$4', preg_replace("/[^0-9]/", "", $data['documentNumber'])),
            '2' => preg_replace('/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/','$1.$2.$3/$4-$5', preg_replace("/[^0-9]/", "", $data['documentNumber'])),
            default => $data['documentNumber'],
        };

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['documentNumber'] = match($data['type_document_id']){
            '1', '2' => preg_replace("/[^0-9]/", "", $data['documentNumber']),
            default => $data['documentNumber'],
        };

        $data['birthDate'] = Carbon::createFromFormat('d/m/Y', $data['birthDate'])->format('Y-m-d');

        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->icon('heroicon-o-trash'),
        ];
    }
}
