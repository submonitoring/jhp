<?php

namespace App\Filament\Submonitoring\Resources\StatusResource\Pages;

use App\Filament\Submonitoring\Resources\StatusResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;
use Kenepa\ResourceLock\Resources\Pages\Concerns\UsesResourceLock;

class EditStatus extends EditRecord
{
    use UsesResourceLock;

    protected static string $resource = StatusResource::class;

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
