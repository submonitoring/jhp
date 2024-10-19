<?php

namespace App\Filament\Submonitoring\Resources\CountryResource\Pages;

use App\Filament\Submonitoring\Resources\CountryResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateCountry extends CreateRecord
{
    protected static string $resource = CountryResource::class;

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
