<?php

namespace App\Filament\Submonitoring\Resources\KecamatanResource\Pages;

use App\Filament\Submonitoring\Resources\KecamatanResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewKecamatan extends ViewRecord
{
    protected static string $resource = KecamatanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
