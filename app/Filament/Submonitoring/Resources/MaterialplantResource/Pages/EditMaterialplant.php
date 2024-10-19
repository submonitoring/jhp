<?php

namespace App\Filament\Submonitoring\Resources\MaterialplantResource\Pages;

use App\Filament\Submonitoring\Resources\MaterialplantResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;

class EditMaterialplant extends EditRecord
{
    protected static string $resource = MaterialplantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Action::make('Back to List')
                ->url($this->getResource()::getUrl('index')),
        ];
    }
}
