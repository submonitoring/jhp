<?php

namespace App\Filament\Submonitoring\Resources\CurrencyResource\Pages;

use App\Filament\Submonitoring\Resources\CurrencyResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateCurrency extends CreateRecord
{
    protected static string $resource = CurrencyResource::class;

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
