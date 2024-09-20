<?php

namespace App\Filament\Submonitoring\Resources\MaterialmasterResource\Pages;

use App\Filament\Submonitoring\Resources\MaterialmasterResource;
use App\Models\Materialtype;
use App\Models\Numberrange;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMaterialmaster extends CreateRecord
{
    protected static string $resource = MaterialmasterResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {

        $getmaterialtype = $this->data['materialtype_id'];

        $getnriid = Materialtype::whereId($getmaterialtype)->first();

        $getcurrentnr = Numberrange::whereId($getnriid->numberrange_id)->first();

        if ($getcurrentnr->is_external === 1) {

            $data['material_number'] = $this->data['material_number'];
            return $data;
        } else {

            if ($getcurrentnr->current_number === null) {

                $data['material_number'] = $getcurrentnr->number;

                $updatecurrentnumber = Numberrange::whereId($getnriid->numberrange_id)->first();
                $updatecurrentnumber->current_number = $data['material_number'];
                $updatecurrentnumber->save();

                return $data;
            } else {

                $data['material_number'] = $getcurrentnr->current_number + 1;

                $updatecurrentnumber = Numberrange::whereId($getnriid->numberrange_id)->first();
                $updatecurrentnumber->current_number = $data['material_number'];
                $updatecurrentnumber->save();

                return $data;
            }
        }
    }
}
