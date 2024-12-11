<?php

namespace App\Filament\Submonitoring\Resources;

use App\Filament\Submonitoring\Clusters\Materialdocument;
use App\Filament\Submonitoring\Resources\MaterialdocumentheaderResource\Pages;
use App\Filament\Submonitoring\Resources\MaterialdocumentheaderResource\RelationManagers;
use App\Models\Businesspartner;
use App\Models\Documenttype;
use App\Models\Materialdocumentheader;
use App\Models\Materialmaster;
use App\Models\Movementtype;
use App\Models\Numberrange;
use App\Models\Transactionreference;
use App\Models\Transactiontype;
use App\Models\Uom;
use Awcodes\TableRepeater\Components\TableRepeater;
use Awcodes\TableRepeater\Header;
use Filament\Forms;
use Filament\Forms\Components\Actions\Action as ActionsAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
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
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\HeaderActionsPosition;
use Filament\Tables\Actions\ReplicateAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Filters\QueryBuilder;
use Filament\Tables\Filters\QueryBuilder\Constraints\BooleanConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\TextConstraint;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Validation\Rules\Unique;
use Schmeits\FilamentCharacterCounter\Forms\Components\TextInput;

class MaterialdocumentheaderResource extends Resource
{
    protected static ?string $model = Materialdocumentheader::class;

    public static function canViewAny(): bool
    {
        return auth()->user()->id == 1;
    }

    protected static ?string $modelLabel = 'Material Document';

    protected static ?string $pluralModelLabel = 'Material Document';

    protected static ?string $navigationLabel = 'Material Document';

    protected static ?int $navigationSort = 600000000;

