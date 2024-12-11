<?php

namespace App\Filament\Submonitoring\Resources\NrobjectResource\Pages;

use App\Filament\Submonitoring\Resources\NrobjectResource;
use App\Filament\Submonitoring\Resources\NumberrangeResource;
use App\Models\Numberrange;
use Filament\Actions;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Pages\ManageRelatedRecords;
use Filament\Support\Enums\ActionSize;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\QueryBuilder;
use Filament\Tables\Filters\QueryBuilder\Constraints\BooleanConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\TextConstraint;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ManageNumberranges extends ManageRelatedRecords
{
    protected static string $resource = NrobjectResource::class;

    protected static string $relationship = 'numberranges';

    protected static ?string $inverseRelationship = 'nrobject';

    protected static ?string $navigationIcon = 'heroicon-o-arrow-right-end-on-rectangle';

    public function getTitle(): string
    {
        return __('NR Object: ' . $this->getOwnerRecord()->nrobject . ' ' . $this->getOwnerRecord()->nrobject_name . '-Number ranges');
    }

    public static function getNavigationLabel(): string
    {
        return 'Number Ranges';
    }

    public function form(Form $form): Form
    {
        return NumberrangeResource::form($form);
    }

    public function table(Table $table): Table
    {
        return NumberrangeResource::table($table)
            ->recordTitleAttribute('nr_interval')
            ->inverseRelationship('nrobject')
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('New Number Range')
                    ->modalCloseButton(false)
                    ->modalHeading(' ')
                    ->modalWidth('full')
                    ->button()
                    ->closeModalByClickingAway(false),
                Tables\Actions\AssociateAction::make()
                    ->recordSelectOptionsQuery(fn(Builder $query) => $query->where('is_active', true)->where('nrobject_id', null))
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
                ActionGroup::make([
                    Action::make('AssignMatTypes')
                        ->label('Assign Material Types')
                        ->icon('heroicon-m-arrow-right-end-on-rectangle')
                        ->url(fn(Numberrange $record): string => route('filament.submonitoring.number-range.resources.numberranges.managematerialtypes', $record)),

                    Action::make('AssignDocTypes')
                        ->label('Assign Document Types')
                        ->icon('heroicon-m-arrow-right-end-on-rectangle')
                        ->url(fn(Numberrange $record): string => route('filament.submonitoring.number-range.resources.numberranges.managedocumenttypes', $record)),

                    Action::make('AssignBatchSource')
                        ->label('Assign Batch Source')
                        ->icon('heroicon-m-arrow-right-end-on-rectangle')
                        ->url(fn(Numberrange $record): string => route('filament.submonitoring.number-range.resources.numberranges.managebatchsources', $record)),
                ])
                    ->label('Assignment')
                    ->icon('heroicon-m-arrow-right-end-on-rectangle')
                    ->size(ActionSize::Small)
                    ->outlined()
                    ->button(),

            ]);
    }
}
