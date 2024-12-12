<?php

namespace App\Filament\Imports;

use App\Models\Numberrange;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class NumberrangeImporter extends Importer
{
    protected static ?string $model = Numberrange::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('nrobject_id')
                ->label('NR Object ID')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('nr_interval')
                ->label('NR Interval')
                ->rules(['max:4']),
            ImportColumn::make('nr_name')
                ->label('Name')
                ->rules(['max:255']),
            ImportColumn::make('year')
                ->label('Year')
                ->rules(['max:4']),
            ImportColumn::make('number')
                ->label('Number from')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('is_external')
                ->boolean()
                ->rules(['boolean']),
            ImportColumn::make('is_active')
                ->boolean()
                ->rules(['boolean']),
        ];
    }

    public function resolveRecord(): ?Numberrange
    {
        // return Numberrange::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Numberrange();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your numberrange import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
