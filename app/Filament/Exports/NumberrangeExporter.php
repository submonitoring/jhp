<?php

namespace App\Filament\Exports;

use App\Models\Numberrange;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class NumberrangeExporter extends Exporter
{
    protected static ?string $model = Numberrange::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),

            ExportColumn::make('nrobject_id')
                ->label('NR Object ID'),

            ExportColumn::make('nrobject.nrobject')
                ->label('NR Object'),

            ExportColumn::make('nr_interval')
                ->label('NR Interval'),

            ExportColumn::make('year')
                ->label('Year'),

            ExportColumn::make('number')
                ->label('Number'),

            ExportColumn::make('current_number')
                ->label('Current Number'),

            ExportColumn::make('is_external')
                ->label('External?'),

            ExportColumn::make('is_active')
                ->label('Active?'),

            ExportColumn::make('created_by')
                ->label('Created by'),

            ExportColumn::make('updated_by')
                ->label('Updated by'),

            ExportColumn::make('created_at')
                ->label('Created at'),

            ExportColumn::make('updated_at')
                ->label('Updated at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your numberrange export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
