<?php

namespace App\Filament\Submonitoring\Resources\DocumenttypeResource\Pages;

use App\Filament\Submonitoring\Resources\DocumenttypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDocumenttypes extends ListRecords
{
    protected static string $resource = DocumenttypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
