<?php

namespace App\Filament\Submonitoring\Resources\NumberrangeResource\Pages;

use App\Filament\Submonitoring\Resources\NumberrangeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNumberrange extends EditRecord
{
    protected static string $resource = NumberrangeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
