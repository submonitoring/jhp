<?php

namespace App\Filament\Submonitoring\Resources\DistributionchannelResource\Pages;

use App\Filament\Submonitoring\Resources\DistributionchannelResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewDistributionchannel extends ViewRecord
{
    protected static string $resource = DistributionchannelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
