<?php

namespace App\Filament\Imports;

use App\Models\Materialtype;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class MaterialtypeImporter extends Importer
{
    protected static ?string $model = Materialtype::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('material_type')
                ->label('MaterialType')
                ->exampleHeader('MaterialType')
                ->rules(['max:4']),

            ImportColumn::make('material_type_desc')
                ->label('Description')
                ->exampleHeader('Description')
                ->rules(['max:255']),

            ImportColumn::make('numberrange_id')
                ->label('NumberRangeID')
                ->exampleHeader('NumberRangeID')
                ->numeric()
                ->rules(['integer']),

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

    public function resolveRecord(): ?Materialtype
    {
        // return Materialtype::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Materialtype();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your materialtype import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
