<?php

namespace App\Filament\Submonitoring\Resources;

use App\Filament\Submonitoring\Clusters\OrganizationalStructures;
use App\Filament\Submonitoring\Resources\CompanycodeResource\Pages;
use App\Filament\Submonitoring\Resources\CompanycodeResource\Pages\EditCompanycode;
use App\Filament\Submonitoring\Resources\CompanycodeResource\Pages\ManagePlant;
use App\Filament\Submonitoring\Resources\CompanycodeResource\Pages\ViewCompanycode;
use App\Filament\Submonitoring\Resources\CompanycodeResource\RelationManagers;
use App\Filament\Submonitoring\Resources\CompanycodeResource\RelationManagers\AddressesRelationManager;
use App\Models\Companycode;
use App\Models\Currency;
use Filament\Forms;
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
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\QueryBuilder;
use Filament\Tables\Filters\QueryBuilder\Constraints\BooleanConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\TextConstraint;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Schmeits\FilamentCharacterCounter\Forms\Components\TextInput;

class CompanycodeResource extends Resource
{
    protected static ?string $model = Companycode::class;

    public static function canViewAny(): bool
    {
        return auth()->user()->id == 1;
    }

    protected static ?string $modelLabel = 'Company Code';

    protected static ?string $pluralModelLabel = 'Company Code';

    protected static ?string $navigationLabel = 'Company Code';

    protected static ?int $navigationSort = 825000000;

    protected static ?string $cluster = OrganizationalStructures::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make('Input Data Company Code')
                    ->description('Silakan input data Company Code')
                    ->schema(static::CompanyCodeFormSchema())
                    ->columns(2)
            ]);
    }

    public static function CompanyCodeFormSchema(): array
    {
        return [

            TextInput::make('company_code')
                ->label('Company Code')
                ->required()
                ->maxLength(4)
                ->unique(Companycode::class, ignoreRecord: true),

            TextInput::make('company_code_name')
                ->label('Name')
                ->required(),

            TextInput::make('vat_number')
                ->label('VAT Number')
                ->numeric()
                ->required(),

            Select::make('currency_id')
                ->label('Currency')
                ->options(Currency::whereIsActive(1)->pluck('currency', 'id')),

            Toggle::make('is_active')
                ->label('Status')
                ->default(true),

        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('company_code')
                    ->label('Company Code')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('company_code_name')
                    ->label('Name')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('currency.currency')
                    ->label('Currency')
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

                        TextConstraint::make('company_code')
                            ->label('Company Code')
                            ->nullable(),

                        TextConstraint::make('company_code_name')
                            ->label('Name')
                            ->nullable(),

                        BooleanConstraint::make('is_active'),

                    ])
                    ->constraintPickerColumns(2),
            ], layout: Tables\Enums\FiltersLayout::AboveContentCollapsible)
            ->deferFilters()
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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
            AddressesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCompanycodes::route('/'),
            'create' => Pages\CreateCompanycode::route('/create'),
            'view' => Pages\ViewCompanycode::route('/{record}'),
            'edit' => Pages\EditCompanycode::route('/{record}/edit'),
            'manageplant' => Pages\ManagePlant::route('/{record}/plant'),
        ];
    }

    public static function getRecordSubNavigation(Page $page): array
    {
        return $page->generateNavigationItems([
            ViewCompanycode::class,
            EditCompanycode::class,
            ManagePlant::class,
        ]);
    }

    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Start;
}
