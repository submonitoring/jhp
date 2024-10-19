<?php

namespace App\Filament\Submonitoring\Resources\ReasonformovementcontrolResource\Pages;

use App\Filament\Submonitoring\Resources\ReasonformovementcontrolResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateReasonformovementcontrol extends CreateRecord
{
    protected static string $resource = ReasonformovementcontrolResource::class;

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
