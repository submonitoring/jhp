<?php

namespace App\Filament\Submonitoring\Resources\SalesareaResource\Pages;

use App\Filament\Submonitoring\Resources\SalesareaResource;
use App\Filament\Submonitoring\Resources\SalesofficeResource;
use Filament\Actions;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Pages\ManageRelatedRecords;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ManageSalesoffice extends ManageRelatedRecords
{
    protected static string $resource = SalesareaResource::class;

    protected static string $relationship = 'salesoffices';

    protected static ?string $navigationIcon = 'heroicon-o-arrow-right-end-on-rectangle';

    public function getTitle(): string
    {
        return __('Assignment ' . $this->getOwnerRecord()->sales_organization . ' to ' . $this->getNavigationLabel());
    }

    public static function getNavigationLabel(): string
    {
        return 'Sales Office';
    }

    public function form(Form $form): Form
    {
        return SalesofficeResource::form($form);
    }

    public function table(Table $table): Table
    {
        return SalesofficeResource::table($table)
            ->recordTitleAttribute('sales_office_name')
            ->inverseRelationship('salesareas')
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
