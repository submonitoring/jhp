<?php

namespace App\Filament\Submonitoring\Resources\MaterialgroupResource\Pages;

use App\Filament\Submonitoring\Resources\MaterialgroupResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMaterialgroup extends EditRecord
{
    protected static string $resource = MaterialgroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
