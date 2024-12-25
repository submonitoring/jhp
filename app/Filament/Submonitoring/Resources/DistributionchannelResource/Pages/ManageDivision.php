<?php

namespace App\Filament\Submonitoring\Resources\DistributionchannelResource\Pages;

use App\Filament\Submonitoring\Resources\DistributionchannelResource;
use App\Filament\Submonitoring\Resources\DivisionResource;
use Filament\Actions;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Pages\ManageRelatedRecords;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ManageDivision extends ManageRelatedRecords
{
    protected static string $resource = DistributionchannelResource::class;

    protected static string $relationship = 'divisions';

    protected static ?string $navigationIcon = 'heroicon-o-arrow-right-end-on-rectangle';

    public function getTitle(): string
    {
        return __('Assignment ' . $this->getOwnerRecord()->distribution_channel . ' to ' . $this->getNavigationLabel());
    }

    public static function getNavigationLabel(): string
    {
        return 'Divisions';
    }

    public function form(Form $form): Form
    {
        return DivisionResource::form($form);
    }

    public function table(Table $table): Table
    {
        return DivisionResource::table($table)
            ->recordTitleAttribute('division_name')
            ->inverseRelationship('distributionchannels')
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('New ' . $this->getNavigationLabel())
                    ->modalCloseButton(false)
                    ->modalHeading(' ')
                    ->modalWidth('full')
                    ->button()
                    ->closeModalByClickingAway(false),
                Tables\Actions\AttachAction::make()
                    ->recordSelectOptionsQuery(fn(Builder $query) => $query->where('is_active', true))
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
                        ->closeModalByClickingAway(false),
                    Tables\Actions\DetachAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DetachBulkAction::make(),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
