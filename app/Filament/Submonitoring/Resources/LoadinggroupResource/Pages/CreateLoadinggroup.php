<?php

namespace App\Filament\Submonitoring\Resources\LoadinggroupResource\Pages;

use App\Filament\Submonitoring\Resources\LoadinggroupResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLoadinggroup extends CreateRecord
{
    protected static string $resource = LoadinggroupResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
