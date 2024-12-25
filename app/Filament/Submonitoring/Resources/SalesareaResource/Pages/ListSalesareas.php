<?php

namespace App\Filament\Submonitoring\Resources\SalesareaResource\Pages;

use App\Filament\Submonitoring\Resources\SalesareaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSalesareas extends ListRecords
{
    protected static string $resource = SalesareaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
