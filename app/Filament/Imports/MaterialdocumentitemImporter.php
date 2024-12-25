<?php

namespace App\Filament\Imports;

use App\Models\Materialdocumentitem;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class MaterialdocumentitemImporter extends Importer
{
    protected static ?string $model = Materialdocumentitem::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('sort')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('materialdocumentheader_id')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('movementtype_id')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('materialmaster_id')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('plant_id')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('storagelocation_id')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('stocktype_id')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('debitcreditindicator_id')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('batchmaster_id')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('quantity')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('uom_id')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('reasonformovement_id')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('matdoc_item_text'),
            ImportColumn::make('is_active')
                ->boolean()
                ->rules(['boolean']),
            ImportColumn::make('created_by')
                ->rules(['max:255']),
            ImportColumn::make('updated_by')
                ->rules(['max:255']),
        ];
    }

    public function resolveRecord(): ?Materialdocumentitem
    {
        // return Materialdocumentitem::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Materialdocumentitem();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your materialdocumentitem import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
