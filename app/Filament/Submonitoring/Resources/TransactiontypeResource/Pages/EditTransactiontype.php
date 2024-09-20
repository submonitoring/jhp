<?php

namespace App\Filament\Submonitoring\Resources\TransactiontypeResource\Pages;

use App\Filament\Submonitoring\Resources\TransactiontypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTransactiontype extends EditRecord
{
    protected static string $resource = TransactiontypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
