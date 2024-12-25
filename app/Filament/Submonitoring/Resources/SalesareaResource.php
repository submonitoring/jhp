<?php

namespace App\Filament\Submonitoring\Resources;

use App\Filament\Exports\SalesareaExporter;
use App\Filament\Imports\SalesareaImporter;
use App\Filament\Submonitoring\Clusters\OrganizationalStructures;
use App\Filament\Submonitoring\Resources\SalesareaResource\Pages;
use App\Filament\Submonitoring\Resources\SalesareaResource\Pages\ManageSalesoffice;
use App\Filament\Submonitoring\Resources\SalesareaResource\RelationManagers;
use App\Models\Distributionchannel;
use App\Models\Division;
use App\Models\Salesarea;
use App\Models\Salesorganization;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Pages\Page;
use Filament\Resources\Resource;
use Filament\Support\Enums\ActionSize;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\ExportBulkAction;
use Filament\Tables\Actions\ImportAction;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Columns\ColumnGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\QueryBuilder;
use Filament\Tables\Filters\QueryBuilder\Constraints\BooleanConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\DateConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\TextConstraint;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rules\Unique;
use Schmeits\FilamentCharacterCounter\Forms\Components\TextInput;

class SalesareaResource extends Resource
{
    protected static ?string $model = Salesarea::class;

    public static function canViewAny(): bool
    {
        return auth()->user()->id == 1;
    }

    protected static ?string $modelLabel = 'Sales Area';

    protected static ?string $pluralModelLabel = 'Sales Area';

    protected static ?string $navigationLabel = 'Sales Area';

    protected static ?int $navigationSort = 825000300;

    protected static ?string $cluster = OrganizationalStructures::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form

            ->schema(static::SalesAreaFormSchema());
    }

    public static function SalesAreaFormSchema(): array
    {
        return [

            Section::make('Sales Area')
                ->schema([

                    Grid::make(4)
                        ->schema([

                            Select::make('salesorganization_id')
                                ->label('Sales Organization')
                                ->options(Salesorganization::whereIsActive(1)->pluck('sales_organization_name', 'id'))
                                ->required()
                                ->live()
                                ->native(false),

                        ]),

                    Grid::make(4)
                        ->schema([

                            Select::make('distributionchannel_id')
                                ->label('Distribution Channel')
                                ->options(function (Get $get) {

                                    $sorgid = $get('salesorganization_id');

                                    $distchan = Distributionchannel::whereHas('salesorganizations', function ($query) use ($sorgid) {

                                        $query->where('id', $sorgid);
                                    })->pluck('id')->toArray();

                                    return (Distributionchannel::whereIsActive(1)->whereIn('id', $distchan)->pluck('distribution_channel_name', 'id'));
                                })
                                ->required()
                                ->live()
                                ->native(false),

                        ]),

                    Grid::make(4)
                        ->schema([

                            Select::make('division_id')
                                ->label('Division')
                                ->options(function (Get $get) {

                                    $distchanid = $get('distributionchannel_id');

                                    $division = Division::whereHas('distributionchannels', function ($query) use ($distchanid) {

                                        $query->where('id', $distchanid);
                                    })->pluck('id')->toArray();

                                    return (Division::whereIsActive(1)->whereIn('id', $division)->pluck('division_name', 'id'));
                                })
                                ->required()
                                ->live()
                                ->native(false),

                        ]),

                ])->compact(),

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

        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                ColumnGroup::make('Sales Area', [

                    TextColumn::make('salesorganization.sales_organization_name')
                        ->label('Sales Organization')
                        ->searchable(isIndividual: true, isGlobal: false)
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
                        ->sortable(),

                    TextColumn::make('distributionchannel.distribution_channel_name')
                        ->label('Distribution Channel')
                        ->searchable(isIndividual: true, isGlobal: false)
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
                        ->sortable(),

                    TextColumn::make('division.division_name')
                        ->label('Division')
                        ->searchable(isIndividual: true, isGlobal: false)
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
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
                    ->importer(SalesareaImporter::class),
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),

                ActionGroup::make([
                    Action::make('Assignsaloff')
                        ->label('Assign Sales Office')
                        ->icon('heroicon-m-arrow-right-end-on-rectangle')
                        ->url(fn(Model $record): string => route('filament.submonitoring.organizational-structures.resources.salesareas.managesalesoffice', $record)),

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

                ExportBulkAction::make()
                    ->label('Export')
                    ->exporter(SalesareaExporter::class)
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
            'index' => Pages\ListSalesareas::route('/'),
            'create' => Pages\CreateSalesarea::route('/create'),
            'view' => Pages\ViewSalesarea::route('/{record}'),
            'edit' => Pages\EditSalesarea::route('/{record}/edit'),
            'managesalesoffice' => Pages\ManageSalesoffice::route('/{record}/salesoffice'),
        ];
    }

    public static function getRecordSubNavigation(Page $page): array
    {
        return $page->generateNavigationItems([
            ManageSalesoffice::class,
        ]);
    }
}
