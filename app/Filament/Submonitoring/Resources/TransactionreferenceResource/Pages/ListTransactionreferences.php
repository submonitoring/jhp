<?php

namespace App\Filament\Submonitoring\Resources\TransactionreferenceResource\Pages;

use App\Filament\Submonitoring\Resources\TransactionreferenceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTransactionreferences extends ListRecords
{
    protected static string $resource = TransactionreferenceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
