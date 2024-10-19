<?php

namespace App\Filament\Imports;

use App\Models\Specialprocurementtype;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class SpecialprocurementtypeImporter extends Importer
{
    protected static ?string $model = Specialprocurementtype::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('special_procurement_type')
                ->label('SpecialProcurementType')
                ->exampleHeader('SpecialProcurementType')
                ->rules(['max:1']),

            ImportColumn::make('special_procurement_type_desc')
                ->label('Desc')
                ->exampleHeader('Desc')
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

    public function resolveRecord(): ?Specialprocurementtype
    {
        // return Specialprocurementtype::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Specialprocurementtype();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your specialprocurementtype import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
