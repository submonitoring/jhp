<?php

namespace App\Filament\Exports;

use App\Models\Businesspartner;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class BusinesspartnerExporter extends Exporter
{
    protected static ?string $model = Businesspartner::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('numberrange_id'),
            ExportColumn::make('bp_number'),
            ExportColumn::make('bpcategory_id'),
            ExportColumn::make('bprole_id'),
            ExportColumn::make('vat_number'),
            ExportColumn::make('title_id'),
            ExportColumn::make('name_1'),
            ExportColumn::make('name_2'),
            ExportColumn::make('name_3'),
            ExportColumn::make('name_4'),
            ExportColumn::make('telephone_number_1'),
            ExportColumn::make('telephone_number_1_ext'),
            ExportColumn::make('telephone_number_2'),
            ExportColumn::make('telephone_number_2_ext'),
            ExportColumn::make('fax_number_1'),
            ExportColumn::make('fax_number_1_ext'),
            ExportColumn::make('fax_number_2'),
            ExportColumn::make('fax_number_2_ext'),
            ExportColumn::make('handphone_number_1'),
            ExportColumn::make('handphone_number_2'),
            ExportColumn::make('email'),
            ExportColumn::make('country_id'),
            ExportColumn::make('provinsi_id'),
            ExportColumn::make('kabupaten_id'),
            ExportColumn::make('kecamatan_id'),
            ExportColumn::make('kelurahan_id'),
            ExportColumn::make('kodepos_id'),
            ExportColumn::make('kodepos'),
            ExportColumn::make('alamat'),
            ExportColumn::make('rt'),
            ExportColumn::make('rw'),
            ExportColumn::make('city'),
            ExportColumn::make('district'),
            ExportColumn::make('postal_code'),
            ExportColumn::make('region'),
            ExportColumn::make('po_box'),
            ExportColumn::make('street'),
            ExportColumn::make('street_2'),
            ExportColumn::make('street_3'),
            ExportColumn::make('street_4'),
            ExportColumn::make('street_5'),
            ExportColumn::make('building_number'),
            ExportColumn::make('floor'),
            ExportColumn::make('room'),
            ExportColumn::make('is_active'),
            ExportColumn::make('created_by'),
            ExportColumn::make('updated_by'),
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your businesspartner export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
