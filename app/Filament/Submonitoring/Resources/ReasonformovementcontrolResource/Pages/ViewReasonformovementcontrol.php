<?php

namespace App\Filament\Submonitoring\Resources\ReasonformovementcontrolResource\Pages;

use App\Filament\Submonitoring\Resources\ReasonformovementcontrolResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewReasonformovementcontrol extends ViewRecord
{
    protected static string $resource = ReasonformovementcontrolResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
