<?php

namespace App\Filament\Submonitoring\Resources\PlantResource\Pages;

use App\Filament\Submonitoring\Resources\PlantResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreatePlant extends CreateRecord
{
    protected static string $resource = PlantResource::class;

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
