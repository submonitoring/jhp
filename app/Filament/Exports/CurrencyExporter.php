<?php

namespace App\Filament\Exports;

use App\Models\Currency;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class CurrencyExporter extends Exporter
{
    protected static ?string $model = Currency::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),

            ExportColumn::make('currency')
                ->label('Currency'),

            ExportColumn::make('symbol')
                ->label('Symbol'),

            ExportColumn::make('currency_code')
                ->label('Currency Code'),

            ExportColumn::make('numeric')
                ->label('Numeric Code'),

            ExportColumn::make('decimal')
                ->label('Decimal'),

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
        $body = 'Your currency export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
