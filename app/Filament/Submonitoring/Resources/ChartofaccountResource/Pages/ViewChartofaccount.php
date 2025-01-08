<?php

namespace App\Filament\Submonitoring\Resources\ChartofaccountResource\Pages;

use App\Filament\Submonitoring\Resources\ChartofaccountResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewChartofaccount extends ViewRecord
{
    protected static string $resource = ChartofaccountResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
