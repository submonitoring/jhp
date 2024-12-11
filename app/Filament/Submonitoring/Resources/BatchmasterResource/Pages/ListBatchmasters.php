<?php

namespace App\Filament\Submonitoring\Resources\BatchmasterResource\Pages;

use App\Filament\Submonitoring\Resources\BatchmasterResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBatchmasters extends ListRecords
{
    protected static string $resource = BatchmasterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
