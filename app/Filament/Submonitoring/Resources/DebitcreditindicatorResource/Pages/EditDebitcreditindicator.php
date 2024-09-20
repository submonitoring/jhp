<?php

namespace App\Filament\Submonitoring\Resources\DebitcreditindicatorResource\Pages;

use App\Filament\Submonitoring\Resources\DebitcreditindicatorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDebitcreditindicator extends EditRecord
{
    protected static string $resource = DebitcreditindicatorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
