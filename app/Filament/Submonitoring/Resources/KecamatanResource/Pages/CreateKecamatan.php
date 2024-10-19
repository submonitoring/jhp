<?php

namespace App\Filament\Submonitoring\Resources\KecamatanResource\Pages;

use App\Filament\Submonitoring\Resources\KecamatanResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateKecamatan extends CreateRecord
{
    protected static string $resource = KecamatanResource::class;

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
