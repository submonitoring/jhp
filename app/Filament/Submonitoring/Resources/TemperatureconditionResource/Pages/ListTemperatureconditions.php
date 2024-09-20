<?php

namespace App\Filament\Submonitoring\Resources\TemperatureconditionResource\Pages;

use App\Filament\Submonitoring\Resources\TemperatureconditionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTemperatureconditions extends ListRecords
{
    protected static string $resource = TemperatureconditionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
