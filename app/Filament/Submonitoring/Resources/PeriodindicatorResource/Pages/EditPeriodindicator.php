<?php

namespace App\Filament\Submonitoring\Resources\PeriodindicatorResource\Pages;

use App\Filament\Submonitoring\Resources\PeriodindicatorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPeriodindicator extends EditRecord
{
    protected static string $resource = PeriodindicatorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
