<?php

namespace App\Filament\Submonitoring\Resources;

use App\Filament\Imports\MaterialmasterImporter;
use App\Filament\Submonitoring\Clusters\MasterData;
use App\Filament\Submonitoring\Clusters\MaterialMasterData;
use App\Filament\Submonitoring\Resources\MaterialmasterResource\Pages;
use App\Filament\Submonitoring\Resources\MaterialmasterResource\Pages\ManageMaterialplant;
use App\Filament\Submonitoring\Resources\MaterialmasterResource\Pages\ManageMaterialstoragelocation;
use App\Filament\Submonitoring\Resources\MaterialmasterResource\RelationManagers;
use App\Filament\Submonitoring\Resources\MaterialmasterResource\RelationManagers\MaterialplantsRelationManager;
use App\Models\Industrysector;
use App\Models\Itemcategorygroup;
use App\Models\Materialgroup;
use App\Models\Materialmaster;
use App\Models\Materialtype;
use App\Models\Numberrange;
use App\Models\Uom;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
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
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\ExportBulkAction;
use Filament\Tables\Actions\HeaderActionsPosition;
use Filament\Tables\Actions\ImportAction;
use Filament\Tables\Actions\ReplicateAction;
use Filament\Tables\Columns\ColumnGroup;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Filters\QueryBuilder;
use Filament\Tables\Filters\QueryBuilder\Constraints\BooleanConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\DateConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\TextConstraint;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Validation\Rules\Unique;
use Schmeits\FilamentCharacterCounter\Forms\Components\TextInput;

class MaterialmasterResource extends Resource
{
    protected static ?string $model = Materialmaster::class;

    public static function canViewAny(): bool
    {
        return auth()->user()->id == 1;
    }

    protected static ?string $modelLabel = 'Material Master';

    protected static ?string $pluralModelLabel = 'Material Master';

    protected static ?string $navigationLabel = 'Material Master';

    protected static ?int $navigationSort = 710000050;

