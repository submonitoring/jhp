<?php

namespace App\Filament\Submonitoring\Resources\SalesorganizationResource\Pages;

use App\Filament\Submonitoring\Resources\SalesorganizationResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSalesorganization extends ViewRecord
{
    protected static string $resource = SalesorganizationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
