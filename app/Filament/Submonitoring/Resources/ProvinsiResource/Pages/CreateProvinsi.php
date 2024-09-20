<?php

namespace App\Filament\Submonitoring\Resources\ProvinsiResource\Pages;

use App\Filament\Submonitoring\Resources\ProvinsiResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProvinsi extends CreateRecord
{
    protected static string $resource = ProvinsiResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
