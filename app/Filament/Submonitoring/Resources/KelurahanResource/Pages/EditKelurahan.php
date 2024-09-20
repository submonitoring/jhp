<?php

namespace App\Filament\Submonitoring\Resources\KelurahanResource\Pages;

use App\Filament\Submonitoring\Resources\KelurahanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKelurahan extends EditRecord
{
    protected static string $resource = KelurahanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            // Actions\DeleteAction::make(),
        ];
    }
}