    protected static ?string $cluster = Materialdocument::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(static::MaterialDocumentFormSchema());
    }

    public static function MaterialDocumentFormSchema(): array
    {
        return [

            Section::make('')
                ->id('initial')
                ->schema([

                    Grid::make(4)
                        ->schema([

                            Select::make('documenttype_id')
                                ->label('Document Type')
                                ->required()
                                ->native(false)
                                ->options(Documenttype::whereIsActive(1)->pluck('document_type_desc', 'id'))
                                ->disabledOn('edit')
                                ->disabled(fn(Get $get) => $get('executed') !== null),

                            Select::make('transactionreference_id')
                                ->label('Transaction Reference')
                                ->required()
                                ->native(false)
                                ->live()
                                ->options(Transactionreference::whereIsActive(1)->pluck('transaction_reference_desc', 'id'))
                                ->disabled(fn(Get $get) => $get('executed') !== null),

                            TextInput::make('reference_document_number')
                                ->label('Reference Number')
                                ->required()
                                ->hidden(fn(Get $get) => $get('transactionreference_id') == 1)
                                ->disabled(fn(Get $get) => $get('executed') !== null),

                            Hidden::make('is_external')
                                ->live(),

                            Hidden::make('executed')
                                ->live(),

                        ]),
                ])
                ->footerActions([
                    ActionsAction::make('Execute')
                        ->action(function (Get $get, Set $set, $state) {

                            $doctype = $get('documenttype_id');

                            $getnriid = Documenttype::whereId($doctype)->first();

                            if ($state === null) {
                                return;
                            } else {

                                $getisexternal = Numberrange::whereId($getnriid->numberrange_id)->first();

                                $set('is_external', $getisexternal->is_external);
                                $set('executed', 1);
                            }
                        }),
                ]),

            Section::make('Header Data')
                ->hidden(fn(Get $get) => $get('executed') === null)
                ->schema([

                    Section::make('Document Number')
                        ->hidden(fn(Get $get) => $get('executed') === null)
                        ->schema([
                            Grid::make(4)
                                ->schema([

                                    TextInput::make('document_number')
                                        ->label('Document Number')
                                        ->unique(Materialdocumentheader::class, modifyRuleUsing: function (Unique $rule) {

                                            return $rule->where('is_external', true);
                                        }, ignoreRecord: true)
                                        ->disabled(fn(Get $get) => $get('is_external') === 0),


                                ]),

                        ]),

                    Section::make('General Data')
                        ->hidden(fn(Get $get) => $get('executed') === null)
                        ->schema([

                            Grid::make(4)
                                ->schema([

                                    DatePicker::make('document_date')
                                        ->default(now()),

                                    DatePicker::make('posting_date')
                                        ->default(now()),

                                ]),
                        ]),

                    Section::make('Business Partner Data')
                        ->hidden(fn(Get $get) => $get('executed') === null)
                        ->schema([

                            Grid::make(4)
                                ->schema([

                                    Select::make('businesspartner_id')
                                        ->label('Business Partner')
                                        ->required()
                                        ->native(false)
                                        ->live()
                                        ->options(Businesspartner::whereIsActive(1)->pluck('name_1', 'id'))
                                        ->afterStateUpdated(function (Set $set, $state) {

                                            $getbp = Businesspartner::whereId($state)->first();

                                            if ($state === null) {
                                                return;
                                            } else {

                                                $set('name', $getbp->name_1);
                                            }
                                        }),

                                    TextInput::make('name')
                                        ->label('Name')
                                        ->disabled(),

                                ]),
                        ]),
                ]),

            Section::make('Items Data')
                ->hidden(fn(Get $get) => $get('executed') === null)
                ->schema([

                    static::getItemsTableRepeater(),
                    static::getItemsRepeater(),

                ]),

            Section::make('Status')
                ->hidden(fn(Get $get) => $get('executed') === null)
                ->schema([

                    Grid::make(4)
                        ->schema([

                            Toggle::make('is_active')
                                ->label('Active')
                                ->default(true),

                        ]),
                ]),

        ];
    }

    public static function getItemsTableRepeater(): Repeater
    {
        return TableRepeater::make('materialdocumentitems')
            ->headers([
                Header::make('Material'),
                Header::make('Movement type'),
            ])
            ->schema([

                Select::make('materialmaster_id')
                    ->label('Material')
                    ->required()
                    ->dehydrated(false)
                    ->live()
                    ->options(Materialmaster::whereIsActive(1)->pluck('material_desc', 'id')),



                Select::make('movementtype_id')
                    ->label('Movement Type')
                    ->required()
                    ->dehydrated(false)
                    ->options(Movementtype::whereIsActive(1)->pluck('movement_type_desc', 'id')),

            ])
            ->extraItemActions([])
            ->orderColumn('sort')
            ->defaultItems(1)
            ->hiddenLabel()
            ->columns([
                'md' => 10,
            ])
            ->required();
    }

    public static function getItemsRepeater(): Repeater
    {
        return Repeater::make('materialdocumentitems')
            ->relationship()
            ->schema([

                Tabs::make('Tabs')
                    ->tabs([
                        Tab::make('Material')
                            ->schema([

                                Select::make('materialmaster_id')
                                    ->label('Material')
                                    ->required()
                                    ->live()
                                    ->options(Materialmaster::whereIsActive(1)->pluck('material_desc', 'id')),

                            ]),

                        Tab::make('Quantity')
                            ->schema([
                                Select::make('movementtype_id')
                                    ->label('Movement Type')
                                    ->required()
                                    ->options(Movementtype::whereIsActive(1)->pluck('movement_type_desc', 'id')),

                                TextInput::make('quantity')
                                    ->label('Quantity'),

                                Select::make('uom_id')
                                    ->label('UoM')
                                    ->required()
                                    ->options(Uom::whereIsActive(1)->pluck('uom_name', 'id')),
                            ]),

                        Tab::make('Where')
                            ->schema([
                                // ...
                            ]),
                    ]),

            ])
            ->extraItemActions([])
            ->orderColumn('sort')
            ->defaultItems(1)
            ->hiddenLabel()
            ->addable(false)
            ->collapsed()
            ->itemLabel(fn(array $state): ?string => $state['materialmaster_id'] ?? null)
            // ->columns([
            //     'md' => 10,
            // ])
            ->required();
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('document_number')
                    ->label('Document Number')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('old_document_number')
                    ->label('Old Document Number')
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
                            ->label('Material Document')
                            ->nullable(),

                        TextConstraint::make('material_master_desc')
                            ->label('Description')
                            ->nullable(),

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
            'index' => Pages\ListMaterialdocumentheaders::route('/'),
            'create' => Pages\CreateMaterialdocumentheader::route('/create'),
            'view' => Pages\ViewMaterialdocumentheader::route('/{record}'),
            'edit' => Pages\EditMaterialdocumentheader::route('/{record}/edit'),
        ];
    }
}
