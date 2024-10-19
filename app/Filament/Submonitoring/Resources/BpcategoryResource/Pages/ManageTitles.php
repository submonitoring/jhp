<?php

namespace App\Filament\Submonitoring\Resources\BpcategoryResource\Pages;

use App\Filament\Submonitoring\Resources\BpcategoryResource;
use App\Filament\Submonitoring\Resources\TitleResource;
use Filament\Actions;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Pages\ManageRelatedRecords;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\ColumnGroup;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\QueryBuilder;
use Filament\Tables\Filters\QueryBuilder\Constraints\BooleanConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\DateConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\TextConstraint;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ManageTitles extends ManageRelatedRecords
{
    protected static string $resource = BpcategoryResource::class;

    protected static string $relationship = 'titles';

    // protected static ?string $inverseRelationship = 'numberrange';

    protected static ?string $navigationIcon = 'heroicon-o-arrow-right-end-on-rectangle';

    public function getTitle(): string
    {
        return __($this->getOwnerRecord()->bpcategory_desc . ' Title Assignment');
    }

    public static function getNavigationLabel(): string
    {
        return 'Title -> Business Partner Category';
    }

    public function form(Form $form): Form
    {
        return TitleResource::form($form);
    }

    public function table(Table $table): Table
    {
        return TitleResource::table($table)
            ->recordTitleAttribute('title')
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Create & Assign Title')
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
                        // ->button()
                        ->closeModalByClickingAway(false),
                    Tables\Actions\DetachAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
            ]);
    }
}
