<?php

namespace App\Filament\Imports;

use App\Models\Transactionreference;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class TransactionreferenceImporter extends Importer
{
    protected static ?string $model = Transactionreference::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('transaction_reference')
                ->label('Transaction Reference')
                ->rules(['max:4']),
            ImportColumn::make('transaction_reference_desc')
                ->label('Desc')
                ->rules(['max:255']),
            ImportColumn::make('is_active')
                ->boolean()
                ->rules(['boolean']),
        ];
    }

    public function resolveRecord(): ?Transactionreference
    {
        // return Transactionreference::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Transactionreference();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your transactionreference import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
