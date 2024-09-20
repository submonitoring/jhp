<?php

namespace App\Filament\Submonitoring\Resources\StorageconditionResource\Pages;

use App\Filament\Submonitoring\Resources\StorageconditionResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewStoragecondition extends ViewRecord
{
    protected static string $resource = StorageconditionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
