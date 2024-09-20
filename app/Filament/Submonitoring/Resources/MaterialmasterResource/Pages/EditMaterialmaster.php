<?php

namespace App\Filament\Submonitoring\Resources\MaterialmasterResource\Pages;

use App\Filament\Submonitoring\Resources\MaterialmasterResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMaterialmaster extends EditRecord
{
    protected static string $resource = MaterialmasterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
