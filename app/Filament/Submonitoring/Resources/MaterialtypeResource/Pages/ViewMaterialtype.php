<?php

namespace App\Filament\Submonitoring\Resources\MaterialtypeResource\Pages;

use App\Filament\Submonitoring\Resources\MaterialtypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMaterialtype extends ViewRecord
{
    protected static string $resource = MaterialtypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
