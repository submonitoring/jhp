<?php

namespace App\Filament\Submonitoring\Resources\ReasonformovementResource\Pages;

use App\Filament\Submonitoring\Resources\ReasonformovementResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;

class EditReasonformovement extends EditRecord
{
    protected static string $resource = ReasonformovementResource::class;

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
