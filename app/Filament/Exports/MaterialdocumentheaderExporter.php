<?php

namespace App\Filament\Exports;

use App\Models\Materialdocumentheader;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class MaterialdocumentheaderExporter extends Exporter
{
    protected static ?string $model = Materialdocumentheader::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('numberrange_id'),
            ExportColumn::make('document_number'),
            ExportColumn::make('material_document_year'),
            ExportColumn::make('status_id'),
            ExportColumn::make('transactiontype_id'),
            ExportColumn::make('documenttype_id'),
            ExportColumn::make('businesspartner_id'),
            ExportColumn::make('document_date'),
            ExportColumn::make('posting_date'),
            ExportColumn::make('transactionreference_id'),
            ExportColumn::make('reference_document_number'),
            ExportColumn::make('status'),
            ExportColumn::make('matdoc_header_text'),
            ExportColumn::make('is_external'),
            ExportColumn::make('materialdocumentitems'),
            ExportColumn::make('is_active'),
            ExportColumn::make('executed'),
            ExportColumn::make('created_by'),
            ExportColumn::make('updated_by'),
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your materialdocumentheader export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
