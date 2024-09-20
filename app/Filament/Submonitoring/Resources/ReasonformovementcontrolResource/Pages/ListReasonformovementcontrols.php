<?php

namespace App\Filament\Submonitoring\Resources\ReasonformovementcontrolResource\Pages;

use App\Filament\Submonitoring\Resources\ReasonformovementcontrolResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReasonformovementcontrols extends ListRecords
{
    protected static string $resource = ReasonformovementcontrolResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
