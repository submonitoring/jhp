<?php

namespace App\Filament\Submonitoring\Resources\MaterialplantResource\Pages;

use App\Filament\Submonitoring\Resources\MaterialplantResource;
use App\Models\Materialmaster;
use App\Models\Materialstoragelocation;
use App\Models\Plant;
use App\Models\Storagecondition;
use App\Models\Storagelocation;
use App\Models\Temperaturecondition;
use Filament\Actions;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Pages\ManageRelatedRecords;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\HeaderActionsPosition;
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
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\HtmlString;
use Schmeits\FilamentCharacterCounter\Forms\Components\TextInput;

class ManageMaterialstoragelocation extends ManageRelatedRecords
{
    protected static string $resource = MaterialplantResource::class;

    protected static string $relationship = 'materialstoragelocations';

    protected static ?string $inverseRelationship = 'materialmaster';

    protected static ?string $navigationIcon = 'heroicon-o-arrow-right-end-on-rectangle';

    public function getTitle(): string
    {
        $material = Materialmaster::whereId($this->getOwnerRecord()->materialmaster_id)->first();

        $plant = Plant::whereId($this->getOwnerRecord()->plant_id)->first();

        return __('Extend ' . $material->material_number . ' ' . $plant->plant);
    }

    public static function getNavigationLabel(): string
    {
        return 'Extend Material to Storage Location';
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

                                        $material = Materialmaster::whereId($this->getOwnerRecord()->materialmaster_id)->first();

                                        return (new HtmlString('
                        <div><p><strong>Material Number:</strong></p></div>
                        <div><p class="text-3xl"><strong>' . $material->material_number . '</strong></p></div>'));
                                    }),

                                Placeholder::make('')
                                    ->content(function () {

                                        $material = Materialmaster::whereId($this->getOwnerRecord()->materialmaster_id)->first();

                                        return (new HtmlString('
                        <div><p><strong>Material Description:</strong></p></div>
                        <div><p class="text-3xl"><strong>' . $material->material_desc . '</strong></p></div>'));
                                    }),

                                Placeholder::make('')
                                    ->content(function () {

                                        $plant = Plant::whereId($this->getOwnerRecord()->plant_id)->first();

                                        return (new HtmlString('
                        <div><p><strong>Plant:</strong></p></div>
                        <div><p class="text-3xl"><strong>' . $plant->plant . '</strong></p></div>'));
                                    }),

                                Placeholder::make('')
                                    ->content(function () {

                                        $plant = Plant::whereId($this->getOwnerRecord()->plant_id)->first();

                                        return (new HtmlString('
                        <div><p><strong>Plant Name:</strong></p></div>
                        <div><p class="text-3xl"><strong>' . $plant->plant_name . '</strong></p></div>'));
                                    }),

                            ]),

                    ])->compact(),


                Section::make('Select Storage Location')
                    ->schema([
                        Grid::make(4)
                            ->schema([

                                Hidden::make('materialmaster_id')
                                    ->default($this->getOwnerRecord()->materialmaster_id)
                                    ->dehydrated(),

                                Hidden::make('plant_id')
                                    ->default($this->getOwnerRecord()->plant_id)
                                    ->dehydrated(),

                                Select::make('storagelocation_id')
                                    ->label('Extend Material to Storage Location')
                                    ->required()
                                    ->live()
                                    ->disabledOn('edit')
                                    ->options(function () {

                                        $materialmaster = $this->getOwnerRecord()->materialmaster_id;

                                        $plant = $this->getOwnerRecord()->plant_id;

                                        $query = Materialstoragelocation::where('materialmaster_id', $materialmaster)
                                            ->where('plant_id', $plant)->pluck('storagelocation_id')->toArray();

                                        // dd($query);


                                        if ($query == null) {
                                            return (Storagelocation::whereIsActive(1)->pluck('storage_location', 'id'));
                                        } elseif ($query != null) {

                                            return (Storagelocation::whereIsActive(1)
                                                ->whereNotIn('id', $query)->pluck('storage_location', 'id'));
                                        }
                                    })
                                    ->helperText(function ($state) {

                                        $storagelocationname = Storagelocation::whereId($state)->first();

                                        if ($storagelocationname == null) {
                                            return;
                                        } elseif ($storagelocationname != null) {

                                            return ($storagelocationname->storage_location . ' - ' . $storagelocationname->storage_location_name);
                                        }
                                    }),

                            ]),
                    ])
                    ->compact(),

                Section::make('General Data')
                    ->schema([
                        Grid::make(4)
                            ->schema([

                                Select::make('storagecondition_id')
                                    ->label('Storage Condition')
                                    // ->required()
                                    ->options(Storagecondition::whereIsActive(1)->pluck('storage_condition', 'id')),

                                Select::make('temperaturecondition_id')
                                    ->label('Temperature Condition')
                                    // ->required()
                                    ->options(Temperaturecondition::whereIsActive(1)->pluck('temperature_condition', 'id')),

                            ]),


                    ])
                    ->compact(),

                Section::make('Status')
                    ->schema([

                        Grid::make(4)
                            ->schema([

                                ToggleButtons::make('is_active')
                                    ->label('Active?')
                                    ->boolean()
                                    ->grouped()
                                    ->default(true),

                            ]),
                    ])->collapsible()
                    ->compact(),

            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('storage_location')
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

                TextColumn::make('storagelocation.storage_location')
                    ->label('S.Loc')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                ColumnGroup::make('Storage Requirements', [

                    TextColumn::make('storagecondition.storage_condition')
                        ->label('Storage Condition')
                        ->searchable(isIndividual: true, isGlobal: false)
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
                        ->sortable(),

                    TextColumn::make('temperaturecondition.temperature_condition')
                        ->label('Temperature Condition')
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
                ])
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

                        TextConstraint::make('storagelocation_id')
                            ->label('Storage Location')
                            ->relationship('storagelocation', 'storage_location')
                            ->nullable(),

                        TextConstraint::make('storagelocation_name')
                            ->label('Storage Location Name')
                            ->relationship('storagelocation', 'storage_location_name')
                            ->nullable(),

                        TextConstraint::make('storagecondition_id')
                            ->label('Storage Condition')
                            ->relationship('storagecondition', 'storage_condition')
                            ->nullable(),

                        TextConstraint::make('storagecondition_id')
                            ->label('Storage Condition Desc')
                            ->relationship('storagecondition', 'storage_condition_desc')
                            ->nullable(),

                        TextConstraint::make('temperaturecondition_id')
                            ->label('Temperature Condition')
                            ->relationship('temperaturecondition', 'temperature_condition')
                            ->nullable(),

                        TextConstraint::make('temperaturecondition_id')
                            ->label('Temperature Condition Desc')
                            ->relationship('temperaturecondition', 'temperature_condition_desc')
                            ->nullable(),

                        BooleanConstraint::make('is_active'),

                    ])
                    ->constraintPickerColumns(2),
            ], layout: Tables\Enums\FiltersLayout::AboveContentCollapsible)
            ->deferFilters()
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Extend Material to Storage Location')
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
