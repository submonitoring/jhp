<?php

namespace App\Filament\Submonitoring\Resources\ProcurementtypeResource\Pages;

use App\Filament\Submonitoring\Resources\ProcurementtypeResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;

class EditProcurementtype extends EditRecord
{
    protected static string $resource = ProcurementtypeResource::class;

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
