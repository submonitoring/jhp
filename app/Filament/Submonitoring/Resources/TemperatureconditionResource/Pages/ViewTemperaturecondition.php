<?php

namespace App\Filament\Submonitoring\Resources\TemperatureconditionResource\Pages;

use App\Filament\Submonitoring\Resources\TemperatureconditionResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTemperaturecondition extends ViewRecord
{
    protected static string $resource = TemperatureconditionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
