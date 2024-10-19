<?php

namespace App\Filament\Submonitoring\Resources\BpcategoryResource\Pages;

use App\Filament\Submonitoring\Resources\BpcategoryResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;

class EditBpcategory extends EditRecord
{
    protected static string $resource = BpcategoryResource::class;

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
