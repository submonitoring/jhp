<?php

namespace App\Filament\Submonitoring\Resources\DebitcreditindicatorResource\Pages;

use App\Filament\Submonitoring\Resources\DebitcreditindicatorResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewDebitcreditindicator extends ViewRecord
{
    protected static string $resource = DebitcreditindicatorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
