<?php

namespace App\Filament\Submonitoring\Resources\StoragelocationResource\Pages;

use App\Filament\Submonitoring\Resources\StoragelocationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStoragelocation extends EditRecord
{
    protected static string $resource = StoragelocationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
