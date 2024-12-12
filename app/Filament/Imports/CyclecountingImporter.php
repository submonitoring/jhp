<?php

namespace App\Filament\Imports;

use App\Models\Cyclecounting;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class CyclecountingImporter extends Importer
{
    protected static ?string $model = Cyclecounting::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('cycle_counting')
                ->label('Cycle Counting')
                ->rules(['max:1']),
            ImportColumn::make('cycle_counting_desc')
                ->label('Desc')
                ->rules(['max:255']),
            ImportColumn::make('number_per_year')
                ->label('Number per year')
                ->rules(['max:3']),
            ImportColumn::make('is_active')
                ->boolean()
                ->rules(['boolean']),
        ];
    }

    public function resolveRecord(): ?Cyclecounting
    {
        // return Cyclecounting::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Cyclecounting();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your cyclecounting import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
