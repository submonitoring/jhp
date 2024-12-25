<?php

namespace App\Filament\Submonitoring\Resources;

use App\Filament\Exports\SalesorganizationExporter;
use App\Filament\Imports\SalesorganizationImporter;
use App\Filament\Submonitoring\Clusters\OrganizationalStructures;
use App\Filament\Submonitoring\Resources\SalesorganizationResource\Pages;
use App\Filament\Submonitoring\Resources\SalesorganizationResource\Pages\ManageDistributionchannel;
use App\Filament\Submonitoring\Resources\SalesorganizationResource\RelationManagers;
use App\Models\Companycode;
use App\Models\Currency;
use App\Models\Salesorganization;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Resources\Resource;
use Filament\Support\Enums\ActionSize;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\ExportBulkAction;
use Filament\Tables\Actions\ImportAction;
use Filament\Tables\Columns\ColumnGroup;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\QueryBuilder;
use Filament\Tables\Filters\QueryBuilder\Constraints\BooleanConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\DateConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\SelectConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\TextConstraint;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Schmeits\FilamentCharacterCounter\Forms\Components\TextInput;

class SalesorganizationResource extends Resource
{
    protected static ?string $model = Salesorganization::class;

    public static function canViewAny(): bool
    {
        return auth()->user()->id == 1;
    }

    protected static ?string $modelLabel = 'Sales Organization';

    protected static ?string $pluralModelLabel = 'Sales Organization';

    protected static ?string $navigationLabel = 'Sales Organization';

    protected static ?int $navigationSort = 825000150;

    protected static ?string $cluster = OrganizationalStructures::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form

            ->schema(static::SalesorganizationFormSchema());
    }

    public static function SalesorganizationFormSchema(): array
    {
        return [

            Section::make('Sales Organization')
                ->schema([

                    Grid::make(4)
                        ->schema([

                            TextInput::make('sales_organization')
                                ->label('Sales Organization')
                                ->required()
                                ->maxLength(4)
                                ->unique(Salesorganization::class, ignoreRecord: true),

                        ]),

                    Grid::make(4)
                        ->schema([

                            TextInput::make('sales_organization_name')
                                ->label('Name')
                                ->required(),

                        ]),

                ])
                ->compact(),

            Section::make('Company Code Assignment')
                ->schema([

                    Grid::make(4)
                        ->schema([

                            ToggleButtons::make('companycode_id')
                                ->label('Company Code')
                                ->options(Companycode::whereIsActive(1)->pluck('company_code_name', 'id'))
                                ->helperText(function ($state) {

                                    $compcodename = Companycode::whereId($state)->first();

                                    if ($compcodename == null) {
                                        return;
                                    } elseif ($compcodename != null) {

                                        return ($compcodename->company_code . ' - ' . $compcodename->company_code_name);
                                    }
                                }),

                        ]),

                ])
                ->compact(),

            Section::make('Currency')
                ->schema([

                    Grid::make(4)
                        ->schema([

                            Select::make('currency_id')
                                ->label('Currency')
                                ->options(Currency::whereIsActive(1)->pluck('currency', 'id')),

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

                ColumnGroup::make('Sales Organization', [

                    TextColumn::make('sales_organization')
                        ->label('Sales Organization')
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
                        ->sortable(),

                    TextColumn::make('sales_organization_name')
                        ->label('Name')
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
                        ->sortable(),

                ]),

                ColumnGroup::make('Company Code', [

                    TextColumn::make('companycode.company_code_name')
                        ->label('Company Code')
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
                        ->sortable(),

                ]),

                ColumnGroup::make('Currency', [

                    TextColumn::make('currency.currency')
                        ->label('Currency')
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
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

                        TextConstraint::make('sales_organization')
                            ->label('Sales Organization')
                            ->icon(false)
                            ->nullable(),

                        TextConstraint::make('sales_organization_name')
                            ->label('Name')
                            ->icon(false)
                            ->nullable(),

                        SelectConstraint::make('currency_id')
                            ->label('Currency')
                            ->options(Currency::whereIsActive(1)->pluck('currency', 'id'))
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
                    ->importer(SalesorganizationImporter::class),
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),

                ActionGroup::make([
                    Action::make('AssignDist')
                        ->label('Assign Dist. Chann.')
                        ->icon('heroicon-m-arrow-right-end-on-rectangle')
                        ->url(fn(Model $record): string => route('filament.submonitoring.organizational-structures.resources.salesorganizations.managedistributionchannel', $record)),

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
                    ->exporter(SalesorganizationExporter::class)
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
            'index' => Pages\ListSalesorganizations::route('/'),
            'create' => Pages\CreateSalesorganization::route('/create'),
            'view' => Pages\ViewSalesorganization::route('/{record}'),
            'edit' => Pages\EditSalesorganization::route('/{record}/edit'),
            'managedistributionchannel' => Pages\ManageDistributionchannel::route('/{record}/distributionchannel'),
        ];
    }

    public static function getRecordSubNavigation(Page $page): array
    {
        return $page->generateNavigationItems([
            ManageDistributionchannel::class,
        ]);
    }
}
