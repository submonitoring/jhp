<?php

namespace App\Filament\Submonitoring\Resources\IndustrysectorResource\Pages;

use App\Filament\Submonitoring\Resources\IndustrysectorResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewIndustrysector extends ViewRecord
{
    protected static string $resource = IndustrysectorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
