<?php

namespace App\Filament\Submonitoring\Resources\DocumenttypeResource\Pages;

use App\Filament\Submonitoring\Resources\DocumenttypeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDocumenttype extends CreateRecord
{
    protected static string $resource = DocumenttypeResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
