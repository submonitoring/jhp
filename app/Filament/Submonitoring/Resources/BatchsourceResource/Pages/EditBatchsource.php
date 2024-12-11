<?php

namespace App\Filament\Submonitoring\Resources\BatchsourceResource\Pages;

use App\Filament\Submonitoring\Resources\BatchsourceResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;

class EditBatchsource extends EditRecord
{
    protected static string $resource = BatchsourceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Action::make('Back to List')
                ->url($this->getResource()::getUrl('index')),
        ];
    }
}
