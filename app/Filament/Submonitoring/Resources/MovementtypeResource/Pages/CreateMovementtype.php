<?php

namespace App\Filament\Submonitoring\Resources\MovementtypeResource\Pages;

use App\Filament\Submonitoring\Resources\MovementtypeResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateMovementtype extends CreateRecord
{
    protected static string $resource = MovementtypeResource::class;

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
