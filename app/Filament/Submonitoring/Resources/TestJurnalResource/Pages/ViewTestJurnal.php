<?php

namespace App\Filament\Submonitoring\Resources\TestJurnalResource\Pages;

use App\Filament\Submonitoring\Resources\TestJurnalResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTestJurnal extends ViewRecord
{
    protected static string $resource = TestJurnalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
