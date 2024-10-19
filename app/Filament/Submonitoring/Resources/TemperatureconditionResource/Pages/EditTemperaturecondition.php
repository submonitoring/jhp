<?php

namespace App\Filament\Submonitoring\Resources\TemperatureconditionResource\Pages;

use App\Filament\Submonitoring\Resources\TemperatureconditionResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;

class EditTemperaturecondition extends EditRecord
{
    protected static string $resource = TemperatureconditionResource::class;

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
