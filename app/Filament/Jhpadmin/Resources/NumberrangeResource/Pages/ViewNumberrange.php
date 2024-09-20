<?php

namespace App\Filament\Jhpadmin\Resources\NumberrangeResource\Pages;

use App\Filament\Jhpadmin\Resources\NumberrangeResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewNumberrange extends ViewRecord
{
    protected static string $resource = NumberrangeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
