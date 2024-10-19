<?php

namespace App\Filament\Imports;

use App\Models\Itemcategorygroup;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class ItemcategorygroupImporter extends Importer
{
    protected static ?string $model = Itemcategorygroup::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('item_category_group')
                ->label('ItemCatGroup')
                ->exampleHeader('ItemCatGroup')
                ->rules(['max:255']),

            ImportColumn::make('item_category_group_desc')
                ->label('Desc')
                ->exampleHeader('Desc')
                ->rules(['max:255']),

            ImportColumn::make('is_active')
                ->label('Active?')
                ->exampleHeader('Active?')
                ->boolean()
                ->rules(['boolean']),

            ImportColumn::make('created_by')
                ->label('Createdby')
                ->exampleHeader('Createdby')
                ->rules(['max:255']),

            ImportColumn::make('updated_by')
                ->label('Updatedby')
                ->exampleHeader('Updatedby')
                ->rules(['max:255']),
        ];
    }

    public function resolveRecord(): ?Itemcategorygroup
    {
        // return Itemcategorygroup::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Itemcategorygroup();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your itemcategorygroup import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
