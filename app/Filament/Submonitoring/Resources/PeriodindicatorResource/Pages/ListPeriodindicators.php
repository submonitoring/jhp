<?php

namespace App\Filament\Submonitoring\Resources\PeriodindicatorResource\Pages;

use App\Filament\Submonitoring\Resources\PeriodindicatorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPeriodindicators extends ListRecords
{
    protected static string $resource = PeriodindicatorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
