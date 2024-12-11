<?php

namespace App\Filament\Submonitoring\Resources\MaterialdocumentheaderResource\Pages;

use App\Filament\Submonitoring\Resources\MaterialdocumentheaderResource;
use App\Models\Documenttype;
use App\Models\Numberrange;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateMaterialdocumentheader extends CreateRecord
{
    protected static string $resource = MaterialdocumentheaderResource::class;

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

        $doctype = $this->data['documenttype_id'];

        $getnriid = Documenttype::whereId($doctype)->first();

        $getcurrentnr = Numberrange::whereId($getnriid->numberrange_id)->first();

        if ($getcurrentnr->is_external === 1) {
            $data['document_number'] = $this->data['document_number'];
            return $data;
        } else {

            if ($getcurrentnr->current_number === null) {

                $data['document_number'] = $getcurrentnr->number;

                $updatecurrentnumber = Numberrange::whereId($getnriid->numberrange_id)->first();
                $updatecurrentnumber->current_number = $data['document_number'];
                $updatecurrentnumber->save();

                return $data;
            } else {

                $data['document_number'] = $getcurrentnr->current_number + 1;

                $updatecurrentnumber = Numberrange::whereId($getnriid->numberrange_id)->first();
                $updatecurrentnumber->current_number = $data['document_number'];
                $updatecurrentnumber->save();

                return $data;
            }
        }
    }
}
