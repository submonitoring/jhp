<?php

namespace App\Filament\Submonitoring\Resources\NrobjectResource\Pages;

use App\Filament\Imports\NrobjectImporter;
use App\Filament\Submonitoring\Resources\NrobjectResource;
use Filament\Actions;
use Filament\Actions\ImportAction;
use Filament\Resources\Pages\ListRecords;

class ListNrobjects extends ListRecords
{
    protected static string $resource = NrobjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            ImportAction::make()
                ->label('Import NR Objects')
                ->importer(NrobjectImporter::class)
        ];
    }
}
