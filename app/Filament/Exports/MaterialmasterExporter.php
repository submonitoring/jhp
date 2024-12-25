<?php

namespace App\Filament\Exports;

use App\Models\Materialmaster;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class MaterialmasterExporter extends Exporter
{
    protected static ?string $model = Materialmaster::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('numberrange_id'),
            ExportColumn::make('material_number'),
            ExportColumn::make('material_desc'),
            ExportColumn::make('old_material_number'),
            ExportColumn::make('materialtype_id'),
            ExportColumn::make('class'),
            ExportColumn::make('industrysector_id'),
            ExportColumn::make('materialgroup_id'),
            ExportColumn::make('itemcategorygroup_id'),
            ExportColumn::make('base_uom'),
            ExportColumn::make('weight_unit'),
            ExportColumn::make('gross_weight'),
            ExportColumn::make('net_weight'),
            ExportColumn::make('deletion_flag'),
            ExportColumn::make('is_active'),
            ExportColumn::make('created_by'),
            ExportColumn::make('updated_by'),
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
            ExportColumn::make('is_external'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your materialmaster export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
