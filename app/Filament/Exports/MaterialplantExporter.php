<?php

namespace App\Filament\Exports;

use App\Models\Materialplant;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class MaterialplantExporter extends Exporter
{
    protected static ?string $model = Materialplant::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('materialmaster_id'),
            ExportColumn::make('plant_id'),
            ExportColumn::make('loadinggroup_id'),
            ExportColumn::make('transportationgroup_id'),
            ExportColumn::make('periodindicator_id'),
            ExportColumn::make('procurementtype_id'),
            ExportColumn::make('specialprocurementtype_id'),
            ExportColumn::make('safety_stock'),
            ExportColumn::make('minimal_safety_stock'),
            ExportColumn::make('slug'),
            ExportColumn::make('is_batch'),
            ExportColumn::make('is_active'),
            ExportColumn::make('created_by'),
            ExportColumn::make('updated_by'),
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your materialplant export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
