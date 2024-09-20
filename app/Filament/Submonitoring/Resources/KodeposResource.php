<?php

namespace App\Filament\Submonitoring\Resources;

use App\Filament\Submonitoring\Clusters\AddressData;
use App\Filament\Submonitoring\Resources\KodeposResource\Pages;
use App\Filament\Submonitoring\Resources\KodeposResource\RelationManagers;
use App\Models\Kodepos;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
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

class KodeposResource extends Resource
{
    public static function canViewAny(): bool
    {
        return auth()->user()->id == 1;
    }

    protected static ?string $modelLabel = 'Kodepos';

    protected static ?string $pluralModelLabel = 'Kodepos';

    protected static ?string $navigationLabel = 'Kodepos';

    protected static ?int $navigationSort = 905000250;

    protected static ?string $model = Kodepos::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $cluster = AddressData::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make('Input Data Kodepos')
                    ->description('Silakan input data Kodepos')
                    ->schema(static::KodeposFormSchema())
                    ->columns(2)
            ]);
    }

    public static function KodeposFormSchema(): array
    {
        return [

            TextInput::make('country_id')
                ->label('Country')
                ->disabled(),

            TextInput::make('provinsi_id')
                ->label('Provinsi')
                ->disabled(),

            TextInput::make('kabupaten_id')
                ->label('Kabupaten')
                ->disabled(),

            TextInput::make('kecamatan_id')
                ->label('Kecamatan')
                ->disabled(),

            TextInput::make('kelurahan_id')
                ->label('Kelurahan')
                ->disabled(),

            TextInput::make('kodepos')
                ->label('Kodepos')
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

                TextColumn::make('provinsi.provinsi')
                    ->label('Provinsi')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('kabupaten.kabupaten')
                    ->label('Kabupaten')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('kecamatan.kecamatan')
                    ->label('Kecamatan')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('kelurahan.kelurahan')
                    ->label('Kelurahan')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('kodepos')
                    ->label('kodepos')
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

                        TextConstraint::make('provinsi.provinsi')
                            ->label('Provinsi')
                            ->nullable(),

                        TextConstraint::make('kabupaten.kabupaten')
                            ->label('Kabupaten')
                            ->nullable(),

                        TextConstraint::make('kecamatan.kecamatan')
                            ->label('Kecamatan')
                            ->nullable(),

                        TextConstraint::make('kelurahan.kelurahan')
                            ->label('Kelurahan')
                            ->nullable(),

                        TextConstraint::make('kodepos')
                            ->label('kodepos')
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKodepos::route('/'),
            'create' => Pages\CreateKodepos::route('/create'),
            'view' => Pages\ViewKodepos::route('/{record}'),
            'edit' => Pages\EditKodepos::route('/{record}/edit'),
        ];
    }
}
