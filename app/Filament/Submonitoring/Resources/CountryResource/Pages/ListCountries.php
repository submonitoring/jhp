<?php

namespace App\Filament\Submonitoring\Resources\CountryResource\Pages;

use App\Filament\Submonitoring\Resources\CountryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCountries extends ListRecords
{
    protected static string $resource = CountryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
