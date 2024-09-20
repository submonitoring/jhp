<?php

namespace App\Filament\Submonitoring\Resources\MaterialgroupResource\Pages;

use App\Filament\Submonitoring\Resources\MaterialgroupResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMaterialgroup extends CreateRecord
{
    protected static string $resource = MaterialgroupResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
