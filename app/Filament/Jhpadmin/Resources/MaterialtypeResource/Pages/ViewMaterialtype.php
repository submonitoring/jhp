<?php

namespace App\Filament\Jhpadmin\Resources\MaterialtypeResource\Pages;

use App\Filament\Jhpadmin\Resources\MaterialtypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMaterialtype extends ViewRecord
{
    protected static string $resource = MaterialtypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
