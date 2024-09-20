<?php

namespace App\Filament\Submonitoring\Resources\AddressResource\Pages;

use App\Filament\Submonitoring\Resources\AddressResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewAddress extends ViewRecord
{
    protected static string $resource = AddressResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
