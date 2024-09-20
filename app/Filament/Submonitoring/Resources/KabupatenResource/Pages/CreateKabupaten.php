<?php

namespace App\Filament\Submonitoring\Resources\KabupatenResource\Pages;

use App\Filament\Submonitoring\Resources\KabupatenResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKabupaten extends CreateRecord
{
    protected static string $resource = KabupatenResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
