<?php

namespace App\Filament\Exports;

use App\Models\Sysobject;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class SysobjectExporter extends Exporter
{
    protected static ?string $model = Sysobject::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('1'),
            ExportColumn::make('2'),
            ExportColumn::make('3'),
            ExportColumn::make('4'),
            ExportColumn::make('5'),
            ExportColumn::make('6'),
            ExportColumn::make('7'),
            ExportColumn::make('8'),
            ExportColumn::make('9'),
            ExportColumn::make('link'),
            ExportColumn::make('is_active'),
            ExportColumn::make('created_by'),
            ExportColumn::make('updated_by'),
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your sysobject export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
