<?php

namespace App\Filament\Submonitoring\Resources\ReasonformovementResource\Pages;

use App\Filament\Submonitoring\Resources\ReasonformovementResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateReasonformovement extends CreateRecord
{
    protected static string $resource = ReasonformovementResource::class;

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
