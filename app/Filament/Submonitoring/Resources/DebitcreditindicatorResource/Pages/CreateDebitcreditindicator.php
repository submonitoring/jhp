<?php

namespace App\Filament\Submonitoring\Resources\DebitcreditindicatorResource\Pages;

use App\Filament\Submonitoring\Resources\DebitcreditindicatorResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDebitcreditindicator extends CreateRecord
{
    protected static string $resource = DebitcreditindicatorResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
