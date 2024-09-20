<?php

namespace App\Filament\Submonitoring\Resources\ProcurementtypeResource\Pages;

use App\Filament\Submonitoring\Resources\ProcurementtypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProcurementtypes extends ListRecords
{
    protected static string $resource = ProcurementtypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
