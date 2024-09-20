<?php

namespace App\Filament\Submonitoring\Resources\SpecialprocurementtypeResource\Pages;

use App\Filament\Submonitoring\Resources\SpecialprocurementtypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSpecialprocurementtype extends EditRecord
{
    protected static string $resource = SpecialprocurementtypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
