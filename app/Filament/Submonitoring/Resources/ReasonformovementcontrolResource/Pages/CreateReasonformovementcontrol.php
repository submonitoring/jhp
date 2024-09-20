<?php

namespace App\Filament\Submonitoring\Resources\ReasonformovementcontrolResource\Pages;

use App\Filament\Submonitoring\Resources\ReasonformovementcontrolResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateReasonformovementcontrol extends CreateRecord
{
    protected static string $resource = ReasonformovementcontrolResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
