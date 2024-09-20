<?php

namespace App\Filament\Jhpadmin\Resources\MaterialtypeResource\Pages;

use App\Filament\Jhpadmin\Resources\MaterialtypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMaterialtype extends EditRecord
{
    protected static string $resource = MaterialtypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
