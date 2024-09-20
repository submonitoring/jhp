<?php

namespace App\Filament\Jhpadmin\Resources\MaterialtypeResource\Pages;

use App\Filament\Jhpadmin\Resources\MaterialtypeResource;
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
