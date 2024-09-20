<?php

namespace App\Filament\Submonitoring\Resources\ItemcategorygroupResource\Pages;

use App\Filament\Submonitoring\Resources\ItemcategorygroupResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateItemcategorygroup extends CreateRecord
{
    protected static string $resource = ItemcategorygroupResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
