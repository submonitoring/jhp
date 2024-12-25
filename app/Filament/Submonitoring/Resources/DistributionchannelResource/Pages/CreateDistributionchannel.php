<?php

namespace App\Filament\Submonitoring\Resources\DistributionchannelResource\Pages;

use App\Filament\Submonitoring\Resources\DistributionchannelResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateDistributionchannel extends CreateRecord
{
    protected static string $resource = DistributionchannelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('Back to List')
                ->url($this->getResource()::getUrl('index')),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
