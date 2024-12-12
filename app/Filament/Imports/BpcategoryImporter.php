<?php

namespace App\Filament\Imports;

use App\Models\Bpcategory;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class BpcategoryImporter extends Importer
{
    protected static ?string $model = Bpcategory::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('bpcategory')
                ->label('BP Category')
                ->rules(['max:1']),
            ImportColumn::make('bpcategory_desc')
                ->label('Desc')
                ->rules(['max:255']),
            ImportColumn::make('is_active')
                ->boolean()
                ->rules(['boolean']),
        ];
    }

    public function resolveRecord(): ?Bpcategory
    {
        // return Bpcategory::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Bpcategory();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your bpcategory import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
