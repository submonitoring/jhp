<?php

namespace App\Filament\Submonitoring\Resources\CompanycodeResource\RelationManagers;

use App\Filament\Submonitoring\Resources\AddressResource;
use App\Models\Address;
use App\Models\Companycode;
use App\Models\Numberrange;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\QueryBuilder;
use Filament\Tables\Filters\QueryBuilder\Constraints\BooleanConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\TextConstraint;
use Filament\Tables\Table;
use Guava\FilamentModalRelationManagers\Concerns\CanBeEmbeddedInModals;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AddressesRelationManager extends RelationManager
{
    use CanBeEmbeddedInModals;

    protected static string $relationship = 'addresses';

    public static function getNavigationLabel(): string
    {
        return 'Address';
    }

    public function form(Form $form): Form
    {
        return AddressResource::form($form);
    }

    public function table(Table $table): Table
    {
        return AddressResource::table($table)
            ->recordTitleAttribute('name_1')
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('New ' . $this->getNavigationLabel())
                    ->modalCloseButton(false)
                    ->modalHeading(' ')
                    ->modalWidth('full')
                    ->button()
                    ->closeModalByClickingAway(false)
                    ->mutateFormDataUsing(function (array $data): array {

                        $currentnriid = $data['numberrange_id'];

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
                    }),
                Tables\Actions\AttachAction::make()
                    ->recordSelectOptionsQuery(fn(Builder $query) => $query->where('is_active', true))
                    ->recordSelectSearchColumns(['name_1', 'name_4', 'address_number'])
                    ->preloadRecordSelect()
                    ->multiple(),
            ])
            ->actions([
                ActionGroup::make([
                    ActionGroup::make([
                        Tables\Actions\ViewAction::make(),
                        Tables\Actions\DetachAction::make(),
                        Tables\Actions\EditAction::make(),
                    ])->dropdown(false),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DetachBulkAction::make(),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
