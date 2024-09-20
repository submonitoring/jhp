<?php

namespace App\Filament\Submonitoring\Resources\TemperatureconditionResource\Pages;

use App\Filament\Submonitoring\Resources\TemperatureconditionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTemperaturecondition extends CreateRecord
{
    protected static string $resource = TemperatureconditionResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
