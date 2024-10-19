<?php

namespace App\Filament\Imports;

use App\Models\Loadinggroup;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class LoadinggroupImporter extends Importer
{
    protected static ?string $model = Loadinggroup::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('loading_group')
                ->label('LoadingGroup')
                ->exampleHeader('LoadingGroup')
                ->rules(['max:4']),

            ImportColumn::make('loading_group_desc')
                ->label('Desc')
                ->exampleHeader('Desc')
                ->rules(['max:255']),

            ImportColumn::make('is_active')
                ->label('Active?')
                ->exampleHeader('Active?')
                ->boolean()
                ->rules(['boolean']),

            ImportColumn::make('created_by')
                ->label('Createdby')
                ->exampleHeader('Createdby')
                ->rules(['max:255']),

            ImportColumn::make('updated_by')
                ->label('Updatedby')
                ->exampleHeader('Updatedby')
                ->rules(['max:255']),
        ];
    }

    public function resolveRecord(): ?Loadinggroup
    {
        // return Loadinggroup::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Loadinggroup();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your loadinggroup import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
