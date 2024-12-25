<?php

namespace App\Filament\Submonitoring\Resources\SalesareaResource\Pages;

use App\Filament\Submonitoring\Resources\SalesareaResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSalesarea extends ViewRecord
{
    protected static string $resource = SalesareaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
