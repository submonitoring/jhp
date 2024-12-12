<?php

namespace App\Filament\Submonitoring\Resources\MaterialmasterResource\Pages;

use App\Filament\Submonitoring\Resources\MaterialmasterResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;
use Kenepa\ResourceLock\Resources\Pages\Concerns\UsesResourceLock;

class EditMaterialmaster extends EditRecord
{
    protected static string $resource = MaterialmasterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Action::make('Back to List')
                ->url($this->getResource()::getUrl('index')),
        ];
    }

    use UsesResourceLock;
}
