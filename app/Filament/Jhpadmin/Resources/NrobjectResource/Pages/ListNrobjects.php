<?php

namespace App\Filament\Jhpadmin\Resources\NrobjectResource\Pages;

use App\Filament\Jhpadmin\Resources\NrobjectResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNrobjects extends ListRecords
{
    protected static string $resource = NrobjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
