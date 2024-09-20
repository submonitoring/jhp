<?php

namespace App\Filament\Submonitoring\Resources;

use App\Filament\Submonitoring\Clusters\MasterData;
use App\Filament\Submonitoring\Resources\MaterialmasterResource\Pages;
use App\Filament\Submonitoring\Resources\MaterialmasterResource\RelationManagers;
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
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Pages\Page;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ReplicateAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\QueryBuilder;
use Filament\Tables\Filters\QueryBuilder\Constraints\BooleanConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\TextConstraint;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
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

    protected static ?int $navigationSort = 700000050;

    protected static ?string $cluster = MasterData::class;

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

                            Toggle::make('deletion_flag')
                                ->label('Deletion Flag')
                                ->default(false),

                            Toggle::make('is_active')
                                ->label('Status')
                                ->default(true),

                        ]),
                ]),

        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

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

                ToggleColumn::make('deletion_flag')
                    ->label('Deletion Flag')
                    ->sortable(),

                ToggleColumn::make('is_active')
                    ->label('Status')
                    ->sortable(),

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
            ->recordUrl(null)
            ->searchOnBlur()
            ->filters([
                QueryBuilder::make()
                    ->constraints([

                        TextConstraint::make('material_master')
                            ->label('Material Master')
                            ->nullable(),

                        TextConstraint::make('material_master_desc')
                            ->label('Description')
                            ->nullable(),

                        BooleanConstraint::make('is_active'),

                    ])
                    ->constraintPickerColumns(2),
            ], layout: Tables\Enums\FiltersLayout::AboveContentCollapsible)
            ->deferFilters()
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                ReplicateAction::make()
                    ->form([

                        TextInput::make('material_number')
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
                    ->successRedirectUrl(fn(Model $replica): string => route('filament.submonitoring.master-data.resources.materialmasters.edit', $replica)),
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
            'index' => Pages\ListMaterialmasters::route('/'),
            'create' => Pages\CreateMaterialmaster::route('/create'),
            'view' => Pages\ViewMaterialmaster::route('/{record}'),
            'edit' => Pages\EditMaterialmaster::route('/{record}/edit'),
        ];
    }
}
