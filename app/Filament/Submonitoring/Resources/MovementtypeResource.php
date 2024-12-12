<?php

namespace App\Filament\Submonitoring\Resources;

use App\Filament\Imports\MovementtypeImporter;
use App\Filament\Submonitoring\Clusters\Document;
use App\Filament\Submonitoring\Resources\MaterialtypeResource\Pages\ViewMaterialtype;
use App\Filament\Submonitoring\Resources\MovementtypeResource\Pages;
use App\Filament\Submonitoring\Resources\MovementtypeResource\Pages\EditMovementtype;
use App\Filament\Submonitoring\Resources\MovementtypeResource\Pages\ManageReasonformovement;
use App\Filament\Submonitoring\Resources\MovementtypeResource\Pages\ViewMovementtype;
use App\Filament\Submonitoring\Resources\MovementtypeResource\RelationManagers;
use App\Models\Debitcreditindicator;
use App\Models\Movementtype;
use App\Models\Reasonformovementcontrol;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Pages\Page;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\ImportAction;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Columns\ColumnGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\QueryBuilder;
use Filament\Tables\Filters\QueryBuilder\Constraints\BooleanConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\DateConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\TextConstraint;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Schmeits\FilamentCharacterCounter\Forms\Components\TextInput;

class MovementtypeResource extends Resource
{
    protected static ?string $model = Movementtype::class;

    public static function canViewAny(): bool
    {
        return auth()->user()->id == 1;
    }

    protected static ?string $modelLabel = 'Movement Type';

    protected static ?string $pluralModelLabel = 'Movement Type';

    protected static ?string $navigationLabel = 'Movement Type';

    protected static ?int $navigationSort = 815000150;

    protected static ?string $cluster = Document::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form

            ->schema(static::MovementTypeFormSchema());
    }

    public static function MovementTypeFormSchema(): array
    {
        return [

            Section::make('Movement Type')
                ->schema([

                    Grid::make(4)
                        ->schema([

                            TextInput::make('movement_type')
                                ->label('Movement Type')
                                ->required()
                                ->maxLength(3)
                                ->unique(Movementtype::class, ignoreRecord: true),

                        ]),

                    Grid::make(4)
                        ->schema([

                            TextInput::make('movement_type_desc')
                                ->label('Description')
                                ->required(),

                        ]),


                ])->compact(),

            Section::make('Movement Type Other Data')
                ->schema([

                    Grid::make(4)
                        ->schema([


                            Select::make('debitcreditindicator_id')
                                ->label('Debit/Credit')
                                ->options(Debitcreditindicator::whereIsActive(1)->pluck('debit_credit_indicator_desc', 'id')),

                        ]),

                    Grid::make(4)
                        ->schema([

                            Select::make('reasonformovementcontrol_id')
                                ->label('Reason for Movement Control')
                                ->options(Reasonformovementcontrol::whereIsActive(1)->pluck('reason_for_movement_control_desc', 'id')),

                        ]),

                    Grid::make(4)
                        ->schema([

                            ToggleButtons::make('is_reversal')
                                ->label('Reversal?')
                                ->boolean()
                                ->grouped()
                                ->default(true),

                        ]),

                ])->compact(),

            Section::make('Status')
                ->schema([

                    Grid::make(2)
                        ->schema([

                            ToggleButtons::make('is_active')
                                ->label('Active?')
                                ->boolean()
                                ->grouped()
                                ->default(true),

                        ]),
                ])->collapsible()
                ->compact(),

        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                ColumnGroup::make('Movement Type', [
                    TextColumn::make('movement_type')
                        ->label('Movement Type')
                        ->searchable(isIndividual: true, isGlobal: false)
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
                        ->sortable(),

                    TextColumn::make('movement_type_desc')
                        ->label('Description')
                        ->searchable(isIndividual: true, isGlobal: false)
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
                        ->sortable(),
                ]),

                ColumnGroup::make('Movement Type Other Data', [

                    TextColumn::make('debitcreditindicator.debit_credit_indicator_desc')
                        ->label('Debit/Credit')
                        ->searchable(isIndividual: true, isGlobal: false)
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
                        ->sortable(),

                    TextColumn::make('reasonformovementcontrol.reason_for_movement_control_desc')
                        ->label('Reason Control')
                        ->searchable(isIndividual: true, isGlobal: false)
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
                        ->sortable(),
                ]),

                ColumnGroup::make('Reversal?', [

                    CheckboxColumn::make('is_reversal')
                        ->label('Reversal?')
                        ->sortable(),
                ]),

                ColumnGroup::make('Status', [

                    CheckboxColumn::make('is_active')
                        ->label('Status')
                        ->sortable(),

                ]),

                ColumnGroup::make('Logs', [

                    TextColumn::make('created_by')
                        ->label('Created by')
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
                        ->sortable(),

                    TextColumn::make('updated_by')
                        ->label('Updated by')
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
                        ->sortable(),

                    TextColumn::make('created_at')
                        ->dateTime()
                        ->sortable()
                        ->toggleable(isToggledHiddenByDefault: true),

                    TextColumn::make('updated_at')
                        ->dateTime()
                        ->sortable()
                        ->toggleable(isToggledHiddenByDefault: true),

                ]),
            ])
            ->recordUrl(null)
            ->extremePaginationLinks()
            ->searchOnBlur()
            ->filters([
                QueryBuilder::make()
                    ->constraintPickerColumns(1)
                    ->constraints([

                        TextConstraint::make('movement_type')
                            ->label('Movement Type')
                            ->nullable(),

                        TextConstraint::make('movement_type_desc')
                            ->label('Description')
                            ->nullable(),

                        BooleanConstraint::make('is_active')
                            ->label('Status')
                            ->icon(false)
                            ->nullable(),

                        TextConstraint::make('created_by')
                            ->label('Created by')
                            ->icon(false)
                            ->nullable(),

                        TextConstraint::make('updated_by')
                            ->label('Updated by')
                            ->icon(false)
                            ->nullable(),

                        DateConstraint::make('created_at')
                            ->icon(false)
                            ->nullable(),

                        DateConstraint::make('updated_at')
                            ->icon(false)
                            ->nullable(),

                    ])
            ], layout: Tables\Enums\FiltersLayout::AboveContentCollapsible)
            ->deferFilters()
            ->headerActions([
                Tables\Actions\CreateAction::make(),

                ImportAction::make()
                    ->label('Import')
                    ->importer(MovementtypeImporter::class),
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                ]),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMovementtypes::route('/'),
            'create' => Pages\CreateMovementtype::route('/create'),
            'view' => Pages\ViewMovementtype::route('/{record}'),
            'edit' => Pages\EditMovementtype::route('/{record}/edit'),
            'managereasonformovement' => Pages\ManageReasonformovement::route('/{record}/reasonformovement'),
        ];
    }

    public static function getRecordSubNavigation(Page $page): array
    {
        return $page->generateNavigationItems([
            ViewMovementtype::class,
            EditMovementtype::class,
            ManageReasonformovement::class,
        ]);
    }

    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Start;
}
