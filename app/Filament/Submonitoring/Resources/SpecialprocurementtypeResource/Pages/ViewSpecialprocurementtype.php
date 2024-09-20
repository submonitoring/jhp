<?php

namespace App\Filament\Submonitoring\Resources\SpecialprocurementtypeResource\Pages;

use App\Filament\Submonitoring\Resources\SpecialprocurementtypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSpecialprocurementtype extends ViewRecord
{
    protected static string $resource = SpecialprocurementtypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
