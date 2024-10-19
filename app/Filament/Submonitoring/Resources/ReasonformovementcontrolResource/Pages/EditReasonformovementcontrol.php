<?php

namespace App\Filament\Submonitoring\Resources\ReasonformovementcontrolResource\Pages;

use App\Filament\Submonitoring\Resources\ReasonformovementcontrolResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;

class EditReasonformovementcontrol extends EditRecord
{
    protected static string $resource = ReasonformovementcontrolResource::class;

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
