<?php

namespace App\Filament\Imports;

use App\Models\Sysobject;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class SysobjectImporter extends Importer
{
    protected static ?string $model = Sysobject::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('1')
                ->rules(['max:255']),
            ImportColumn::make('2')
                ->rules(['max:255']),
            ImportColumn::make('3')
                ->rules(['max:255']),
            ImportColumn::make('4')
                ->rules(['max:255']),
            ImportColumn::make('5')
                ->rules(['max:255']),
            ImportColumn::make('6')
                ->rules(['max:255']),
            ImportColumn::make('7')
                ->rules(['max:255']),
            ImportColumn::make('8')
                ->rules(['max:255']),
            ImportColumn::make('9')
                ->rules(['max:255']),
            ImportColumn::make('link')
                ->rules(['max:255']),
            ImportColumn::make('is_active')
                ->boolean()
                ->rules(['boolean']),
            ImportColumn::make('created_by')
                ->rules(['max:255']),
            ImportColumn::make('updated_by')
                ->rules(['max:255']),
        ];
    }

    public function resolveRecord(): ?Sysobject
    {
        // return Sysobject::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Sysobject();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your sysobject import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
