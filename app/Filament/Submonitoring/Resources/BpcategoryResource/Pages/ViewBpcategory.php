<?php

namespace App\Filament\Submonitoring\Resources\BpcategoryResource\Pages;

use App\Filament\Submonitoring\Resources\BpcategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewBpcategory extends ViewRecord
{
    protected static string $resource = BpcategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
