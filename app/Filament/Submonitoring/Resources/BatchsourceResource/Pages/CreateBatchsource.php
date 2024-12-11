<?php

namespace App\Filament\Submonitoring\Resources\BatchsourceResource\Pages;

use App\Filament\Submonitoring\Resources\BatchsourceResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateBatchsource extends CreateRecord
{
    protected static string $resource = BatchsourceResource::class;

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
