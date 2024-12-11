<?php

namespace App\Filament\Submonitoring\Resources\MaterialdocumentheaderResource\Pages;

use App\Filament\Submonitoring\Resources\MaterialdocumentheaderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMaterialdocumentheaders extends ListRecords
{
    protected static string $resource = MaterialdocumentheaderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
