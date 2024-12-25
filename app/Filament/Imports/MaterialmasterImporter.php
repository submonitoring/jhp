<?php

namespace App\Filament\Imports;

use App\Models\Materialmaster;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class MaterialmasterImporter extends Importer
{
    protected static ?string $model = Materialmaster::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('numberrange_id')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('material_number')
                ->rules(['max:10']),
            ImportColumn::make('material_desc')
                ->rules(['max:255']),
            ImportColumn::make('old_material_number')
                ->rules(['max:255']),
            ImportColumn::make('materialtype_id')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('class'),
            ImportColumn::make('industrysector_id')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('materialgroup_id')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('itemcategorygroup_id')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('base_uom')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('weight_unit')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('gross_weight')
                ->rules(['max:3']),
            ImportColumn::make('net_weight')
                ->rules(['max:3']),
            ImportColumn::make('deletion_flag')
                ->boolean()
                ->rules(['boolean']),
            ImportColumn::make('is_active')
                ->boolean()
                ->rules(['boolean']),
            ImportColumn::make('created_by')
                ->rules(['max:255']),
            ImportColumn::make('updated_by')
                ->rules(['max:255']),
            ImportColumn::make('is_external')
                ->boolean()
                ->rules(['boolean']),
        ];
    }

    public function resolveRecord(): ?Materialmaster
    {
        // return Materialmaster::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Materialmaster();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your materialmaster import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
