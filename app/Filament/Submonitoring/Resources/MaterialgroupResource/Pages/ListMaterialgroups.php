<?php

namespace App\Filament\Submonitoring\Resources\MaterialgroupResource\Pages;

use App\Filament\Submonitoring\Resources\MaterialgroupResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMaterialgroups extends ListRecords
{
    protected static string $resource = MaterialgroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
