<?php

namespace App\Filament\Submonitoring\Resources\ProvinsiResource\Pages;

use App\Filament\Submonitoring\Resources\ProvinsiResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewProvinsi extends ViewRecord
{
    protected static string $resource = ProvinsiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
