<?php

namespace App\Filament\Submonitoring\Resources\TransportationgroupResource\Pages;

use App\Filament\Submonitoring\Resources\TransportationgroupResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTransportationgroup extends ViewRecord
{
    protected static string $resource = TransportationgroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
