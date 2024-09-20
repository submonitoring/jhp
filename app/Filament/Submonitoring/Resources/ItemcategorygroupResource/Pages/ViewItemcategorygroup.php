<?php

namespace App\Filament\Submonitoring\Resources\ItemcategorygroupResource\Pages;

use App\Filament\Submonitoring\Resources\ItemcategorygroupResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewItemcategorygroup extends ViewRecord
{
    protected static string $resource = ItemcategorygroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
