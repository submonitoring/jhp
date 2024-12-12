<?php

namespace App\Filament\Imports;

use App\Models\Debitcreditindicator;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class DebitcreditindicatorImporter extends Importer
{
    protected static ?string $model = Debitcreditindicator::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('debit_credit_indicator')
                ->label('Debit Credit Indicator')
                ->rules(['max:1']),
            ImportColumn::make('debit_credit_indicator_desc')
                ->label('Desc')
                ->rules(['max:255']),
            ImportColumn::make('is_active')
                ->boolean()
                ->rules(['boolean']),
        ];
    }

    public function resolveRecord(): ?Debitcreditindicator
    {
        // return Debitcreditindicator::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Debitcreditindicator();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your debitcreditindicator import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
