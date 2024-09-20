<?php

namespace App\Filament\Submonitoring\Resources\CompanycodeResource\Pages;

use App\Filament\Submonitoring\Resources\CompanycodeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCompanycode extends CreateRecord
{
    protected static string $resource = CompanycodeResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
