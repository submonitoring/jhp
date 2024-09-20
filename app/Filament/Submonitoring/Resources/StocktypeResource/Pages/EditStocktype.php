<?php

namespace App\Filament\Submonitoring\Resources\StocktypeResource\Pages;

use App\Filament\Submonitoring\Resources\StocktypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStocktype extends EditRecord
{
    protected static string $resource = StocktypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
