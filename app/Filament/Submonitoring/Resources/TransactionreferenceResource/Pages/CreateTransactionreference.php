<?php

namespace App\Filament\Submonitoring\Resources\TransactionreferenceResource\Pages;

use App\Filament\Submonitoring\Resources\TransactionreferenceResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateTransactionreference extends CreateRecord
{
    protected static string $resource = TransactionreferenceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('Back to List')
                ->url($this->getResource()::getUrl('index')),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
