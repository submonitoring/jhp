<?php

namespace App\Filament\Submonitoring\Resources\MaterialtypeResource\Pages;

use App\Filament\Submonitoring\Resources\MaterialtypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMaterialtypes extends ListRecords
{
    protected static string $resource = MaterialtypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
