<?php

namespace App\Filament\Submonitoring\Resources\UomResource\Pages;

use App\Filament\Submonitoring\Resources\UomResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUom extends EditRecord
{
    protected static string $resource = UomResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
