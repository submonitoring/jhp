<?php

namespace App\Filament\Submonitoring\Resources\NumberrangeResource\Pages;

use App\Filament\Submonitoring\Resources\NumberrangeResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;
use Kenepa\ResourceLock\Resources\Pages\Concerns\UsesResourceLock;

class EditNumberrange extends EditRecord
{
    protected static string $resource = NumberrangeResource::class;

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
