<?php

namespace App\Filament\Submonitoring\Resources\CurrencyResource\Pages;

use App\Filament\Submonitoring\Resources\CurrencyResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;

class EditCurrency extends EditRecord
{
    protected static string $resource = CurrencyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Action::make('Back to List')
                ->url($this->getResource()::getUrl('index')),
        ];
    }
}
