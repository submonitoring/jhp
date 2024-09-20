<?php

namespace App\Filament\Submonitoring\Resources\CyclecountingResource\Pages;

use App\Filament\Submonitoring\Resources\CyclecountingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCyclecountings extends ListRecords
{
    protected static string $resource = CyclecountingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
