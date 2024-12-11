<?php

namespace App\Filament\Submonitoring\Resources;

use App\Filament\Submonitoring\Clusters\BatchMaster as ClustersBatchMaster;
use App\Filament\Submonitoring\Resources\BatchmasterResource\Pages;
use App\Filament\Submonitoring\Resources\BatchmasterResource\RelationManagers;
use App\Models\Batchmaster;
use App\Models\Batchsource;
use App\Models\Businesspartner;
use App\Models\Numberrange;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\KeyValue;
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
use Filament\Tables\Filters\QueryBuilder\Constraints\SelectConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\TextConstraint;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Validation\Rules\Unique;
use Schmeits\FilamentCharacterCounter\Forms\Components\TextInput;

class BatchmasterResource extends Resource
{
    protected static ?string $model = Batchmaster::class;

    public static function canViewAny(): bool
    {
        return auth()->user()->id == 1;
    }

    protected static ?string $modelLabel = 'Batch Master';

    protected static ?string $pluralModelLabel = 'Batch Master';

    protected static ?string $navigationLabel = 'Batch Master';

    protected static ?int $navigationSort = 715000000;

    protected static ?string $cluster = ClustersBatchMaster::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(static::BatchMasterFormSchema());
    }

    public static function BatchMasterFormSchema(): array
    {
        return [

            Section::make('Batch Master')
                ->schema([

                    Grid::make(4)
                        ->schema([

                            Select::make('batchsource_id')
                                ->label('Batch Source')
                                ->required()
                                ->live()
                                ->options(Batchsource::whereIsActive(1)->pluck('batch_source_desc', 'id'))
                                ->disabledOn('edit')
                                ->afterStateUpdated(function (Set $set, $state) {

                                    $getnriid = Batchsource::whereId($state)->first();

                                    if ($state === null) {
                                        return;
                                    } else {

                                        $getisexternal = Numberrange::whereId($getnriid->numberrange_id)->first();

                                        $set('is_external', $getisexternal->is_external);
                                    }
                                }),

                            Hidden::make('is_external')
                                ->live(),

                        ]),

                ]),

            Section::make('Batch Number')
                ->hidden(fn(Get $get) => $get('batchsource_id') === null)
                ->schema([
                    Grid::make(4)
                        ->schema([

                            TextInput::make('batch_number')
                                ->label('Batch Number')
                                ->unique(Batchmaster::class, modifyRuleUsing: function (Unique $rule) {
                                    return $rule->where('batchsource_id', 2);
                                }, ignoreRecord: true)
                                ->disabled(fn(Get $get) => $get('is_external') === 0),

                        ]),

                ]),

            Section::make('Product Data')
                ->hidden(fn(Get $get) => $get('batchsource_id') === null)
                ->schema([
                    Grid::make(4)
                        ->schema([

                            DatePicker::make('production_date')
                                ->label('Production Date'),

                            DatePicker::make('expiration_date')
                                ->label('Expiration Date'),

                        ]),

                ]),

            Section::make('Vendor')
                ->hidden(fn(Get $get) => $get('batchsource_id') == null ||
                    $get('batchsource_id') == 1)
                ->schema([

                    Grid::make(4)
                        ->schema([

                            Select::make('businesspartner_id')
                                ->label('Vendor')
                                ->required()
                                ->live()
                                ->options(Businesspartner::whereIsActive(1)->pluck('bp_number', 'id'))
                                ->afterStateUpdated(function (Set $set, $state) {

                                    $bp = Businesspartner::whereId($state)->first();

                                    if ($state === null) {
                                        return;
                                    } else {

                                        $set('bpname', $bp->name_1);
                                    }
                                }),

                        ]),

                    Grid::make(4)
                        ->schema([

                            TextInput::make('bpname')
                                ->label('')
                                ->disabled(),

                        ]),
                ]),



            Section::make('Status')
                ->hidden(fn(Get $get) => $get('batchsource_id') === null)
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

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('batch_number')
                    ->label('Batch Number')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
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

                        SelectConstraint::make('batchsource_id')
                            ->label('Batch Source')
                            ->options(Batchsource::whereIsActive(1)->pluck('batch_source_desc', 'id'))
                            ->nullable(),

                        TextConstraint::make('batch_number')
                            ->label('Batch Number')
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
                    ReplicateAction::make()
                        ->form([

                            TextInput::make('batch_number')
                                ->hidden(fn(Get $get) => $get('is_external') === 0)
                                ->unique(Batchmaster::class, modifyRuleUsing: function (Unique $rule) {
                                    return $rule->where('batchsource_id', 2);
                                }),
                        ])
                        ->beforeReplicaSaved(function (Model $replica): void {

                            $getbatchsource = $replica->batchsource_id;

                            $getnriid = Batchsource::whereId($getbatchsource)->first();

                            $getisexternal = Numberrange::whereId($getnriid->numberrange_id)->first();

                            if ($getisexternal->is_external === 1) {
                                return;
                            } else {

                                $getcurrentnr = Numberrange::whereId($getnriid->numberrange_id)->first();

                                $replica->batch_number = $getcurrentnr->current_number + 1;

                                $updatecurrentnumber = Numberrange::whereId($getnriid->numberrange_id)->first();
                                $updatecurrentnumber->current_number = $replica->batch_number;
                                $updatecurrentnumber->save();
                            }
                        })
                        ->successRedirectUrl(fn(Model $replica): string => route('filament.submonitoring.batch-master.resources.batchmasters.edit', $replica)),


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
            'index' => Pages\ListBatchmasters::route('/'),
            'create' => Pages\CreateBatchmaster::route('/create'),
            'view' => Pages\ViewBatchmaster::route('/{record}'),
            'edit' => Pages\EditBatchmaster::route('/{record}/edit'),
        ];
    }
}
