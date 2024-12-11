<?php

namespace App\Filament\Submonitoring\Resources\PlantResource\Pages;

use App\Filament\Submonitoring\Resources\PlantResource;
use App\Filament\Submonitoring\Resources\StoragelocationResource;
use Filament\Actions;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Pages\ManageRelatedRecords;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\QueryBuilder;
use Filament\Tables\Filters\QueryBuilder\Constraints\BooleanConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\TextConstraint;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ManageStoragelocation extends ManageRelatedRecords
{
    protected static string $resource = PlantResource::class;

    protected static string $relationship = 'storagelocations';

    // protected static ?string $inverseRelationship = 'numberrange';

    protected static ?string $navigationIcon = 'heroicon-o-arrow-right-end-on-rectangle';

    public function getTitle(): string
    {
        return __('Assignment ' . $this->getOwnerRecord()->plant . ' to ' . $this->getNavigationLabel());
    }

    public static function getNavigationLabel(): string
    {
        return 'Storage Location';
    }

    public function form(Form $form): Form
    {
        return StoragelocationResource::form($form);
    }

    public function table(Table $table): Table
    {
        return StoragelocationResource::table($table)
            ->recordTitleAttribute('storage_location')
            ->inverseRelationship('plant')
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('New ' . $this->getNavigationLabel())
                    ->modalCloseButton(false)
                    ->modalHeading(' ')
                    ->modalWidth('full')
                    ->button()
                    ->closeModalByClickingAway(false),
                Tables\Actions\AssociateAction::make()
                    ->recordSelectOptionsQuery(fn(Builder $query) => $query->where('is_active', true)->where('plant_id', null))
                    ->preloadRecordSelect()
                    ->multiple(),
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DissociateAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DissociateBulkAction::make(),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
