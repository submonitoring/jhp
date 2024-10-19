<?php

namespace App\Filament\Submonitoring\Resources\BproleResource\Pages;

use App\Filament\Submonitoring\Resources\BproleResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;

class EditBprole extends EditRecord
{
    protected static string $resource = BproleResource::class;

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
