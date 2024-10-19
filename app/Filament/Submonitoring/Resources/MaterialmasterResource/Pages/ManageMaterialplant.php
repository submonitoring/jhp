<?php

namespace App\Filament\Submonitoring\Resources\MaterialmasterResource\Pages;

use App\Filament\Submonitoring\Resources\MaterialmasterResource;
use App\Models\Cyclecounting;
use App\Models\Loadinggroup;
use App\Models\Materialplant;
use App\Models\Periodindicator;
use App\Models\Plant;
use App\Models\Procurementtype;
use App\Models\Specialprocurementtype;
use App\Models\Transportationgroup;
use Filament\Actions;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Pages\ManageRelatedRecords;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\ColumnGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\QueryBuilder;
use Filament\Tables\Filters\QueryBuilder\Constraints\BooleanConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\NumberConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\TextConstraint;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\HtmlString;
use Schmeits\FilamentCharacterCounter\Forms\Components\TextInput;

class ManageMaterialplant extends ManageRelatedRecords
{
    protected static string $resource = MaterialmasterResource::class;

    protected static string $relationship = 'materialplants';

    protected static ?string $inverseRelationship = 'materialmaster';

    protected static ?string $navigationIcon = 'heroicon-o-arrow-right-end-on-rectangle';

    public function getTitle(): string
    {
        return __('Extend ' . $this->getOwnerRecord()->material_number);
    }

    public static function getNavigationLabel(): string
    {
        return 'Extend Material to Plant';
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make()
                    ->schema([

                        Grid::make(4)
                            ->schema([

                                Placeholder::make('')
                                    ->content(function () {

                                        return (new HtmlString('
                        <div><p><strong>Material Number:</strong></p></div>
                        <div><p class="text-3xl"><strong>' . $this->getOwnerRecord()->material_number . '</strong></p></div>'));
                                    }),

                                Placeholder::make('')
                                    ->content(function () {

                                        return (new HtmlString('
                        <div><p><strong>Material Description:</strong></p></div>
                        <div><p class="text-3xl"><strong>' . $this->getOwnerRecord()->material_desc . '</strong></p></div>'));
                                    }),

                            ]),

                    ])->compact(),


                Section::make('Select Plant')
                    ->schema([
                        Grid::make(3)
                            ->schema([

                                Hidden::make('materialmaster_id')
                                    ->default($this->getOwnerRecord()->id)
                                    ->dehydrated(),

                                Select::make('plant_id')
                                    ->label('Extend Material to Plant')
                                    ->required()
                                    ->inlineLabel()
                                    ->live()
                                    ->options(Plant::whereIsActive(1)->pluck('plant', 'id'))
                                    ->disabledOn('edit')
                                    ->afterStateUpdated(function (Set $set, $state) {

                                        $materialnumber = $this->getOwnerRecord()->material_number;

                                        $plant = Plant::whereId($state)->first();

                                        if ($state === null) {
                                            return;
                                        } else {

                                            $set('slug', 'Extend ' . $materialnumber . ' to Plant: ' . $plant->plant);
                                        }
                                    }),

                                TextInput::make('slug')
                                    ->label('Extend Status')
                                    ->unique(Materialplant::class, ignoreRecord: true)
                                    ->disabled()
                                    ->dehydrated(),

                            ]),
                    ])
                    ->compact(),

                Section::make('Shipping Data')
                    ->schema([
                        Grid::make(3)
                            ->schema([

                                Select::make('loadinggroup_id')
                                    ->label('Loading Group')
                                    ->inlineLabel()
                                    // ->required()
                                    ->options(Loadinggroup::whereIsActive(1)->pluck('loading_group', 'id')),

                            ]),

                        Grid::make(3)
                            ->schema([

                                Select::make('transportationgroup_id')
                                    ->label('Transportation Group')
                                    ->inlineLabel()
                                    // ->required()
                                    ->options(Transportationgroup::whereIsActive(1)->pluck('transportation_group', 'id')),
                            ]),

                    ])
                    ->compact(),

                Section::make('Procurement Data')
                    ->schema([
                        Grid::make(3)
                            ->schema([

                                Select::make('procurementtype_id')
                                    ->label('Procurement Type')
                                    ->inlineLabel()
                                    // ->required()
                                    ->options(Procurementtype::whereIsActive(1)->pluck('procurement_type', 'id')),

                            ]),

                        Grid::make(3)
                            ->schema([


                                Select::make('specialprocurementtype_id')
                                    ->label('Special Procurement Type')
                                    ->inlineLabel()
                                    // ->required()
                                    ->options(Specialprocurementtype::whereIsActive(1)->pluck('special_procurement_type', 'id')),

                            ]),

                        Grid::make(3)
                            ->schema([

                                Select::make('periodindicator_id')
                                    ->label('Period Indicator')
                                    ->inlineLabel()
                                    // ->required()
                                    ->options(Periodindicator::whereIsActive(1)->pluck('period_indicator', 'id')),

                            ]),

                    ])
                    ->compact(),

                Section::make('Stock Requirements')
                    ->schema([
                        Grid::make(3)
                            ->schema([

                                TextInput::make('safety_stock')
                                    ->label('Safety Stock')
                                    ->inlineLabel()
                                    ->numeric(),

                            ]),

                        Grid::make(3)
                            ->schema([

                                TextInput::make('minimal_safety_stock')
                                    ->label('Minimal Safety Stock')
                                    ->inlineLabel()
                                    ->numeric(),

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


            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('plant')
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

                        BooleanConstraint::make('is_active'),

                    ])
                    ->constraintPickerColumns(2),
            ], layout: Tables\Enums\FiltersLayout::AboveContentCollapsible)
            ->deferFilters()
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Extend Material to Plant')
                    ->modalCloseButton(false)
                    ->modalHeading(' ')
                    ->modalWidth('full')
                    ->button()
                    ->closeModalByClickingAway(false),
                // Tables\Actions\AttachAction::make(),
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\EditAction::make()
                        ->modalCloseButton(false)
                        ->modalHeading(' ')
                        ->modalWidth('full')
                        // ->button()
                        ->closeModalByClickingAway(false),
                    // Tables\Actions\DetachAction::make(),
                    // Tables\Actions\DeleteAction::make(),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // Tables\Actions\DetachBulkAction::make(),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
