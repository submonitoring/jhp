<?php

namespace App\Filament\Submonitoring\Resources\TestJurnalResource\Pages;

use App\Filament\Submonitoring\Resources\TestJurnalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTestJurnals extends ListRecords
{
    protected static string $resource = TestJurnalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
