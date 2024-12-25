<?php

namespace App\Filament\Submonitoring\Resources\SalesofficeResource\Pages;

use App\Filament\Submonitoring\Resources\SalesofficeResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSalesoffice extends ViewRecord
{
    protected static string $resource = SalesofficeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
