<?php

namespace App\Filament\Submonitoring\Resources\MaterialgroupResource\Pages;

use App\Filament\Submonitoring\Resources\MaterialgroupResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMaterialgroup extends ViewRecord
{
    protected static string $resource = MaterialgroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
