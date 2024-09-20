<?php

namespace App\Filament\Submonitoring\Resources\MaterialtypeResource\Pages;

use App\Filament\Submonitoring\Resources\MaterialtypeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMaterialtype extends CreateRecord
{
    protected static string $resource = MaterialtypeResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
