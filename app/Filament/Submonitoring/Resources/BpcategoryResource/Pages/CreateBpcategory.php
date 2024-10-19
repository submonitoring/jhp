<?php

namespace App\Filament\Submonitoring\Resources\BpcategoryResource\Pages;

use App\Filament\Submonitoring\Resources\BpcategoryResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateBpcategory extends CreateRecord
{
    protected static string $resource = BpcategoryResource::class;

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
