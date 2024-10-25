<?php

namespace App\Filament\Resources\ProviderResource\Pages;

use App\Filament\Resources\ProviderResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Carbon\Carbon;

class CreateProvider extends CreateRecord
{
    protected static string $resource = ProviderResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {

        $data['origin'] = 'WEB';
        $data['birthDate'] = Carbon::createFromFormat('d/m/Y', $data['birthDate'])->format('Y-m-d');
        return $data;
    }
}
