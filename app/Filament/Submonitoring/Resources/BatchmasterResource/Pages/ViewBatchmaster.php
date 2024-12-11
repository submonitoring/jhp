<?php

namespace App\Filament\Submonitoring\Resources\BatchmasterResource\Pages;

use App\Filament\Submonitoring\Resources\BatchmasterResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewBatchmaster extends ViewRecord
{
    protected static string $resource = BatchmasterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
