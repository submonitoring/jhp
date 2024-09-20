<?php

namespace App\Filament\Submonitoring\Resources\DocumenttypeResource\Pages;

use App\Filament\Submonitoring\Resources\DocumenttypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewDocumenttype extends ViewRecord
{
    protected static string $resource = DocumenttypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
