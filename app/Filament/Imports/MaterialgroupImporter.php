<?php

namespace App\Filament\Imports;

use App\Models\Materialgroup;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class MaterialgroupImporter extends Importer
{
    protected static ?string $model = Materialgroup::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('material_group')
                ->label('Mat Group')
                ->rules(['max:9']),
            ImportColumn::make('material_group_desc')
                ->label('Desc')
                ->rules(['max:255']),
            ImportColumn::make('is_active')
                ->boolean()
                ->rules(['boolean']),
        ];
    }

    public function resolveRecord(): ?Materialgroup
    {
        // return Materialgroup::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Materialgroup();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your materialgroup import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
