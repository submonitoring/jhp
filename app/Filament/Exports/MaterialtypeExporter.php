<?php

namespace App\Filament\Exports;

use App\Models\Materialtype;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class MaterialtypeExporter extends Exporter
{
    protected static ?string $model = Materialtype::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),

            ExportColumn::make('material_type')
                ->label('Material Type'),

            ExportColumn::make('material_type_desc')
                ->label('Description'),

            ExportColumn::make('numberrange_id')
                ->label('Number Range ID'),

            ExportColumn::make('numberrange.nr_interval')
                ->label('Number Range'),

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
        $body = 'Your materialtype export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
