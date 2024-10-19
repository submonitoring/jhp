<?php

namespace App\Filament\Submonitoring\Resources;

use App\Filament\Submonitoring\Clusters\MasterData;
use App\Filament\Submonitoring\Clusters\MaterialMasterData;
use App\Filament\Submonitoring\Resources\MaterialplantResource\Pages;
use App\Filament\Submonitoring\Resources\MaterialplantResource\Pages\ManageMaterialstoragelocation;
use App\Filament\Submonitoring\Resources\MaterialplantResource\RelationManagers;
use App\Models\Loadinggroup;
use App\Models\Materialplant;
use App\Models\Periodindicator;
use App\Models\Plant;
use App\Models\Procurementtype;
use App\Models\Specialprocurementtype;
use App\Models\Transportationgroup;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Pages\Page;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Resource;
use Filament\Support\Enums\ActionSize;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\ReplicateAction;
use Filament\Tables\Columns\ColumnGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Filters\QueryBuilder;
use Filament\Tables\Filters\QueryBuilder\Constraints\BooleanConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\NumberConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\TextConstraint;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\HtmlString;
use Schmeits\FilamentCharacterCounter\Forms\Components\TextInput;

class MaterialplantResource extends Resource
{
    protected static ?string $model = Materialplant::class;

    public static function canViewAny(): bool
    {
        return auth()->user()->id == 1;
    }

    protected static ?string $modelLabel = 'Material Plant';

    protected static ?string $pluralModelLabel = 'Material Plant';

    protected static ?string $navigationLabel = 'Material Plant';

    protected static ?int $navigationSort = 710000100;

