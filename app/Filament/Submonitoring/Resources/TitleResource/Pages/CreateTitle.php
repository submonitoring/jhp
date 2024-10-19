<?php

namespace App\Filament\Submonitoring\Resources\TitleResource\Pages;

use App\Filament\Submonitoring\Resources\TitleResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateTitle extends CreateRecord
{
    protected static string $resource = TitleResource::class;

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
