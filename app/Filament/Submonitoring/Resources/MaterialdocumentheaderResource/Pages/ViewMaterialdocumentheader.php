<?php

namespace App\Filament\Submonitoring\Resources\MaterialdocumentheaderResource\Pages;

use App\Filament\Submonitoring\Resources\MaterialdocumentheaderResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMaterialdocumentheader extends ViewRecord
{
    protected static string $resource = MaterialdocumentheaderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
