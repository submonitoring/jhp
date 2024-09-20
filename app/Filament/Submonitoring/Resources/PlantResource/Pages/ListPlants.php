<?php

namespace App\Filament\Submonitoring\Resources\PlantResource\Pages;

use App\Filament\Submonitoring\Resources\PlantResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPlants extends ListRecords
{
    protected static string $resource = PlantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
