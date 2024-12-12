<?php

namespace App\Filament\Imports;

use App\Models\Documenttype;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class DocumenttypeImporter extends Importer
{
    protected static ?string $model = Documenttype::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('numberrange_id')
                ->label('Number Range ID')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('documenttype_id')
                ->label('Reversal Doc Type ID')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('document_type')
                ->label('Doc Type')
                ->rules(['max:2']),
            ImportColumn::make('document_type_desc')
                ->label('Desc')
                ->rules(['max:255']),
            ImportColumn::make('is_active')
                ->boolean()
                ->rules(['boolean']),
        ];
    }

    public function resolveRecord(): ?Documenttype
    {
        // return Documenttype::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Documenttype();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your documenttype import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
