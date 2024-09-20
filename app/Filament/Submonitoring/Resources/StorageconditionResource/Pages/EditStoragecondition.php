<?php

namespace App\Filament\Submonitoring\Resources\StorageconditionResource\Pages;

use App\Filament\Submonitoring\Resources\StorageconditionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStoragecondition extends EditRecord
{
    protected static string $resource = StorageconditionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
