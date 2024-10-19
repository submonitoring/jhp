<?php

namespace App\Filament\Submonitoring\Resources\StorageconditionResource\Pages;

use App\Filament\Submonitoring\Resources\StorageconditionResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateStoragecondition extends CreateRecord
{
    protected static string $resource = StorageconditionResource::class;

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
