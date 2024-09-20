<?php

namespace App\Filament\Submonitoring\Resources\KabupatenResource\Pages;

use App\Filament\Submonitoring\Resources\KabupatenResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKabupaten extends EditRecord
{
    protected static string $resource = KabupatenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            // Actions\DeleteAction::make(),
        ];
    }
}
