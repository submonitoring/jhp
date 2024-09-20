<?php

namespace App\Filament\Submonitoring\Resources\KodeposResource\Pages;

use App\Filament\Submonitoring\Resources\KodeposResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKodepos extends CreateRecord
{
    protected static string $resource = KodeposResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
