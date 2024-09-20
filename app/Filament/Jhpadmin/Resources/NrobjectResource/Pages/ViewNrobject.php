<?php

namespace App\Filament\Jhpadmin\Resources\NrobjectResource\Pages;

use App\Filament\Jhpadmin\Resources\NrobjectResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewNrobject extends ViewRecord
{
    protected static string $resource = NrobjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
