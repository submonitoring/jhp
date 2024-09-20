<?php

namespace App\Filament\Submonitoring\Resources\DocumenttypeResource\Pages;

use App\Filament\Submonitoring\Resources\DocumenttypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDocumenttype extends EditRecord
{
    protected static string $resource = DocumenttypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
