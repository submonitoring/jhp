<?php

namespace App\Filament\Submonitoring\Resources\BusinesspartnerResource\Pages;

use App\Filament\Submonitoring\Resources\BusinesspartnerResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;

class EditBusinesspartner extends EditRecord
{
    protected static string $resource = BusinesspartnerResource::class;

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
