<?php

namespace App\Filament\Imports;

use App\Models\Movementtype;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class MovementtypeImporter extends Importer
{
    protected static ?string $model = Movementtype::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('movement_type')
                ->label('Movement Type')
                ->rules(['max:3']),
            ImportColumn::make('movement_type_desc')
                ->label('Desc')
                ->rules(['max:255']),
            ImportColumn::make('debitcreditindicator_id')
                ->label('Debit Credit Ind. ID')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('reasonformovementcontrol_id')
                ->label('Reason for Movement Control ID')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('stocktype_id')
                ->label('Stock Type ID')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('is_reversal')
                ->boolean()
                ->rules(['boolean']),
            ImportColumn::make('is_active')
                ->boolean()
                ->rules(['boolean']),

        ];
    }

    public function resolveRecord(): ?Movementtype
    {
        // return Movementtype::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Movementtype();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your movementtype import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
