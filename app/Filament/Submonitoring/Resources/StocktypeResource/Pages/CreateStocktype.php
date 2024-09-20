<?php

namespace App\Filament\Submonitoring\Resources\StocktypeResource\Pages;

use App\Filament\Submonitoring\Resources\StocktypeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateStocktype extends CreateRecord
{
    protected static string $resource = StocktypeResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
