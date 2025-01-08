<?php

namespace App\Filament\Submonitoring\Resources\TestReportStockResource\Pages;

use App\Filament\Submonitoring\Resources\TestReportStockResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateTestReportStock extends CreateRecord
{
    protected static string $resource = TestReportStockResource::class;

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
