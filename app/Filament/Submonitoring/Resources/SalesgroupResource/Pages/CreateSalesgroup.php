<?php

namespace App\Filament\Submonitoring\Resources\SalesgroupResource\Pages;

use App\Filament\Submonitoring\Resources\SalesgroupResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateSalesgroup extends CreateRecord
{
    protected static string $resource = SalesgroupResource::class;

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
