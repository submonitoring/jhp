<?php

namespace App\Filament\Submonitoring\Resources\MaterialmasterResource\Pages;

use App\Filament\Submonitoring\Resources\MaterialmasterResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMaterialmaster extends ViewRecord
{
    protected static string $resource = MaterialmasterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
