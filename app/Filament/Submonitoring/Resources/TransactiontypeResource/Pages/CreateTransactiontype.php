<?php

namespace App\Filament\Submonitoring\Resources\TransactiontypeResource\Pages;

use App\Filament\Submonitoring\Resources\TransactiontypeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTransactiontype extends CreateRecord
{
    protected static string $resource = TransactiontypeResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
