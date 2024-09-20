<?php

namespace App\Filament\Submonitoring\Resources\CyclecountingResource\Pages;

use App\Filament\Submonitoring\Resources\CyclecountingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCyclecounting extends EditRecord
{
    protected static string $resource = CyclecountingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
