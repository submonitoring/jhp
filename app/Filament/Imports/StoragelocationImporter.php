<?php

namespace App\Filament\Imports;

use App\Models\Storagelocation;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class StoragelocationImporter extends Importer
{
    protected static ?string $model = Storagelocation::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('storage_location')
                ->label('Storage Location')
                ->rules(['max:4']),
            ImportColumn::make('storage_location_name')
                ->label('Name')
                ->rules(['max:255']),
            ImportColumn::make('plant_id')
                ->label('Plant ID')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('is_active')
                ->boolean()
                ->rules(['boolean']),
        ];
    }

    public function resolveRecord(): ?Storagelocation
    {
        // return Storagelocation::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Storagelocation();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your storagelocation import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
