<?php

namespace App\Filament\Submonitoring\Resources;

use App\Filament\Exports\CurrencyExporter;
use App\Filament\Imports\CurrencyImporter;
use App\Filament\Submonitoring\Clusters\General;
use App\Filament\Submonitoring\Resources\CurrencyResource\Pages;
use App\Filament\Submonitoring\Resources\CurrencyResource\RelationManagers;
use App\Models\Currency;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\ExportBulkAction;
use Filament\Tables\Actions\ImportAction;
use Filament\Tables\Columns\ColumnGroup;
use Filament\Tables\Columns\IconColumn;
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

class CurrencyResource extends Resource
{
    public static function canViewAny(): bool
    {
        return auth()->user()->id == 1;
    }

    protected static ?string $modelLabel = 'Currency';

    protected static ?string $pluralModelLabel = 'Currency';

    protected static ?string $navigationLabel = 'Currency';

    protected static ?int $navigationSort = 805000000;

    protected static ?string $cluster = General::class;

    protected static ?string $model = Currency::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form

            ->schema(static::CurrencyFormSchema());
    }

    public static function CurrencyFormSchema(): array
    {
        return [

            Section::make('Currency')
                ->schema([

                    Grid::make(4)
                        ->schema([

                            TextInput::make('currency')
                                ->label('Currency')
                                ->required(),

                        ]),

                    Grid::make(4)
                        ->schema([

                            TextInput::make('symbol')
                                ->label('Symbol')
                                ->required(),

                        ]),

                    Grid::make(4)
                        ->schema([

                            TextInput::make('currency_code')
                                ->label('Kode Currency')
                                ->required()
                                ->maxLength(3)
                                ->characterLimit(3),

                        ]),

                    Grid::make(4)
                        ->schema([

                            TextInput::make('numeric')
                                ->label('Numeric')
                                ->required()
                                ->maxLength(3)
                                ->characterLimit(3),

                        ]),

                    Grid::make(4)
                        ->schema([

                            TextInput::make('decimal')
                                ->label('Decimal')
                                ->required()
                                ->maxLength(4)
                                ->characterLimit(4),

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

                ColumnGroup::make('Currency Data', [

                    TextColumn::make('currency')
                        ->label('Currency')
                        ->searchable(isIndividual: true, isGlobal: false)
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
                        ->sortable(),

                    TextColumn::make('symbol')
                        ->label('Symbol')
                        ->searchable(isIndividual: true, isGlobal: false)
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
                        ->sortable(),

                    TextColumn::make('currency_code')
                        ->label('Kode Currency')
                        ->searchable(isIndividual: true, isGlobal: false)
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
                        ->sortable(),

                    TextColumn::make('numeric')
                        ->label('Numeric')
                        ->searchable(isIndividual: true, isGlobal: false)
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
                        ->sortable(),

                    TextColumn::make('decimal')
                        ->label('Decimal')
                        ->searchable(isIndividual: true, isGlobal: false)
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

                        TextConstraint::make('currency')
                            ->label('Currency')
                            ->nullable(),

                        TextConstraint::make('symbol')
                            ->label('Symbol')
                            ->nullable(),

                        TextConstraint::make('currency_code')
                            ->label('Kode Currency')
                            ->nullable(),

                        TextConstraint::make('numeric')
                            ->label('Numeric')
                            ->nullable(),

                        TextConstraint::make('decimal')
                            ->label('Decimal')
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
                ->importer(CurrencyImporter::class),
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                ]),


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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCurrencies::route('/'),
            'create' => Pages\CreateCurrency::route('/create'),
            'view' => Pages\ViewCurrency::route('/{record}'),
            'edit' => Pages\EditCurrency::route('/{record}/edit'),
        ];
    }
}
