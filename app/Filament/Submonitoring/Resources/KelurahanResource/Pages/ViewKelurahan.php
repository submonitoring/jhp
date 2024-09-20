<?php

namespace App\Filament\Submonitoring\Resources\KelurahanResource\Pages;

use App\Filament\Submonitoring\Resources\KelurahanResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewKelurahan extends ViewRecord
{
    protected static string $resource = KelurahanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
