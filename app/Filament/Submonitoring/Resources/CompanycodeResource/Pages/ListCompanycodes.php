<?php

namespace App\Filament\Submonitoring\Resources\CompanycodeResource\Pages;

use App\Filament\Submonitoring\Resources\CompanycodeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCompanycodes extends ListRecords
{
    protected static string $resource = CompanycodeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
