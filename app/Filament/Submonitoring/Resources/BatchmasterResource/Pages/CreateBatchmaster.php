<?php

namespace App\Filament\Submonitoring\Resources\BatchmasterResource\Pages;

use App\Filament\Submonitoring\Resources\BatchmasterResource;
use App\Models\Batchsource;
use App\Models\Numberrange;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateBatchmaster extends CreateRecord
{
    protected static string $resource = BatchmasterResource::class;

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

        $getbatchsource = $this->data['batchsource_id'];

        $getnriid = Batchsource::whereId($getbatchsource)->first();

        $getcurrentnr = Numberrange::whereId($getnriid->numberrange_id)->first();

        if ($getcurrentnr->is_external === 1) {

            $data['batch_number'] = $this->data['batch_number'];
            return $data;
        } else {

            if ($getcurrentnr->current_number === null) {

                $data['batch_number'] = $getcurrentnr->number;

                $updatecurrentnumber = Numberrange::whereId($getnriid->numberrange_id)->first();
                $updatecurrentnumber->current_number = $data['batch_number'];
                $updatecurrentnumber->save();

                return $data;
            } else {

                $data['batch_number'] = $getcurrentnr->current_number + 1;

                $updatecurrentnumber = Numberrange::whereId($getnriid->numberrange_id)->first();
                $updatecurrentnumber->current_number = $data['batch_number'];
                $updatecurrentnumber->save();

                return $data;
            }
        }
    }
}
