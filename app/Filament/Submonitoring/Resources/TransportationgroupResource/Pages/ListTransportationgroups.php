<?php

namespace App\Filament\Submonitoring\Resources\TransportationgroupResource\Pages;

use App\Filament\Submonitoring\Resources\TransportationgroupResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTransportationgroups extends ListRecords
{
    protected static string $resource = TransportationgroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
