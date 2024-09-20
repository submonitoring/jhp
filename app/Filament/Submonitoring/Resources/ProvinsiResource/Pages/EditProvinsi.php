<?php

namespace App\Filament\Submonitoring\Resources\ProvinsiResource\Pages;

use App\Filament\Submonitoring\Resources\ProvinsiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProvinsi extends EditRecord
{
    protected static string $resource = ProvinsiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            // Actions\DeleteAction::make(),
        ];
    }
}
