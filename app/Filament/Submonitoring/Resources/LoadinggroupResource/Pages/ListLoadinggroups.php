<?php

namespace App\Filament\Submonitoring\Resources\LoadinggroupResource\Pages;

use App\Filament\Submonitoring\Resources\LoadinggroupResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLoadinggroups extends ListRecords
{
    protected static string $resource = LoadinggroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
