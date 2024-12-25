<?php

namespace App\Filament\Imports;

use App\Models\Salesorganization;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class SalesorganizationImporter extends Importer
{
    protected static ?string $model = Salesorganization::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('sales_organization')
                ->rules(['max:4']),
            ImportColumn::make('sales_organization_name')
                ->rules(['max:255']),
            ImportColumn::make('companycode_id')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('currency_id')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('is_active')
                ->boolean()
                ->rules(['boolean']),
            ImportColumn::make('created_by')
                ->rules(['max:255']),
            ImportColumn::make('updated_by')
                ->rules(['max:255']),
        ];
    }

    public function resolveRecord(): ?Salesorganization
    {
        // return Salesorganization::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Salesorganization();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your salesorganization import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
