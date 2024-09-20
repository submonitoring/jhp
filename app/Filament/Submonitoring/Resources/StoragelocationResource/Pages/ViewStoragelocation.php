<?php

namespace App\Filament\Submonitoring\Resources\StoragelocationResource\Pages;

use App\Filament\Submonitoring\Resources\StoragelocationResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewStoragelocation extends ViewRecord
{
    protected static string $resource = StoragelocationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
