<?php

namespace App\Filament\Submonitoring\Resources;

use App\Filament\Submonitoring\Clusters\AddressData;
use App\Filament\Submonitoring\Resources\KelurahanResource\Pages;
use App\Filament\Submonitoring\Resources\KelurahanResource\RelationManagers;
use App\Models\Kelurahan;
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

class KelurahanResource extends Resource
{
    public static function canViewAny(): bool
    {
        return auth()->user()->id == 1;
    }

    protected static ?string $modelLabel = 'Kelurahan';

    protected static ?string $pluralModelLabel = 'Kelurahan';

    protected static ?string $navigationLabel = 'Kelurahan';

    protected static ?int $navigationSort = 905000200;

    protected static ?string $model = Kelurahan::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $cluster = AddressData::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make('Input Data Kelurahan')
                    ->description('Silakan input data Kelurahan')
                    ->schema(static::KelurahanFormSchema())
                    ->columns(2)
            ]);
    }

    public static function KelurahanFormSchema(): array
    {
        return [

            TextInput::make('kecamatan_id')
                ->label('Kecamatan')
                ->disabled(),

            TextInput::make('kelurahan_code')
                ->label('Kode Kelurahan')
                ->required(),

            TextInput::make('kelurahan')
                ->label('Kelurahan')
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

                TextColumn::make('kecamatan.kecamatan')
                    ->label('Kecamatan')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('kelurahan_code')
                    ->label('Kode Kelurahan')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('kelurahan')
                    ->label('Kelurahan')
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

                        TextConstraint::make('kecamatan.kecamatan')
                            ->label('Kecamatan')
                            ->nullable(),

                        TextConstraint::make('kelurahan_code')
                            ->label('Kode Kelurahan')
                            ->nullable(),

                        TextConstraint::make('kelurahan')
                            ->label('Kelurahan')
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
            'index' => Pages\ListKelurahans::route('/'),
            'create' => Pages\CreateKelurahan::route('/create'),
            'view' => Pages\ViewKelurahan::route('/{record}'),
            'edit' => Pages\EditKelurahan::route('/{record}/edit'),
        ];
    }
}
