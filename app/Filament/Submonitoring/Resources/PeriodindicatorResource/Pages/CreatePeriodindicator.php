<?php

namespace App\Filament\Submonitoring\Resources\PeriodindicatorResource\Pages;

use App\Filament\Submonitoring\Resources\PeriodindicatorResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreatePeriodindicator extends CreateRecord
{
    protected static string $resource = PeriodindicatorResource::class;

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
