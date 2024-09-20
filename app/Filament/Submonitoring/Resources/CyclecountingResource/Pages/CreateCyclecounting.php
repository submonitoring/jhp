<?php

namespace App\Filament\Submonitoring\Resources\CyclecountingResource\Pages;

use App\Filament\Submonitoring\Resources\CyclecountingResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCyclecounting extends CreateRecord
{
    protected static string $resource = CyclecountingResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
