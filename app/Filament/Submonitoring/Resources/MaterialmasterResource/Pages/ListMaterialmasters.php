<?php

namespace App\Filament\Submonitoring\Resources\MaterialmasterResource\Pages;

use App\Filament\Submonitoring\Resources\MaterialmasterResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMaterialmasters extends ListRecords
{
    protected static string $resource = MaterialmasterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
