<?php

namespace App\Filament\Resources\ProviderResource\Pages;

use App\Filament\Resources\ProviderResource;
use Carbon\Carbon;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateProvider extends CreateRecord
{
    protected static string $resource = ProviderResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['origin'] = 'WEB';
        $data['birthDate'] = Carbon::createFromFormat('d/m/Y', $data['birthDate'])->format('Y-m-d');
        return $data;
    }

    protected function getCreateFormAction(): Action
    {
        return parent::getCreateFormAction()
            ->icon('eos-save');
    }

    protected function getCreateAnotherFormAction(): Action
    {
        return parent::getCreateAnotherFormAction()
            ->icon('eos-save');
    }

    protected function getCancelFormAction(): Action
    {
        return parent::getCancelFormAction()
            ->icon('eos-exit-to-app');
    }
}
