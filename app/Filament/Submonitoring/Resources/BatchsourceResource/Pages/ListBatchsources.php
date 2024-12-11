<?php

namespace App\Filament\Submonitoring\Resources\BatchsourceResource\Pages;

use App\Filament\Submonitoring\Resources\BatchsourceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBatchsources extends ListRecords
{
    protected static string $resource = BatchsourceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
