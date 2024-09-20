<?php

namespace App\Filament\Jhpadmin\Resources\NumberrangeResource\Pages;

use App\Filament\Jhpadmin\Resources\NumberrangeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNumberranges extends ListRecords
{
    protected static string $resource = NumberrangeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
