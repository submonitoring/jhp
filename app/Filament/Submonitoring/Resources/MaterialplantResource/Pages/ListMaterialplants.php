<?php

namespace App\Filament\Submonitoring\Resources\MaterialplantResource\Pages;

use App\Filament\Submonitoring\Resources\MaterialplantResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMaterialplants extends ListRecords
{
    protected static string $resource = MaterialplantResource::class;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }
}
