<?php

namespace App\Filament\Submonitoring\Resources\TransactiontypeResource\Pages;

use App\Filament\Submonitoring\Resources\TransactiontypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTransactiontypes extends ListRecords
{
    protected static string $resource = TransactiontypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