    protected static ?string $cluster = MaterialMasterData::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(static::MaterialPlantFormSchema());
    }

    public static function MaterialPlantFormSchema(): array
    {
        return [



            Section::make('Shipping Data')
                ->schema([
                    Grid::make(4)
                        ->schema([

                            Select::make('loadinggroup_id')
                                ->label('Loading Group')
                                // ->required()
                                ->options(Loadinggroup::whereIsActive(1)->pluck('loading_group', 'id')),

                            Select::make('transportationgroup_id')
                                ->label('Transportation Group')
                                // ->required()
                                ->options(Transportationgroup::whereIsActive(1)->pluck('transportation_group', 'id')),

                        ]),


                ])
                ->compact(),

            Section::make('Procurement Data')
                ->schema([
                    Grid::make(4)
                        ->schema([

                            Select::make('procurementtype_id')
                                ->label('Procurement Type')
                                // ->required()
                                ->options(Procurementtype::whereIsActive(1)->pluck('procurement_type', 'id')),

                            Select::make('specialprocurementtype_id')
                                ->label('Special Procurement Type')
                                // ->required()
                                ->options(Specialprocurementtype::whereIsActive(1)->pluck('special_procurement_type', 'id')),

                            Select::make('periodindicator_id')
                                ->label('Period Indicator')
                                // ->required()
                                ->options(Periodindicator::whereIsActive(1)->pluck('period_indicator', 'id')),

                        ]),

                ])
                ->compact(),

            Section::make('Stock Requirements')
                ->schema([
                    Grid::make(4)
                        ->schema([

                            TextInput::make('safety_stock')
                                ->label('Safety Stock')
                                ->numeric(),

                            TextInput::make('minimal_safety_stock')
                                ->label('Minimal Safety Stock')
                                ->numeric(),

                        ]),

                ])
                ->compact(),

            Section::make('Batch Management Status')
                ->schema([
                    Grid::make(4)
                        ->schema([

                            Toggle::make('is_batch')
                                ->label('Batch Managed?'),

                        ]),

                ])
                ->compact(),

            Section::make('Status')
                ->schema([
                    Grid::make(4)
                        ->schema([

                            Toggle::make('is_active')
                                ->label('Status')
                                ->default(true),

                        ]),

                ])
                ->compact(),


        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('materialmaster.material_number')
                    ->label('Material')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('plant.plant')
                    ->label('Plant')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                ColumnGroup::make('Shipping Data', [

                    TextColumn::make('loadinggroup.loading_group')
                        ->label('Loading Group')
                        ->searchable(isIndividual: true, isGlobal: false)
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
                        ->sortable(),

                    TextColumn::make('transportationgroup.transportation_group')
                        ->label('Transportation Group')
                        ->searchable(isIndividual: true, isGlobal: false)
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
                        ->sortable(),
                ]),

                ColumnGroup::make('Procurement Data', [

                    TextColumn::make('procurementtype.procurement_type')
                        ->label('Procurement Type')
                        ->searchable(isIndividual: true, isGlobal: false)
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
                        ->sortable(),

                    TextColumn::make('specialprocurementtype.special_procurement_type')
                        ->label('Special Procurement Type')
                        ->searchable(isIndividual: true, isGlobal: false)
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
                        ->sortable(),

                    TextColumn::make('periodindicator.period_indicator')
                        ->label('Period Indicator')
                        ->searchable(isIndividual: true, isGlobal: false)
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
                        ->sortable(),

                ]),

                ColumnGroup::make('Stock Requirements', [

                    TextColumn::make('safety_stock')
                        ->label('Safety Stock')
                        ->searchable(isIndividual: true, isGlobal: false)
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
                        ->sortable(),

                    TextColumn::make('minimal_safety_stock')
                        ->label('Minimal Safety Stock')
                        ->searchable(isIndividual: true, isGlobal: false)
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
                        ->sortable(),

                ]),

                ColumnGroup::make('Batch Mngnt. Status', [

                    ToggleColumn::make('is_batch')
                        ->label('Batch Managed Status')
                        ->sortable(),

                ]),

                ColumnGroup::make('Status', [

                    ToggleColumn::make('is_active')
                        ->label('Status')
                        ->sortable(),

                ]),

                ColumnGroup::make('Logs', [

                    TextColumn::make('created_by')
                        ->label('Created by')
                        ->searchable(isIndividual: true, isGlobal: false)
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
                        ->sortable(),

                    TextColumn::make('updated_by')
                        ->label('Updated by')
                        ->searchable(isIndividual: true, isGlobal: false)
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
            ->searchOnBlur()
            ->filters([
                QueryBuilder::make()
                    ->constraints([

                        TextConstraint::make('material_id')
                            ->label('Material Number')
                            ->relationship('materialmaster', 'material_number')
                            ->nullable(),

                        TextConstraint::make('material_desc')
                            ->label('Material Desc')
                            ->relationship('materialmaster', 'material_desc')
                            ->nullable(),

                        TextConstraint::make('plant_id')
                            ->label('Plant')
                            ->relationship('plant', 'plant')
                            ->nullable(),

                        TextConstraint::make('plant_name')
                            ->label('Plant Name')
                            ->relationship('plant', 'plant_name')
                            ->nullable(),

                        TextConstraint::make('loadinggroup_id')
                            ->label('Loading Group')
                            ->relationship('loadinggroup', 'loading_group')
                            ->nullable(),

                        TextConstraint::make('loadinggroup_desc')
                            ->label('Loading Group Desc')
                            ->relationship('loadinggroup', 'loading_group_desc')
                            ->nullable(),

                        TextConstraint::make('transportationgroup_id')
                            ->label('Transportation Group')
                            ->relationship('transportationgroup', 'transportation_group')
                            ->nullable(),

                        TextConstraint::make('transportationgroup_desc')
                            ->label('Transportation Group Desc')
                            ->relationship('transportationgroup', 'transportation_group_desc')
                            ->nullable(),

                        TextConstraint::make('procurementtype_id')
                            ->label('Procurement Type')
                            ->relationship('procurementtype', 'procurement_type')
                            ->nullable(),

                        TextConstraint::make('procurementtype_desc')
                            ->label('Procurement Type Desc')
                            ->relationship('procurementtype', 'procurement_type_desc')
                            ->nullable(),

                        TextConstraint::make('specialprocurementtype_id')
                            ->label('Special Procurement Type')
                            ->relationship('specialprocurementtype', 'special_procurement_type')
                            ->nullable(),

                        TextConstraint::make('specialprocurementtype_desc')
                            ->label('Special Procurement Type Desc')
                            ->relationship('specialprocurementtype', 'special_procurement_type_desc')
                            ->nullable(),

                        TextConstraint::make('periodindicator_id')
                            ->label('Period Indicator')
                            ->relationship('periodindicator', 'period_indicator')
                            ->nullable(),

                        TextConstraint::make('periodindicator_desc')
                            ->label('Period Indicator Desc')
                            ->relationship('periodindicator', 'period_indicator_desc')
                            ->nullable(),

                        NumberConstraint::make('safety_stock')
                            ->label('Safety Stock')
                            ->nullable(),

                        NumberConstraint::make('minimal_safety_stock')
                            ->label('Minimal Safety Stock')
                            ->nullable(),

                        BooleanConstraint::make('is_batch'),

                        BooleanConstraint::make('is_active'),

                    ])
                    ->constraintPickerColumns(2),
            ], layout: Tables\Enums\FiltersLayout::AboveContentCollapsible)
            ->deferFilters()
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                ActionGroup::make([
                    ActionGroup::make([
                        Tables\Actions\ViewAction::make(),
                        Tables\Actions\EditAction::make(),
                    ])->dropdown(false),

                ]),

                ActionGroup::make([
                    Action::make('Extend')
                        ->label('Extend to S.Loc')
                        ->icon('heroicon-m-arrow-right-start-on-rectangle')
                        ->url(fn(Materialplant $record): string => route('filament.submonitoring.material-master-data.resources.materialplants.managematerialstoragelocation', $record)),
                ])
                    ->label('Extend')
                    ->icon('heroicon-m-arrow-right-start-on-rectangle')
                    ->size(ActionSize::Small)
                    ->outlined()
                    ->button(),


            ])
            ->bulkActions([]);
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
            'index' => Pages\ListMaterialplants::route('/'),
            'create' => Pages\CreateMaterialplant::route('/create'),
            'view' => Pages\ViewMaterialplant::route('/{record}'),
            'edit' => Pages\EditMaterialplant::route('/{record}/edit'),
            'managematerialstoragelocation' => Pages\ManageMaterialstoragelocation::route('/{record}/materialstoragelocation'),
        ];
    }

    public static function getRecordSubNavigation(Page $page): array
    {
        return $page->generateNavigationItems([
            ManageMaterialstoragelocation::class,
        ]);
    }

    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Start;
}
