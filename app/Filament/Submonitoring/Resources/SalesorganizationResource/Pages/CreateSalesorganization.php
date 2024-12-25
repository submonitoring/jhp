<?php

namespace App\Filament\Submonitoring\Resources\SalesorganizationResource\Pages;

use App\Filament\Submonitoring\Resources\SalesorganizationResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateSalesorganization extends CreateRecord
{
    protected static string $resource = SalesorganizationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('Back to List')
                ->url($this->getResource()::getUrl('index')),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
