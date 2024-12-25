<?php

namespace App\Filament\Imports;

use App\Models\Materialdocumentheader;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class MaterialdocumentheaderImporter extends Importer
{
    protected static ?string $model = Materialdocumentheader::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('numberrange_id')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('document_number')
                ->rules(['max:10']),
            ImportColumn::make('material_document_year')
                ->rules(['max:4']),
            ImportColumn::make('status_id')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('transactiontype_id')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('documenttype_id')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('businesspartner_id')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('document_date')
                ->rules(['date']),
            ImportColumn::make('posting_date')
                ->rules(['date']),
            ImportColumn::make('transactionreference_id')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('reference_document_number')
                ->rules(['max:255']),
            ImportColumn::make('status')
                ->rules(['max:255']),
            ImportColumn::make('matdoc_header_text'),
            ImportColumn::make('is_external')
                ->boolean()
                ->rules(['boolean']),
            ImportColumn::make('materialdocumentitems'),
            ImportColumn::make('is_active')
                ->boolean()
                ->rules(['boolean']),
            ImportColumn::make('executed')
                ->boolean()
                ->rules(['boolean']),
            ImportColumn::make('created_by')
                ->rules(['max:255']),
            ImportColumn::make('updated_by')
                ->rules(['max:255']),
        ];
    }

    public function resolveRecord(): ?Materialdocumentheader
    {
        // return Materialdocumentheader::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Materialdocumentheader();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your materialdocumentheader import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
