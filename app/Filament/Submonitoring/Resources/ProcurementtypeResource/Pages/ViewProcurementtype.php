<?php

namespace App\Filament\Submonitoring\Resources\ProcurementtypeResource\Pages;

use App\Filament\Submonitoring\Resources\ProcurementtypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewProcurementtype extends ViewRecord
{
    protected static string $resource = ProcurementtypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
