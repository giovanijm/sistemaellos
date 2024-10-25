<?php

namespace App\Filament\Resources\CustomerResource\Pages;

use App\Filament\Resources\CustomerResource;
use Filament\Actions;
use Filament\Resources\Pages\Page;
use Illuminate\Contracts\Support\Htmlable;

class MedicalRecordCustomers extends Page
{
    //use InteractsWithRecord;
    protected static string $resource = CustomerResource::class;

    protected static string $view = 'filament.resources.customer-resource.pages.medical-record-customers';

    public function getHeading(): string
    {
        return __('Custom Page Heading');
    }

    public function getTitle(): string | Htmlable
    {
        return __('Prontuário Médico');
    }

    public function getSubheading(): ?string
    {
        return __('Custom Page Subheading');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('cancelar')
                ->url(fn (): string => route('filament.admin.resources.customers.index'))
                ->icon('eos-assignment-return-o')
                ->label('Cancelar')
                ->color('gray')
        ];
    }
}
