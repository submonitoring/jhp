<?php

namespace App\Filament\Submonitoring\Resources\NrobjectResource\Pages;

use App\Filament\Submonitoring\Resources\NrobjectResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNrobject extends EditRecord
{
    protected static string $resource = NrobjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
