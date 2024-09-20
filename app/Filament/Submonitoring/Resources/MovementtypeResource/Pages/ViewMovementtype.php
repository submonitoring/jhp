<?php

namespace App\Filament\Submonitoring\Resources\MovementtypeResource\Pages;

use App\Filament\Submonitoring\Resources\MovementtypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMovementtype extends ViewRecord
{
    protected static string $resource = MovementtypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
