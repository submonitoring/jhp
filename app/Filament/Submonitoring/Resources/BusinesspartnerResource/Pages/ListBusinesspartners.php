<?php

namespace App\Filament\Submonitoring\Resources\BusinesspartnerResource\Pages;

use App\Filament\Submonitoring\Resources\BusinesspartnerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBusinesspartners extends ListRecords
{
    protected static string $resource = BusinesspartnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
