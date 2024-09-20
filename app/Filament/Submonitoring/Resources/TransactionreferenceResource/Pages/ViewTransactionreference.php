<?php

namespace App\Filament\Submonitoring\Resources\TransactionreferenceResource\Pages;

use App\Filament\Submonitoring\Resources\TransactionreferenceResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTransactionreference extends ViewRecord
{
    protected static string $resource = TransactionreferenceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
