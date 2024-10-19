<?php

namespace App\Filament\Submonitoring\Resources\TransportationgroupResource\Pages;

use App\Filament\Submonitoring\Resources\TransportationgroupResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateTransportationgroup extends CreateRecord
{
    protected static string $resource = TransportationgroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('Back to List')
                ->url($this->getResource()::getUrl('index')),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
