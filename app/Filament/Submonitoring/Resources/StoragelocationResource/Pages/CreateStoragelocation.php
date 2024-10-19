<?php

namespace App\Filament\Submonitoring\Resources\StoragelocationResource\Pages;

use App\Filament\Submonitoring\Resources\StoragelocationResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateStoragelocation extends CreateRecord
{
    protected static string $resource = StoragelocationResource::class;

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
