<?php

namespace App\Filament\Submonitoring\Resources\KecamatanResource\Pages;

use App\Filament\Submonitoring\Resources\KecamatanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKecamatan extends CreateRecord
{
    protected static string $resource = KecamatanResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
