<?php

namespace App\Filament\Submonitoring\Resources;

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
            ->schema([

                Section::make('Input Data Plant')
                    ->description('Silakan input data Plant')
                    ->schema(static::PlantFormSchema())
                    ->columns(2)
            ]);
    }

    public static function PlantFormSchema(): array
    {
        return [

            TextInput::make('plant')
                ->label('Plant')
                ->required()
                ->maxLength(4)
                ->unique(Plant::class, ignoreRecord: true),

            TextInput::make('plant_name')
                ->label('Name')
                ->required(),

            Toggle::make('is_active')
                ->label('Status')
                ->default(true),

        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('companycode.company_code')
                    ->label('Company Code')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

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

                        TextConstraint::make('plant')
                            ->label('Plant')
                            ->nullable(),

                        TextConstraint::make('plant_name')
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
            ViewPlant::class,
            EditPlant::class,
            ManageCyclecounting::class,
        ]);
    }

    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Start;
}
