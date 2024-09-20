<?php

namespace App\Filament\Submonitoring\Resources\ItemcategorygroupResource\Pages;

use App\Filament\Submonitoring\Resources\ItemcategorygroupResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditItemcategorygroup extends EditRecord
{
    protected static string $resource = ItemcategorygroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
