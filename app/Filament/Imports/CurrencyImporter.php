<?php

namespace App\Filament\Imports;

use App\Models\Currency;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class CurrencyImporter extends Importer
{
    protected static ?string $model = Currency::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('currency')
                ->label('Currency')
                ->rules(['max:255']),
            ImportColumn::make('symbol')
                ->label('Symbol')
                ->rules(['max:255']),
            ImportColumn::make('currency_code')
                ->label('ISO Currency Code')
                ->rules(['max:3']),
            ImportColumn::make('numeric')
                ->label('ISO Numberic')
                ->rules(['max:3']),
            ImportColumn::make('decimal')
                ->label('Decimal')
                ->rules(['max:4']),
            ImportColumn::make('is_active')
                ->boolean()
                ->rules(['boolean']),
        ];
    }

    public function resolveRecord(): ?Currency
    {
        // return Currency::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Currency();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your currency import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
