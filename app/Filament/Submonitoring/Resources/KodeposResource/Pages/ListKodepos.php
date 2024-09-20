<?php

namespace App\Filament\Submonitoring\Resources\KodeposResource\Pages;

use App\Filament\Submonitoring\Resources\KodeposResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKodepos extends ListRecords
{
    protected static string $resource = KodeposResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
