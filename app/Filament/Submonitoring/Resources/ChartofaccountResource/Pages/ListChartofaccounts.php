<?php

namespace App\Filament\Submonitoring\Resources\ChartofaccountResource\Pages;

use App\Filament\Submonitoring\Resources\ChartofaccountResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListChartofaccounts extends ListRecords
{
    protected static string $resource = ChartofaccountResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
