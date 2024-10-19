<?php

namespace App\Filament\Submonitoring\Resources\NrobjectResource\Pages;

use App\Filament\Submonitoring\Resources\NrobjectResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateNrobject extends CreateRecord
{
    protected static string $resource = NrobjectResource::class;

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
