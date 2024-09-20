<?php

namespace App\Filament\Submonitoring\Resources;

use App\Filament\Submonitoring\Clusters\AddressData;
use App\Filament\Submonitoring\Resources\ProvinsiResource\Pages;
use App\Filament\Submonitoring\Resources\ProvinsiResource\RelationManagers;
use App\Filament\Submonitoring\Resources\ProvinsiResource\RelationManagers\KabupatensRelationManager;
use App\Models\Provinsi;
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

class ProvinsiResource extends Resource
{
    public static function canViewAny(): bool
    {
        return auth()->user()->id == 1;
    }

    protected static ?string $modelLabel = 'Provinsi';

    protected static ?string $pluralModelLabel = 'Provinsi';

    protected static ?string $navigationLabel = 'Provinsi';

    protected static ?int $navigationSort = 905000050;

    protected static ?string $model = Provinsi::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $cluster = AddressData::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make('Input Data Provinsi')
                    ->description('Silakan input data Provinsi')
                    ->schema(static::ProvinsiFormSchema())
                    ->columns(2)
            ]);
    }

    public static function ProvinsiFormSchema(): array
    {
        return [

            TextInput::make('country_id')
                ->label('Country')
                ->disabled(),

            TextInput::make('provinsi_code')
                ->label('Kode Provinsi')
                ->required(),

            TextInput::make('provinsi')
                ->label('Provinsi')
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

                TextColumn::make('country.country_name')
                    ->label('Country')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('provinsi_code')
                    ->label('Kode Provinsi')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('provinsi')
                    ->label('Provinsi')
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

                        TextConstraint::make('country.country_name')
                            ->label('Country')
                            ->nullable(),

                        TextConstraint::make('provinsi_code')
                            ->label('Kode Provinsi')
                            ->nullable(),

                        TextConstraint::make('provinsi')
                            ->label('Provinsi')
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
            KabupatensRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProvinsis::route('/'),
            'create' => Pages\CreateProvinsi::route('/create'),
            'view' => Pages\ViewProvinsi::route('/{record}'),
            'edit' => Pages\EditProvinsi::route('/{record}/edit'),
        ];
    }
}
