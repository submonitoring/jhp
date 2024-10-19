<?php

namespace App\Filament\Submonitoring\Resources\StocktypeResource\Pages;

use App\Filament\Submonitoring\Resources\StocktypeResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateStocktype extends CreateRecord
{
    protected static string $resource = StocktypeResource::class;

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
