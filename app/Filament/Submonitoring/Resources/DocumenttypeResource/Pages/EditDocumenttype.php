<?php

namespace App\Filament\Submonitoring\Resources\DocumenttypeResource\Pages;

use App\Filament\Submonitoring\Resources\DocumenttypeResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;

class EditDocumenttype extends EditRecord
{
    protected static string $resource = DocumenttypeResource::class;

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
