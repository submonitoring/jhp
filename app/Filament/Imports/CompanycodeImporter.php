<?php

namespace App\Filament\Imports;

use App\Models\Companycode;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class CompanycodeImporter extends Importer
{
    protected static ?string $model = Companycode::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('company_code')
                ->label('Company Code')
                ->rules(['max:4']),
            ImportColumn::make('company_code_name')
                ->label('Name')
                ->rules(['max:255']),
            ImportColumn::make('vat_number')
                ->label('NPWP')
                ->rules(['max:255']),
            ImportColumn::make('currency_id')
                ->label('Currency ID')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('is_active')
                ->boolean()
                ->rules(['boolean']),
        ];
    }

    public function resolveRecord(): ?Companycode
    {
        // return Companycode::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Companycode();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your companycode import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
