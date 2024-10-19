<?php

namespace App\Filament\Submonitoring\Resources\MaterialplantResource\Pages;

use App\Filament\Submonitoring\Resources\MaterialplantResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMaterialplant extends ViewRecord
{
    protected static string $resource = MaterialplantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
