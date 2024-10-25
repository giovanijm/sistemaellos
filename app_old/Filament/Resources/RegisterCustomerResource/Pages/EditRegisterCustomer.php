<?php

namespace App\Filament\Resources\RegisterCustomerResource\Pages;

use App\Filament\Resources\RegisterCustomerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Carbon\Carbon;

class EditRegisterCustomer extends EditRecord
{
    protected static string $resource = RegisterCustomerResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['start_date'] = Carbon::createFromFormat('d/m/Y', $data['start_date'])->format('Y-m-d');
        $data['end_date'] = Carbon::createFromFormat('d/m/Y', $data['end_date'])->format('Y-m-d');
        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
