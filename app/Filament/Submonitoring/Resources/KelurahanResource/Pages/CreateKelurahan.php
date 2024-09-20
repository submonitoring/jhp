<?php

namespace App\Filament\Submonitoring\Resources\KelurahanResource\Pages;

use App\Filament\Submonitoring\Resources\KelurahanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKelurahan extends CreateRecord
{
    protected static string $resource = KelurahanResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
