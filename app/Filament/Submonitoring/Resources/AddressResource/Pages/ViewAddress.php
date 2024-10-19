<?php

namespace App\Filament\Submonitoring\Resources\AddressResource\Pages;

use App\Filament\Submonitoring\Resources\AddressResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\ViewRecord;

class ViewAddress extends ViewRecord
{
    protected static string $resource = AddressResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Action::make('Back to List')
                ->url($this->getResource()::getUrl('index')),
        ];
    }
}
