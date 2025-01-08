<?php

namespace App\Filament\Submonitoring\Resources\TestReportStockResource\Pages;

use App\Filament\Submonitoring\Resources\TestReportStockResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTestReportStocks extends ListRecords
{
    protected static string $resource = TestReportStockResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
