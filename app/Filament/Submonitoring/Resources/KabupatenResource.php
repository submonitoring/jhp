<?php

namespace App\Filament\Submonitoring\Resources;

use App\Filament\Submonitoring\Clusters\AddressData;
use App\Filament\Submonitoring\Resources\KabupatenResource\Pages;
use App\Filament\Submonitoring\Resources\KabupatenResource\RelationManagers;
use App\Filament\Submonitoring\Resources\KabupatenResource\RelationManagers\KecamatansRelationManager;
use App\Models\Kabupaten;
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

class KabupatenResource extends Resource
{
    public static function canViewAny(): bool
    {
        return auth()->user()->id == 1;
    }

    protected static ?string $modelLabel = 'Kabupaten';

    protected static ?string $pluralModelLabel = 'Kabupaten';

    protected static ?string $navigationLabel = 'Kabupaten';

    protected static ?int $navigationSort = 905000100;

    protected static ?string $model = Kabupaten::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $cluster = AddressData::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make('Input Data Kabupaten')
                    ->description('Silakan input data Kabupaten')
                    ->schema(static::KabupatenFormSchema())
                    ->columns(2)
            ]);
    }

    public static function KabupatenFormSchema(): array
    {
        return [

            TextInput::make('provinsi_id')
                ->label('Provinsi')
                ->disabled(),

            TextInput::make('kabupaten_code')
                ->label('Kode Kabupaten')
                ->required(),

            TextInput::make('kabupaten')
                ->label('Kabupaten')
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

                TextColumn::make('provinsi.provinsi')
                    ->label('Provinsi')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('kabupaten_code')
                    ->label('Kode Kabupaten')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('kabupaten')
                    ->label('Kabupaten')
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

                        TextConstraint::make('provinsi.provinsi')
                            ->label('Provinsi')
                            ->nullable(),

                        TextConstraint::make('kabupaten_code')
                            ->label('Kode Kabupaten')
                            ->nullable(),

                        TextConstraint::make('Kabupaten')
                            ->label('Kabupaten')
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
            KecamatansRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKabupatens::route('/'),
            'create' => Pages\CreateKabupaten::route('/create'),
            'view' => Pages\ViewKabupaten::route('/{record}'),
            'edit' => Pages\EditKabupaten::route('/{record}/edit'),
        ];
    }
}
