<?php

namespace App\Filament\Submonitoring\Resources\CompanycodeResource\Pages;

use App\Filament\Submonitoring\Resources\CompanycodeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCompanycode extends EditRecord
{
    protected static string $resource = CompanycodeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
