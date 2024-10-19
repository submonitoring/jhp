<?php

namespace App\Filament\Submonitoring\Resources\CountryResource\Pages;

use App\Filament\Submonitoring\Resources\CountryResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;

class EditCountry extends EditRecord
{
    protected static string $resource = CountryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            // Actions\DeleteAction::make(),
            Action::make('Back to List')
                ->url($this->getResource()::getUrl('index')),
        ];
    }
}
