<?php

namespace App\Filament\Submonitoring\Resources\UomResource\Pages;

use App\Filament\Submonitoring\Resources\UomResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUoms extends ListRecords
{
    protected static string $resource = UomResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
