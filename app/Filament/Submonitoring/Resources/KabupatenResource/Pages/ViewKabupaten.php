<?php

namespace App\Filament\Submonitoring\Resources\KabupatenResource\Pages;

use App\Filament\Submonitoring\Resources\KabupatenResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewKabupaten extends ViewRecord
{
    protected static string $resource = KabupatenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
