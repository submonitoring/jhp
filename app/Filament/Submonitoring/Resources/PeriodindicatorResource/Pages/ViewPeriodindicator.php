<?php

namespace App\Filament\Submonitoring\Resources\PeriodindicatorResource\Pages;

use App\Filament\Submonitoring\Resources\PeriodindicatorResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPeriodindicator extends ViewRecord
{
    protected static string $resource = PeriodindicatorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
