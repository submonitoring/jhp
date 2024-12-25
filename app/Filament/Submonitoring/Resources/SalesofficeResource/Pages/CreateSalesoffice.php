<?php

namespace App\Filament\Submonitoring\Resources\SalesofficeResource\Pages;

use App\Filament\Submonitoring\Resources\SalesofficeResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateSalesoffice extends CreateRecord
{
    protected static string $resource = SalesofficeResource::class;

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
