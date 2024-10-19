<?php

namespace App\Filament\Submonitoring\Resources\ItemcategorygroupResource\Pages;

use App\Filament\Submonitoring\Resources\ItemcategorygroupResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateItemcategorygroup extends CreateRecord
{
    protected static string $resource = ItemcategorygroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('Back to List')
                ->url($this->getResource()::getUrl('index')),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
