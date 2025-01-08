<?php

namespace App\Filament\Submonitoring\Resources\TestJurnalResource\Pages;

use App\Filament\Submonitoring\Resources\TestJurnalResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateTestJurnal extends CreateRecord
{
    protected static string $resource = TestJurnalResource::class;

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
