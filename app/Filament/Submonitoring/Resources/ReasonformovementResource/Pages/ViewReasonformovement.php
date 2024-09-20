<?php

namespace App\Filament\Submonitoring\Resources\ReasonformovementResource\Pages;

use App\Filament\Submonitoring\Resources\ReasonformovementResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewReasonformovement extends ViewRecord
{
    protected static string $resource = ReasonformovementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
