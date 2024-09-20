<?php

namespace App\Filament\Submonitoring\Resources\KecamatanResource\Pages;

use App\Filament\Submonitoring\Resources\KecamatanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKecamatans extends ListRecords
{
    protected static string $resource = KecamatanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
