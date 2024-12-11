<?php

namespace App\Filament\Submonitoring\Resources\NumberrangeResource\Pages;

use App\Filament\Submonitoring\Resources\MaterialtypeResource;
use App\Filament\Submonitoring\Resources\NumberrangeResource;
use App\Models\Materialtype;
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

class ManageMaterialtypes extends ManageRelatedRecords
{
    protected static string $resource = NumberrangeResource::class;

    protected static string $relationship = 'materialtypes';

    // protected static ?string $inverseRelationship = 'numberrange';

    protected static ?string $navigationIcon = 'heroicon-o-arrow-right-end-on-rectangle';

    public function getTitle(): string
    {
        return __('Number range: ' . $this->getOwnerRecord()->nr_interval . ' ' . $this->getOwnerRecord()->nr_name . '-Material Type');
    }

    public static function getNavigationLabel(): string
    {
        return 'Material Types';
    }

    public function form(Form $form): Form
    {
        return MaterialtypeResource::form($form);
    }

    public function table(Table $table): Table
    {
        return MaterialtypeResource::table($table)
            ->recordTitleAttribute('material_type')
            ->inverseRelationship('numberrange')
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('New Material Type')
                    ->modalCloseButton(false)
                    ->modalHeading(' ')
                    ->modalWidth('full')
                    ->button()
                    ->closeModalByClickingAway(false),
                Tables\Actions\AssociateAction::make()
                    ->recordSelectOptionsQuery(fn(Builder $query) => $query->where('is_active', true)->where('numberrange_id', null))
                    ->preloadRecordSelect()
                    ->multiple(),
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\EditAction::make()
                        ->label('Edit')
                        ->modalCloseButton(false)
                        ->modalHeading(' ')
                        ->modalWidth('full')
                        // ->button()
                        ->closeModalByClickingAway(false),
                    Tables\Actions\DissociateAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),
            ]);
    }
}
