<?php

namespace App\Filament\Submonitoring\Resources\AddressResource\Pages;

use App\Filament\Submonitoring\Resources\AddressResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;

class EditAddress extends EditRecord
{
    protected static string $resource = AddressResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Action::make('Back to List')
                ->url($this->getResource()::getUrl('index')),
        ];
    }
}
