<?php

namespace App\Filament\Imports;

use App\Models\Materialplant;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class MaterialplantImporter extends Importer
{
    protected static ?string $model = Materialplant::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('materialmaster_id')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('plant_id')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('loadinggroup_id')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('transportationgroup_id')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('periodindicator_id')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('procurementtype_id')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('specialprocurementtype_id')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('safety_stock')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('minimal_safety_stock')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('slug')
                ->rules(['max:255']),
            ImportColumn::make('is_batch')
                ->boolean()
                ->rules(['boolean']),
            ImportColumn::make('is_active')
                ->boolean()
                ->rules(['boolean']),
            ImportColumn::make('created_by')
                ->rules(['max:255']),
            ImportColumn::make('updated_by')
                ->rules(['max:255']),
        ];
    }

    public function resolveRecord(): ?Materialplant
    {
        // return Materialplant::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Materialplant();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your materialplant import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
