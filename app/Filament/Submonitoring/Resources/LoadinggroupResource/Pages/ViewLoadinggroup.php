<?php

namespace App\Filament\Submonitoring\Resources\LoadinggroupResource\Pages;

use App\Filament\Submonitoring\Resources\LoadinggroupResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewLoadinggroup extends ViewRecord
{
    protected static string $resource = LoadinggroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
