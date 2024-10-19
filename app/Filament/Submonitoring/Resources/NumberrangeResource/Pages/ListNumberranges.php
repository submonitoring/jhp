<?php

namespace App\Filament\Submonitoring\Resources\NumberrangeResource\Pages;

use App\Filament\Imports\NumberrangeImporter;
use App\Filament\Submonitoring\Resources\NumberrangeResource;
use Filament\Actions;
use Filament\Actions\ImportAction;
use Filament\Resources\Pages\ListRecords;

class ListNumberranges extends ListRecords
{
    protected static string $resource = NumberrangeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),


            // ImportAction::make()
            //     ->label('Import')
            //     ->importer(NumberrangeImporter::class),
        ];
    }
}
