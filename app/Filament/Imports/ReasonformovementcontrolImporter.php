<?php

namespace App\Filament\Imports;

use App\Models\Reasonformovementcontrol;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class ReasonformovementcontrolImporter extends Importer
{
    protected static ?string $model = Reasonformovementcontrol::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('reason_for_movement_control')
                ->label('Reas. for Movemnt. Control')
                ->rules(['max:1']),
            ImportColumn::make('reason_for_movement_control_desc')
                ->label('Desc')
                ->rules(['max:255']),
            ImportColumn::make('is_active')
                ->boolean()
                ->rules(['boolean']),
        ];
    }

    public function resolveRecord(): ?Reasonformovementcontrol
    {
        // return Reasonformovementcontrol::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Reasonformovementcontrol();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your reasonformovementcontrol import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
