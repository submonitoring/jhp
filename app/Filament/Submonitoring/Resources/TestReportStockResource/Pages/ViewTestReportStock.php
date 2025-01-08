<?php

namespace App\Filament\Submonitoring\Resources\TestReportStockResource\Pages;

use App\Filament\Submonitoring\Resources\TestReportStockResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTestReportStock extends ViewRecord
{
    protected static string $resource = TestReportStockResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
