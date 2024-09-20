<?php

namespace App\Filament\Submonitoring\Resources\AddressResource\Pages;

use App\Filament\Submonitoring\Resources\AddressResource;
use App\Models\Numberrange;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAddress extends CreateRecord
{
    protected static string $resource = AddressResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {

        $currentnriid = $this->data['numberrange_id'];

        $getcurrentnr = Numberrange::whereId($currentnriid)->first();

        if ($getcurrentnr->current_number === null) {

            $data['address_number'] = $getcurrentnr->number;

            $updatecurrentnumber = Numberrange::whereId($currentnriid)->first();
            $updatecurrentnumber->current_number = $data['address_number'];
            $updatecurrentnumber->save();

            return $data;
        } else {

            $data['address_number'] = $getcurrentnr->current_number + 1;

            $updatecurrentnumber = Numberrange::whereId($currentnriid)->first();
            $updatecurrentnumber->current_number = $data['address_number'];
            $updatecurrentnumber->save();

            return $data;
        }
    }

    // protected function beforeCreate(): void
    // {

    //     $updatecurrentnumber = Numberrange::whereId($this->data['numberrange_id'])->first();
    //     $updatecurrentnumber->current_number = $this->data['address_number'];
    //     $updatecurrentnumber->save();
    // }
}
