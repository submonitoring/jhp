<?php

namespace App\Filament\Submonitoring\Resources\UomResource\Pages;

use App\Filament\Submonitoring\Resources\UomResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUom extends CreateRecord
{
    protected static string $resource = UomResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
