<?php

namespace App\Filament\Imports;

use App\Models\Uom;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class UomImporter extends Importer
{
    protected static ?string $model = Uom::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('uom')
                ->label('UoM')
                ->exampleHeader('UoM')
                ->rules(['max:255']),

            ImportColumn::make('uom_name')
                ->label('UoMName')
                ->exampleHeader('UoMName')
                ->rules(['max:255']),

            ImportColumn::make('iso_uom')
                ->label('ISOUoM')
                ->exampleHeader('ISOUoM')
                ->rules(['max:255']),

            ImportColumn::make('is_active')
                ->label('Active?')
                ->exampleHeader('Active?')
                ->boolean()
                ->rules(['boolean']),

            ImportColumn::make('created_by')
                ->label('Createdby')
                ->exampleHeader('Createdby')
                ->rules(['max:255']),

            ImportColumn::make('updated_by')
                ->label('Updatedby')
                ->exampleHeader('Updatedby')
                ->rules(['max:255']),
        ];
    }

    public function resolveRecord(): ?Uom
    {
        // return Uom::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Uom();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your uom import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
