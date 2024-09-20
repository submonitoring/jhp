<?php

namespace App\Filament\Submonitoring\Resources\IndustrysectorResource\Pages;

use App\Filament\Submonitoring\Resources\IndustrysectorResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateIndustrysector extends CreateRecord
{
    protected static string $resource = IndustrysectorResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
