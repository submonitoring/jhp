<?php

namespace App\Filament\Imports;

use App\Models\Temperaturecondition;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class TemperatureconditionImporter extends Importer
{
    protected static ?string $model = Temperaturecondition::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('temperature_condition')
                ->label('Temperature Condition')
                ->rules(['max:2']),
            ImportColumn::make('temperature_condition_desc')
                ->label('Desc')
                ->rules(['max:255']),
            ImportColumn::make('is_active')
                ->boolean()
                ->rules(['boolean']),
        ];
    }

    public function resolveRecord(): ?Temperaturecondition
    {
        // return Temperaturecondition::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Temperaturecondition();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your temperaturecondition import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
