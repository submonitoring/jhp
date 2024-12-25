<?php

namespace App\Filament\Submonitoring\Resources\SalesareaResource\Pages;

use App\Filament\Submonitoring\Resources\SalesareaResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateSalesarea extends CreateRecord
{
    protected static string $resource = SalesareaResource::class;

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
