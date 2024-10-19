<?php

namespace App\Filament\Submonitoring\Resources\BusinesspartnerResource\Pages;

use App\Filament\Submonitoring\Resources\BusinesspartnerResource;
use App\Models\Numberrange;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateBusinesspartner extends CreateRecord
{
    protected static string $resource = BusinesspartnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('Back to List')
                ->url($this->getResource()::getUrl('index')),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {

        $currentnriid = $this->data['numberrange_id'];

        $getcurrentnr = Numberrange::whereId($currentnriid)->first();

        if ($getcurrentnr->current_number === null) {

            $data['bp_number'] = $getcurrentnr->number;

            $updatecurrentnumber = Numberrange::whereId($currentnriid)->first();
            $updatecurrentnumber->current_number = $data['bp_number'];
            $updatecurrentnumber->save();

            return $data;
        } else {

            $data['bp_number'] = $getcurrentnr->current_number + 1;

            $updatecurrentnumber = Numberrange::whereId($currentnriid)->first();
            $updatecurrentnumber->current_number = $data['bp_number'];
            $updatecurrentnumber->save();

            return $data;
        }
    }
}
