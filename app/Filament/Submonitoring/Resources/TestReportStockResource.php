<?php

namespace App\Filament\Submonitoring\Resources;

use App\Filament\Submonitoring\Clusters\Materialdocument;
use App\Filament\Submonitoring\Resources\TestReportStockResource\Pages;
use App\Filament\Submonitoring\Resources\TestReportStockResource\RelationManagers;
use App\Models\TestJurnal;
use App\Models\TestReportStock;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\IconPosition;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\IconColumn\IconColumnSize;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TestReportStockResource extends Resource
{
    protected static ?string $model = TestReportStock::class;

    public static function canViewAny(): bool
    {
        return auth()->user()->id == 1;
    }

    protected static ?string $modelLabel = 'Test Report Stock';

    protected static ?string $pluralModelLabel = 'Test Report Stock';

    protected static ?string $navigationLabel = 'Test Report Stock';

    protected static ?int $navigationSort = 400000251;

    protected static ?string $cluster = Materialdocument::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('material_type')
                    ->maxLength(255),
                Forms\Components\TextInput::make('material_number')
                    ->maxLength(255),
                Forms\Components\TextInput::make('safety_stock')
                    ->maxLength(255),
                Forms\Components\TextInput::make('quantity')
                    ->numeric(),
                Forms\Components\TextInput::make('flag')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('material_type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('material_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('safety_stock')
                    ->searchable(),
                Tables\Columns\TextColumn::make('quantity')
                    ->default(function ($record) {

                        $d = TestJurnal::where('material_number', $record->material_number)->where('debitcredit', 'd')->sum('quantity');

                        $c = TestJurnal::where('material_number', $record->material_number)->where('debitcredit', 'c')->sum('quantity');

                        return ($d - $c);
                    })
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('flag')
                    ->default(function ($record) {

                        $d = TestJurnal::where('material_number', $record->material_number)->where('debitcredit', 'd')->sum('quantity');

                        $c = TestJurnal::where('material_number', $record->material_number)->where('debitcredit', 'c')->sum('quantity');

                        $sum = $d - $c;

                        $safetystock = $record->safety_stock;

                        $sisa = $sum - $safetystock;

                        return ($sisa);
                    })
                    ->icon(function ($record) {

                        $d = TestJurnal::where('material_number', $record->material_number)->where('debitcredit', 'd')->sum('quantity');

                        $c = TestJurnal::where('material_number', $record->material_number)->where('debitcredit', 'c')->sum('quantity');

                        $sum = $d - $c;

                        $safetystock = $record->safety_stock;

                        if ($sum < $safetystock) {

                            return ('heroicon-o-exclamation-circle');
                        }
                    })
                    ->iconColor('primary')
                    ->iconPosition(IconPosition::After)
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->poll('10s')
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),

            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListTestReportStocks::route('/'),
            'create' => Pages\CreateTestReportStock::route('/create'),
            'view' => Pages\ViewTestReportStock::route('/{record}'),
            'edit' => Pages\EditTestReportStock::route('/{record}/edit'),
        ];
    }
}
