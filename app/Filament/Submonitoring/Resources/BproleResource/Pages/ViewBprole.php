<?php

namespace App\Filament\Submonitoring\Resources\BproleResource\Pages;

use App\Filament\Submonitoring\Resources\BproleResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewBprole extends ViewRecord
{
    protected static string $resource = BproleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
