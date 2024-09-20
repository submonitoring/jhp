<?php

namespace App\Filament\Submonitoring\Resources\ProcurementtypeResource\Pages;

use App\Filament\Submonitoring\Resources\ProcurementtypeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProcurementtype extends CreateRecord
{
    protected static string $resource = ProcurementtypeResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
