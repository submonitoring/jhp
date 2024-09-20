<?php

namespace App\Filament\Submonitoring\Resources\StocktypeResource\Pages;

use App\Filament\Submonitoring\Resources\StocktypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewStocktype extends ViewRecord
{
    protected static string $resource = StocktypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
