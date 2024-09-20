<?php

namespace App\Filament\Submonitoring\Resources\StorageconditionResource\Pages;

use App\Filament\Submonitoring\Resources\StorageconditionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStorageconditions extends ListRecords
{
    protected static string $resource = StorageconditionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
