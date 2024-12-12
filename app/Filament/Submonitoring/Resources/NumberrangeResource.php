<?php

namespace App\Filament\Submonitoring\Resources;

use App\Filament\Exports\NumberrangeExporter;
use App\Filament\Imports\NumberrangeImporter;
use App\Filament\Submonitoring\Clusters\NumberRange as ClustersNumberRange;
use App\Filament\Submonitoring\Resources\NrobjectResource\Pages\EditNrobject;
use App\Filament\Submonitoring\Resources\NumberrangeResource\Pages;
use App\Filament\Submonitoring\Resources\NumberrangeResource\Pages\ManageBatchsource;
use App\Filament\Submonitoring\Resources\NumberrangeResource\Pages\ManageDocumenttype;
use App\Filament\Submonitoring\Resources\NumberrangeResource\Pages\ManageMaterialtypes;
use App\Filament\Submonitoring\Resources\NumberrangeResource\Pages\ViewNumberrange;
use App\Filament\Submonitoring\Resources\NumberrangeResource\RelationManagers;
use App\Models\Numberrange;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Pages\Page;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Resource;
use Filament\Support\Enums\ActionSize;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\ExportBulkAction;
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

class NumberrangeResource extends Resource
{
    public static function canViewAny(): bool
    {
        return auth()->user()->id == 1;
    }

    protected static ?string $modelLabel = 'Number Ranges';

    protected static ?string $pluralModelLabel = 'Number Ranges';

    protected static ?string $navigationLabel = 'Number Ranges';

    protected static ?int $navigationSort = 910000050;

    protected static ?string $cluster = ClustersNumberRange::class;

    protected static ?string $model = Numberrange::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(static::NumbeRangesFormSchema());
    }

    public static function NumbeRangesFormSchema(): array
    {
        return [

            Section::make()
                ->disabled(fn(Get $get) => $get('current_number') !== null)
                ->schema([

                    Grid::make(2)
                        ->schema([

                            TextInput::make('nrobject_id')
                                ->label('NR Object')
                                ->inlineLabel()
                                ->disabled(),

                        ]),

                    Grid::make(2)
                        ->schema([

                            TextInput::make('nr_interval')
                                ->label('Interval Code')
                                ->required()
                                ->inlineLabel()
                                ->maxLength(4)
                                ->unique(Numberrange::class, ignoreRecord: true),

                        ]),

                    Grid::make(2)
                        ->schema([

                            TextInput::make('nr_name')
                                ->label('Name')
                                ->required()
                                ->inlineLabel(),

                        ]),

                    Grid::make(2)
                        ->schema([

                            Checkbox::make('is_external')
                                ->label('External?')
                                ->inline()
                                ->live()
                                ->required(),

                        ]),

                    Grid::make(2)
                        ->hidden(fn(Get $get) => $get('is_external') == true)
                        ->schema([

                            TextInput::make('year')
                                ->label('Year')
                                ->numeric()
                                ->inlineLabel()
                                ->maxLength(4)
                                ->characterLimit(4)

                        ]),

                    Grid::make(2)
                        ->hidden(fn(Get $get) => $get('is_external') == true)
                        ->schema([

                            TextInput::make('number')
                                ->label('Number Range')
                                ->numeric()
                                ->required()
                                ->inlineLabel()
                                ->maxLength(10)
                                ->characterLimit(10),

                        ]),


                ])
                ->compact(),

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

                ColumnGroup::make('Name and Interval', [

                    TextColumn::make('nrobject.nrobject_name')
                        ->label('NR Object')
                        ->searchable(isIndividual: true, isGlobal: false)
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
                        ->sortable(),

                    TextColumn::make('nr_interval')
                        ->label('NR Interval')
                        ->searchable(isIndividual: true, isGlobal: false)
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
                        ->sortable(),

                    TextColumn::make('nr_name')
                        ->label('Name')
                        ->searchable(isIndividual: true, isGlobal: false)
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
                        ->sortable(),

                ]),

                ColumnGroup::make('Year', [

                    TextColumn::make('year')
                        ->label('Year')
                        ->searchable(isIndividual: true, isGlobal: false)
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
                        ->sortable(),

                ]),

                ColumnGroup::make('Number Status', [

                    TextColumn::make('number')
                        ->label('Number Range')
                        ->searchable(isIndividual: true, isGlobal: false)
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
                        ->sortable(),

                    TextColumn::make('current_number')
                        ->label('Current Number')
                        ->searchable(isIndividual: true, isGlobal: false)
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
                        ->sortable(),

                ]),

                ColumnGroup::make('External?', [

                    CheckboxColumn::make('is_external')
                        ->label('External?')
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

                        TextConstraint::make('nr_interval')
                            ->label('Interval')
                            ->nullable(),

                        TextConstraint::make('nr_name')
                            ->label('Name')
                            ->nullable(),

                        BooleanConstraint::make('is_external'),

                        BooleanConstraint::make('is_active'),

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
                    ->importer(NumberrangeImporter::class),
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListNumberranges::route('/'),
            'create' => Pages\CreateNumberrange::route('/create'),
            'view' => Pages\ViewNumberrange::route('/{record}'),
            'edit' => Pages\EditNumberrange::route('/{record}/edit'),
            'managematerialtypes' => Pages\ManageMaterialtypes::route('/{record}/materialtypes'),
            'managedocumenttypes' => Pages\ManageDocumenttype::route('/{record}/documenttypes'),
            'managebatchsources' => Pages\ManageBatchsource::route('/{record}/batchsources'),
        ];
    }

    public static function getRecordSubNavigation(Page $page): array
    {
        return $page->generateNavigationItems([
            ManageMaterialtypes::class,
            ManageDocumenttype::class,
            ManageBatchsource::class,
        ]);
    }

    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Start;
}
