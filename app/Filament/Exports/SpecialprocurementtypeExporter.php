<?php

namespace App\Filament\Exports;

use App\Models\Specialprocurementtype;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class SpecialprocurementtypeExporter extends Exporter
{
    protected static ?string $model = Specialprocurementtype::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),

            ExportColumn::make('special_procurement_type')
                ->label('Special Procurement Type'),

            ExportColumn::make('special_procurement_type_desc')
                ->label('Desc'),

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
        $body = 'Your specialprocurementtype export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
