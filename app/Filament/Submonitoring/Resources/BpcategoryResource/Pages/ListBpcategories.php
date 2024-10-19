<?php

namespace App\Filament\Submonitoring\Resources\BpcategoryResource\Pages;

use App\Filament\Submonitoring\Resources\BpcategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBpcategories extends ListRecords
{
    protected static string $resource = BpcategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
