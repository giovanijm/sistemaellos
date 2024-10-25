<?php

namespace App\Filament\Resources\RegisterCustomerResource\Pages;

use App\Filament\Resources\RegisterCustomerResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Carbon\Carbon;

class CreateRegisterCustomer extends CreateRecord
{
    protected static string $resource = RegisterCustomerResource::class;

    protected function mutateFormDataBeforeCreate($data): array
    {
        dd($data);

        $data['start_date'] = Carbon::createFromFormat('d/m/Y', $data['start_date'])->format('Y-m-d');
        $data['end_date'] = Carbon::createFromFormat('d/m/Y', $data['end_date'])->format('Y-m-d');
        return $data;
    }
}
