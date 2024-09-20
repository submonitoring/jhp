<?php

namespace App\Filament\Submonitoring\Resources\ReasonformovementResource\Pages;

use App\Filament\Submonitoring\Resources\ReasonformovementResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateReasonformovement extends CreateRecord
{
    protected static string $resource = ReasonformovementResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
