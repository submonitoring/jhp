<?php

namespace App\Filament\Submonitoring\Resources\MaterialdocumentheaderResource\Pages;

use App\Filament\Submonitoring\Resources\MaterialdocumentheaderResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;
use Kenepa\ResourceLock\Resources\Pages\Concerns\UsesResourceLock;

class EditMaterialdocumentheader extends EditRecord
{
    protected static string $resource = MaterialdocumentheaderResource::class;

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
