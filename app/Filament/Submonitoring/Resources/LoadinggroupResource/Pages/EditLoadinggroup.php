<?php

namespace App\Filament\Submonitoring\Resources\LoadinggroupResource\Pages;

use App\Filament\Submonitoring\Resources\LoadinggroupResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLoadinggroup extends EditRecord
{
    protected static string $resource = LoadinggroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
