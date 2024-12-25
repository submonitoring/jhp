<?php

namespace App\Filament\Submonitoring\Resources;

use App\Filament\Exports\PlantExporter;
use App\Filament\Imports\PlantImporter;
use App\Filament\Submonitoring\Clusters\OrganizationalStructures;
use App\Filament\Submonitoring\Resources\CompanycodeResource\RelationManagers\AddressesRelationManager;
use App\Filament\Submonitoring\Resources\PlantResource\Pages;
use App\Filament\Submonitoring\Resources\PlantResource\Pages\EditPlant;
use App\Filament\Submonitoring\Resources\PlantResource\Pages\ManageCyclecounting;
use App\Filament\Submonitoring\Resources\PlantResource\Pages\ManageStoragelocation;
use App\Filament\Submonitoring\Resources\PlantResource\Pages\ViewPlant;
use App\Filament\Submonitoring\Resources\PlantResource\RelationManagers;
use App\Models\Plant;
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
use Filament\Support\Enums\ActionSize;
use Filament\Tables;
use Filament\Tables\Actions\Action;
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

class PlantResource extends Resource
{
    protected static ?string $model = Plant::class;

    public static function canViewAny(): bool
    {
        return auth()->user()->id == 1;
    }

    protected static ?string $modelLabel = 'Plant';

    protected static ?string $pluralModelLabel = 'Plant';

    protected static ?string $navigationLabel = 'Plant';

    protected static ?int $navigationSort = 825000050;

    protected static ?string $cluster = OrganizationalStructures::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form

            ->schema(static::PlantFormSchema());
    }

    public static function PlantFormSchema(): array
    {
        return [

            Section::make('Plant')
                ->schema([

                    Grid::make(4)
                        ->schema([

                            TextInput::make('plant')
                                ->label('Plant')
                                ->required()
                                ->maxLength(4)
                                ->unique(Plant::class, ignoreRecord: true),

                        ]),

                    Grid::make(4)
                        ->schema([

                            TextInput::make('plant_name')
                                ->label('Name')
                                ->required(),

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


                ColumnGroup::make('Plant', [
                    TextColumn::make('plant')
                        ->label('Plant')
                        ->searchable(isIndividual: true, isGlobal: false)
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
                        ->sortable(),

                    TextColumn::make('plant_name')
                        ->label('Name')
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

                        TextConstraint::make('plant')
                            ->label('Plant')
                            ->nullable(),

                        TextConstraint::make('plant_name')
                            ->label('Name')
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
                    ->importer(PlantImporter::class),
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),
                ActionGroup::make([
                    Action::make('AssignSLoc')
                        ->label('Assign S.Loc')
                        ->icon('heroicon-m-arrow-right-end-on-rectangle')
                        ->url(fn(Plant $record): string => route('filament.submonitoring.organizational-structures.resources.plants.managestoragelocation', $record)),

                    Action::make('AssignCycleCounting')
                        ->label('Assign Cycle Counting')
                        ->icon('heroicon-m-arrow-right-end-on-rectangle')
                        ->url(fn(Plant $record): string => route('filament.submonitoring.organizational-structures.resources.plants.managecyclecounting', $record)),
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
                    ->exporter(PlantExporter::class)
            ]);
    }

    public static function getRelations(): array
    {
        return [
            AddressesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPlants::route('/'),
            'create' => Pages\CreatePlant::route('/create'),
            'view' => Pages\ViewPlant::route('/{record}'),
            'edit' => Pages\EditPlant::route('/{record}/edit'),
            'managestoragelocation' => Pages\ManageStoragelocation::route('/{record}/storagelocation'),
            'managecyclecounting' => Pages\ManageCyclecounting::route('/{record}/cyclecounting'),
        ];
    }

    public static function getRecordSubNavigation(Page $page): array
    {
        return $page->generateNavigationItems([
            ManageStoragelocation::class,
            ManageCyclecounting::class,
        ]);
    }
}
