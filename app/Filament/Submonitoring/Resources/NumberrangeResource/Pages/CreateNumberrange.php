<?php

namespace App\Filament\Submonitoring\Resources\NumberrangeResource\Pages;

use App\Filament\Submonitoring\Resources\NumberrangeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateNumberrange extends CreateRecord
{
    protected static string $resource = NumberrangeResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
