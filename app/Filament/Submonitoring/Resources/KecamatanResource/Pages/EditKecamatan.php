<?php

namespace App\Filament\Submonitoring\Resources\KecamatanResource\Pages;

use App\Filament\Submonitoring\Resources\KecamatanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKecamatan extends EditRecord
{
    protected static string $resource = KecamatanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            // Actions\DeleteAction::make(),
        ];
    }
}
