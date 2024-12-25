<?php

namespace App\Filament\Submonitoring\Resources;

use App\Filament\Exports\NrobjectExporter;
use App\Filament\Imports\NrobjectImporter;
use App\Filament\Submonitoring\Clusters\NumberRange;
use App\Filament\Submonitoring\Resources\NrobjectResource\Pages;
use App\Filament\Submonitoring\Resources\NrobjectResource\Pages\EditNrobject;
use App\Filament\Submonitoring\Resources\NrobjectResource\Pages\ManageNumberranges;
use App\Filament\Submonitoring\Resources\NrobjectResource\Pages\ViewNrobject;
use App\Filament\Submonitoring\Resources\NrobjectResource\RelationManagers;
use App\Models\Nrobject;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
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

class NrobjectResource extends Resource
{
    public static function canViewAny(): bool
    {
        return auth()->user()->id == 1;
    }

    protected static ?string $modelLabel = 'NR Object';

    protected static ?string $pluralModelLabel = 'NR Object';

    protected static ?string $navigationLabel = 'NR Object';

    protected static ?int $navigationSort = 910000000;

    protected static ?string $model = Nrobject::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $cluster = NumberRange::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema(static::NRObjectFormSchema());
    }

    public static function NRObjectFormSchema(): array
    {
        return [

            Section::make('NR Object')
                ->schema([

                    Grid::make(2)
                        ->schema([

                            TextInput::make('nrobject')
                                ->label('NR Object')
                                ->unique(Nrobject::class, ignoreRecord: true)
                                ->required()
                                ->inlineLabel()
                                ->maxLength(10),

                        ]),

                    Grid::make(2)
                        ->schema([

                            TextInput::make('nrobject_name')
                                ->label('Name')
                                ->required()
                                ->inlineLabel(),

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

                ColumnGroup::make('NR Object', [

                    TextColumn::make('nrobject')
                        ->label('NR Object')
                        ->searchable(isIndividual: true, isGlobal: false)
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
                        ->sortable(),

                    TextColumn::make('nrobject_name')
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

                        TextConstraint::make('nrobject')
                            ->label('NR Object')
                            ->nullable(),

                        TextConstraint::make('nrobject_name')
                            ->label('Name')
                            ->nullable(),

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
                    ->importer(NrobjectImporter::class),
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),
                Action::make('Assign')
                    ->label('New Number Range')
                    ->icon('heroicon-m-arrow-right-end-on-rectangle')
                    ->size(ActionSize::Small)
                    ->outlined()
                    ->button()
                    ->url(fn(Nrobject $record): string => route('filament.submonitoring.number-range.resources.nrobjects.managenumberranges', $record)),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),

                ExportBulkAction::make()
                    ->label('Export')
                    ->exporter(NrobjectExporter::class)
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
            'index' => Pages\ListNrobjects::route('/'),
            'create' => Pages\CreateNrobject::route('/create'),
            'view' => Pages\ViewNrobject::route('/{record}'),
            'edit' => Pages\EditNrobject::route('/{record}/edit'),
            'managenumberranges' => Pages\ManageNumberranges::route('/{record}/numberranges'),
        ];
    }

    public static function getRecordSubNavigation(Page $page): array
    {
        return $page->generateNavigationItems([
            ManageNumberranges::class,
        ]);
    }

    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Start;
}
