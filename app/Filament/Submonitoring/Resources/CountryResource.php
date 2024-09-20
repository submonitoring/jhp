<?php

namespace App\Filament\Submonitoring\Resources;

use App\Filament\Submonitoring\Clusters\AddressData;
use App\Filament\Submonitoring\Resources\CountryResource\Pages;
use App\Filament\Submonitoring\Resources\CountryResource\RelationManagers;
use App\Filament\Submonitoring\Resources\CountryResource\RelationManagers\ProvinsisRelationManager;
use App\Models\Country;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
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

class CountryResource extends Resource
{
    public static function canViewAny(): bool
    {
        return auth()->user()->id == 1;
    }

    protected static ?string $modelLabel = 'Country';

    protected static ?string $pluralModelLabel = 'Country';

    protected static ?string $navigationLabel = 'Country';

    protected static ?int $navigationSort = 905000000;

    protected static ?string $model = Country::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $cluster = AddressData::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make('Input Data Country')
                    ->description('Silakan input data Country')
                    ->schema(static::CountryFormSchema())
                    ->columns(2)
            ]);
    }

    public static function CountryFormSchema(): array
    {
        return [

            TextInput::make('country_name')
                ->label('Name')
                ->required(),

            TextInput::make('alpha_2')
                ->label('Country Alpha-2')
                ->unique(Country::class, ignoreRecord: true)
                ->required()
                ->maxLength(2)
                ->characterLimit(2),

            TextInput::make('alpha_3')
                ->label('Country Alpha-3')
                ->unique(Country::class, ignoreRecord: true)
                ->required()
                ->maxLength(3)
                ->characterLimit(3),

            TextInput::make('country_code')
                ->label('Country Code')
                ->unique(Country::class, ignoreRecord: true)
                ->required()
                ->maxLength(3)
                ->characterLimit(3),

            TextInput::make('region')
                ->label('Region'),

            TextInput::make('sub_region')
                ->label('Sub Region'),

            TextInput::make('intermediate_region')
                ->label('Intermediate Region'),

            TextInput::make('region_code')
                ->label('Region Code'),

            TextInput::make('sub_region_code')
                ->label('Sub Region Code'),

            TextInput::make('intermediate_region_code')
                ->label('Intermediate Region Code'),

            Toggle::make('is_active')
                ->label('Status')
                ->default(true),

        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('country_name')
                    ->label('Name')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('alpha_2')
                    ->label('Country Alpha-2')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('alpha_3')
                    ->label('Country Alpha-3')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('country_code')
                    ->label('Country Code')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('region')
                    ->label('Region')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('sub_region')
                    ->label('Sub Region')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('intermediate_region')
                    ->label('Intermediate Region')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('region_code')
                    ->label('Region Code')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('sub_region_code')
                    ->label('Sub Region Code')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('intermediate_region_code')
                    ->label('Intermediate Region Code')
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

                        TextConstraint::make('country_name')
                            ->label('Name')
                            ->nullable(),

                        TextConstraint::make('alpha_2')
                            ->label('Country Alpha-2')
                            ->nullable(),

                        TextConstraint::make('alpha_3')
                            ->label('Country Alpha-3')
                            ->nullable(),

                        TextConstraint::make('country_code')
                            ->label('Country Code')
                            ->nullable(),

                        TextConstraint::make('region')
                            ->label('Region')
                            ->nullable(),

                        TextConstraint::make('sub_region')
                            ->label('Sub Region')
                            ->nullable(),

                        TextConstraint::make('intermediate_region')
                            ->label('Intermediate Region')
                            ->nullable(),

                        TextConstraint::make('region_code')
                            ->label('Region Code')
                            ->nullable(),

                        TextConstraint::make('sub_region_code')
                            ->label('Sub Region Code')
                            ->nullable(),

                        TextConstraint::make('intermediate_region_code')
                            ->label('Intermediate Region Code')
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
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            ProvinsisRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCountries::route('/'),
            'create' => Pages\CreateCountry::route('/create'),
            'view' => Pages\ViewCountry::route('/{record}'),
            'edit' => Pages\EditCountry::route('/{record}/edit'),
        ];
    }
}
