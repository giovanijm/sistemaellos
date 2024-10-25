<?php

namespace App\Filament\Resources\CustomerResource\Pages;

use App\Filament\Resources\CustomerResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use DateTime;

class ViewCustomer extends ViewRecord
{
    protected static string $resource = CustomerResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['documentNumber'] = match($data['type_document_id']){
            '1' => preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/','$1.$2.$3-$4', preg_replace("/[^0-9]/", "", $data['documentNumber'])),
            '2' => preg_replace('/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/','$1.$2.$3/$4-$5', preg_replace("/[^0-9]/", "", $data['documentNumber'])),
            default => $data['documentNumber'],
        };

        $date = new DateTime($data['birthDate'] );
        $interval = $date->diff( new DateTime( date('Y-m-d') ) );
        $data['customer_age'] =  $interval->format( '%Y anos' );

        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                 ->icon('eos-note-add-o'),
            Actions\EditAction::make()
                ->color('info')
                ->icon('heroicon-c-pencil-square'),
            Actions\DeleteAction::make()
                ->icon('heroicon-o-trash'),
            Actions\Action::make('cancelar')
                ->url(fn (): string => route('filament.admin.resources.customers.index'))
                ->icon('eos-assignment-return-o')
                ->label('Cancelar')
                ->color('gray')
        ];
    }
}
