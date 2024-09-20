<?php

namespace App\Filament\Submonitoring\Resources\StocktypeResource\Pages;

use App\Filament\Submonitoring\Resources\StocktypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStocktypes extends ListRecords
{
    protected static string $resource = StocktypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
