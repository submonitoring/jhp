<?php

namespace App\Filament\Submonitoring\Resources\IndustrysectorResource\Pages;

use App\Filament\Submonitoring\Resources\IndustrysectorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIndustrysector extends EditRecord
{
    protected static string $resource = IndustrysectorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
