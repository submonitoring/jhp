<?php

namespace App\Filament\Submonitoring\Resources\TransportationgroupResource\Pages;

use App\Filament\Submonitoring\Resources\TransportationgroupResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTransportationgroup extends EditRecord
{
    protected static string $resource = TransportationgroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
