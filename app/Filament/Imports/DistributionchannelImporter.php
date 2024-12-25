<?php

namespace App\Filament\Imports;

use App\Models\Distributionchannel;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class DistributionchannelImporter extends Importer
{
    protected static ?string $model = Distributionchannel::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('distribution_channel')
                ->rules(['max:2']),
            ImportColumn::make('distribution_channel_name')
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

    public function resolveRecord(): ?Distributionchannel
    {
        // return Distributionchannel::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Distributionchannel();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your distributionchannel import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
