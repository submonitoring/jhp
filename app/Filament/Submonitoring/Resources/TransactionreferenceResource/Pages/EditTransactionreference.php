<?php

namespace App\Filament\Submonitoring\Resources\TransactionreferenceResource\Pages;

use App\Filament\Submonitoring\Resources\TransactionreferenceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTransactionreference extends EditRecord
{
    protected static string $resource = TransactionreferenceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
