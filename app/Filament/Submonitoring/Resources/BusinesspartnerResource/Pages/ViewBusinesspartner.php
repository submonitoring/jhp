<?php

namespace App\Filament\Submonitoring\Resources\BusinesspartnerResource\Pages;

use App\Filament\Submonitoring\Resources\BusinesspartnerResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewBusinesspartner extends ViewRecord
{
    protected static string $resource = BusinesspartnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
