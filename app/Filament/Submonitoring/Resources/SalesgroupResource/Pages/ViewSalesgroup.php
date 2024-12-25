<?php

namespace App\Filament\Submonitoring\Resources\SalesgroupResource\Pages;

use App\Filament\Submonitoring\Resources\SalesgroupResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSalesgroup extends ViewRecord
{
    protected static string $resource = SalesgroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
