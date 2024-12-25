<?php

namespace App\Filament\Submonitoring\Resources\SalesorganizationResource\Pages;

use App\Filament\Submonitoring\Resources\DistributionchannelResource;
use App\Filament\Submonitoring\Resources\SalesorganizationResource;
use Filament\Actions;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Pages\ManageRelatedRecords;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ManageDistributionchannel extends ManageRelatedRecords
{
    protected static string $resource = SalesorganizationResource::class;

    protected static string $relationship = 'distributionchannels';

    protected static ?string $navigationIcon = 'heroicon-o-arrow-right-end-on-rectangle';

    public function getTitle(): string
    {
        return __('Assignment ' . $this->getOwnerRecord()->sales_organization . ' to ' . $this->getNavigationLabel());
    }

    public static function getNavigationLabel(): string
    {
        return 'Distribution Channel';
    }

    public function form(Form $form): Form
    {
        return DistributionchannelResource::form($form);
    }

    public function table(Table $table): Table
    {
        return DistributionchannelResource::table($table)
            ->recordTitleAttribute('distribution_channel_name')
            ->inverseRelationship('salesorganizations')
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
