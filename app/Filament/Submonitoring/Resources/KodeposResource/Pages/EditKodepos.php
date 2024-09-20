<?php

namespace App\Filament\Submonitoring\Resources\KodeposResource\Pages;

use App\Filament\Submonitoring\Resources\KodeposResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKodepos extends EditRecord
{
    protected static string $resource = KodeposResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            // Actions\DeleteAction::make(),
        ];
    }
}