    protected static ?string $cluster = MaterialMasterData::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(static::MaterialMasterFormSchema());
    }

    public static function MaterialMasterFormSchema(): array
    {
        return [

            Section::make('Material Master')
                ->schema([

                    Grid::make(4)
                        ->schema([

                            Select::make('materialtype_id')
                                ->label('Material Type')
                                ->required()
                                ->live()
                                ->options(Materialtype::whereIsActive(1)->pluck('material_type_desc', 'id'))
                                ->disabledOn('edit')
                                ->afterStateUpdated(function (Set $set, $state) {

                                    $getnriid = Materialtype::whereId($state)->first();

                                    if ($state === null) {
                                        return;
                                    } else {

                                        $getisexternal = Numberrange::whereId($getnriid->numberrange_id)->first();

                                        $set('is_external', $getisexternal->is_external);
                                    }
                                }),

                            Hidden::make('is_external')
                                ->live(),

                            Select::make('industrysector_id')
                                ->label('Industry Sector')
                                ->options(Industrysector::whereIsActive(1)->pluck('industry_sector_desc', 'id')),

                        ]),

                ]),

            Section::make('Material Number')
                ->hidden(fn(Get $get) => $get('materialtype_id') === null)
                ->schema([
                    Grid::make(4)
                        ->schema([

                            TextInput::make('material_number')
                                ->label('Material Number')
                                ->unique(Materialmaster::class, modifyRuleUsing: function (Unique $rule) {

                                    return $rule->where('is_external', true);
                                }, ignoreRecord: true)
                                ->disabled(fn(Get $get) => $get('is_external') === 0),

                            TextInput::make('old_material_number')
                                ->label('Old Material Number'),

                        ]),

                    TextInput::make('material_desc')
                        ->label('Material Description')
                        ->required(),

                ]),

            Section::make('General Data')
                ->hidden(fn(Get $get) => $get('materialtype_id') === null)
                ->schema([

                    Grid::make(4)
                        ->schema([

                            Select::make('materialgroup_id')
                                ->label('Material Group')
                                ->required()
                                ->options(Materialgroup::whereIsActive(1)->pluck('material_group_desc', 'id')),

                        ]),

                    Grid::make(4)
                        ->schema([

                            Select::make('itemcategorygroup_id')
                                ->label('General Item Category Group')
                                ->required()
                                ->options(Itemcategorygroup::whereIsActive(1)->pluck('item_category_group_desc', 'id')),

                        ]),
                ]),

            Section::make('Dimensions')
                ->hidden(fn(Get $get) => $get('materialtype_id') === null)
                ->schema([

                    Grid::make(4)
                        ->schema([

                            Select::make('base_uom')
                                ->label('Base UoM')
                                ->required()
                                ->options(Uom::whereIsActive(1)->pluck('uom', 'id')),

                        ]),

                    Grid::make(4)
                        ->schema([

                            Select::make('weight_unit')
                                ->label('Weight Unit')
                                ->options(Uom::whereIsActive(1)->pluck('uom', 'id')),

                        ]),

                    Grid::make(4)
                        ->schema([

                            TextInput::make('gross_weight')
                                ->label('Gross Weight')
                                ->numeric(),

                            TextInput::make('net_weight')
                                ->label('Net Weight')
                                ->numeric(),

                        ]),


                ]),

            Section::make('Status')
                ->hidden(fn(Get $get) => $get('materialtype_id') === null)
                ->schema([

                    Grid::make(4)
                        ->schema([

                            ToggleButtons::make('deletion_flag')
                                ->label('Deletion Flag')
                                ->boolean()
                                ->grouped()
                                ->default(true),

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

                ColumnGroup::make('Material Master Data', [

                    TextColumn::make('material_number')
                        ->label('Material Number')
                        ->searchable(isIndividual: true, isGlobal: false)
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
                        ->sortable(),

                    TextColumn::make('old_material_number')
                        ->label('Old Material Number')
                        ->searchable(isIndividual: true, isGlobal: false)
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
                        ->sortable(),

                    TextColumn::make('material_desc')
                        ->label('Material Description')
                        ->searchable(isIndividual: true, isGlobal: false)
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
                        ->sortable(),

                ]),

                ColumnGroup::make('Material Data', [

                    TextColumn::make('materialtype.material_type')
                        ->label('Material Type')
                        ->searchable(isIndividual: true, isGlobal: false)
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
                        ->sortable(),

                    TextColumn::make('materialtype.material_type_desc')
                        ->label('Material Type Desc')
                        ->searchable(isIndividual: true, isGlobal: false)
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
                        ->sortable(),

                    TextColumn::make('industrysector.industry_sector')
                        ->label('Industry Sector')
                        ->searchable(isIndividual: true, isGlobal: false)
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
                        ->sortable(),

                    TextColumn::make('materialgroup.material_group')
                        ->label('Material Group')
                        ->searchable(isIndividual: true, isGlobal: false)
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
                        ->sortable(),

                    TextColumn::make('genitemcategorygroup.item_category_group')
                        ->label('General Item Category Group')
                        ->searchable(isIndividual: true, isGlobal: false)
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
                        ->sortable(),

                ]),

                ColumnGroup::make('Dimension', [

                    TextColumn::make('base_uom')
                        ->label('Base UoM')
                        ->searchable(isIndividual: true, isGlobal: false)
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
                        ->sortable(),

                    TextColumn::make('weight_unit')
                        ->label('Weight Unit')
                        ->searchable(isIndividual: true, isGlobal: false)
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
                        ->sortable(),

                    TextColumn::make('gross_weight')
                        ->label('Gross Weight')
                        ->searchable(isIndividual: true, isGlobal: false)
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
                        ->sortable(),

                    TextColumn::make('net_weight')
                        ->label('Net Weight')
                        ->searchable(isIndividual: true, isGlobal: false)
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
                        ->sortable(),

                ]),

                ColumnGroup::make('Deletion Flag', [

                    IconColumn::make('deletion_flag')
                        ->label('Deletion Flag')
                        ->boolean()
                        ->sortable(),

                ]),

                ColumnGroup::make('Status', [

                    IconColumn::make('is_active')
                        ->label('Status')
                        ->boolean()
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
            ->searchOnBlur()
            ->filters([
                QueryBuilder::make()
                    ->constraintPickerColumns(1)
                    ->constraints([

                        TextConstraint::make('material_master')
                            ->label('Material Master')
                            ->nullable(),

                        TextConstraint::make('material_master_desc')
                            ->label('Description')
                            ->nullable(),

                        BooleanConstraint::make('deletion_flag')
                            ->label('Deletion Flag')
                            ->icon(false)
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

                    ]),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),

                ImportAction::make()
                    ->label('Import')
                    ->importer(MaterialmasterImporter::class),
            ])
            ->actions([
                ActionGroup::make([
                    ActionGroup::make([
                        Tables\Actions\ViewAction::make(),
                        Tables\Actions\EditAction::make(),
                        Tables\Actions\DeleteAction::make(),
                    ])->dropdown(false),
                    ReplicateAction::make()
                        ->form([

                            TextInput::make('material_number')
                                ->unique(Materialmaster::class, modifyRuleUsing: function (Unique $rule) {

                                    return $rule->where('is_external', true);
                                })
                                ->hidden(fn(Get $get) => $get('is_external') === 0),
                        ])
                        ->beforeReplicaSaved(function (Model $replica): void {

                            $getmaterialtype = $replica->materialtype_id;

                            $getnriid = Materialtype::whereId($getmaterialtype)->first();

                            $getisexternal = Numberrange::whereId($getnriid->numberrange_id)->first();

                            if ($getisexternal->is_external === 1) {
                                return;
                            } else {

                                $getcurrentnr = Numberrange::whereId($getnriid->numberrange_id)->first();

                                $replica->material_number = $getcurrentnr->current_number + 1;

                                $updatecurrentnumber = Numberrange::whereId($getnriid->numberrange_id)->first();
                                $updatecurrentnumber->current_number = $replica->material_number;
                                $updatecurrentnumber->save();
                            }
                        })
                        ->successRedirectUrl(fn(Model $replica): string => route('filament.submonitoring.material-master-data.resources.materialmasters.edit', $replica)),


                ]),

                ActionGroup::make([
                    Action::make('Extend')
                        ->label('Extend to Plant')
                        ->icon('heroicon-m-arrow-right-start-on-rectangle')
                        ->url(fn(Materialmaster $record): string => route('filament.submonitoring.material-master-data.resources.materialmasters.managematerialplant', $record)),
                ])
                    ->label('Extend')
                    ->icon('heroicon-m-arrow-right-start-on-rectangle')
                    ->size(ActionSize::Small)
                    ->outlined()
                    ->button(),


            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),

                ExportBulkAction::make()
                    ->label('Export')
                    ->exporter(MaterialmasterImporter::class)
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
            'index' => Pages\ListMaterialmasters::route('/'),
            'create' => Pages\CreateMaterialmaster::route('/create'),
            'view' => Pages\ViewMaterialmaster::route('/{record}'),
            'edit' => Pages\EditMaterialmaster::route('/{record}/edit'),
            'managematerialplant' => Pages\ManageMaterialplant::route('/{record}/materialplant'),
        ];
    }

    public static function getRecordSubNavigation(Page $page): array
    {
        return $page->generateNavigationItems([
            ManageMaterialplant::class,
        ]);
    }

    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Start;
}
