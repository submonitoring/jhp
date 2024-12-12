<?php

namespace App\Filament\Imports;

use App\Models\Bprole;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class BproleImporter extends Importer
{
    protected static ?string $model = Bprole::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('bprole')
                ->label('BP Role')
                ->rules(['max:6']),
            ImportColumn::make('bprole_desc')
                ->label('Desc')
                ->rules(['max:255']),
            ImportColumn::make('is_active')
                ->boolean()
                ->rules(['boolean']),
        ];
    }

    public function resolveRecord(): ?Bprole
    {
        // return Bprole::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Bprole();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your bprole import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
