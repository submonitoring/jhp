<?php

namespace App\Filament\Submonitoring\Resources\SalesofficeResource\Pages;

use App\Filament\Submonitoring\Resources\SalesofficeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSalesoffices extends ListRecords
{
    protected static string $resource = SalesofficeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
