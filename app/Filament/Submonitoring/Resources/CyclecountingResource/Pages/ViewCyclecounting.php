<?php

namespace App\Filament\Submonitoring\Resources\CyclecountingResource\Pages;

use App\Filament\Submonitoring\Resources\CyclecountingResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCyclecounting extends ViewRecord
{
    protected static string $resource = CyclecountingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
