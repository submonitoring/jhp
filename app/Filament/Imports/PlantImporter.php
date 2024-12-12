<?php

namespace App\Filament\Imports;

use App\Models\Plant;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class PlantImporter extends Importer
{
    protected static ?string $model = Plant::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('plant')
                ->label('Plant')
                ->rules(['max:4']),
            ImportColumn::make('plant_name')
                ->label('Name')
                ->rules(['max:255']),
            ImportColumn::make('companycode_id')
                ->label('Company Code ID')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('is_active')
                ->boolean()
                ->rules(['boolean']),
        ];
    }

    public function resolveRecord(): ?Plant
    {
        // return Plant::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Plant();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your plant import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
