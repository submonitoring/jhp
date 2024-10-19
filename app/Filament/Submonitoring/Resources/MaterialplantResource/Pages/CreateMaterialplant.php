<?php

namespace App\Filament\Submonitoring\Resources\MaterialplantResource\Pages;

use App\Filament\Submonitoring\Resources\MaterialplantResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateMaterialplant extends CreateRecord
{
    protected static string $resource = MaterialplantResource::class;

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
