<?php

namespace App\Filament\Submonitoring\Resources\SpecialprocurementtypeResource\Pages;

use App\Filament\Submonitoring\Resources\SpecialprocurementtypeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSpecialprocurementtype extends CreateRecord
{
    protected static string $resource = SpecialprocurementtypeResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
