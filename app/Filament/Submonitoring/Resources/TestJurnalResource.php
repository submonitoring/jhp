<?php

namespace App\Filament\Submonitoring\Resources;

use App\Filament\Submonitoring\Clusters\Materialdocument;
use App\Filament\Submonitoring\Resources\TestJurnalResource\Pages;
use App\Filament\Submonitoring\Resources\TestJurnalResource\RelationManagers;
use App\Models\TestJurnal;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\ExportBulkAction;
use Filament\Tables\Actions\ImportAction;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Columns\ColumnGroup;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\QueryBuilder;
use Filament\Tables\Filters\QueryBuilder\Constraints\BooleanConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\DateConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\TextConstraint;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Schmeits\FilamentCharacterCounter\Forms\Components\TextInput;

class TestJurnalResource extends Resource
{
    protected static ?string $model = TestJurnal::class;

    public static function canViewAny(): bool
    {
        return auth()->user()->id == 1;
    }

    protected static ?string $modelLabel = 'Test Jurnal';

    protected static ?string $pluralModelLabel = 'Test Jurnal';

    protected static ?string $navigationLabel = 'Test Jurnal';

    protected static ?int $navigationSort = 400000250;

    protected static ?string $cluster = Materialdocument::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('document_date'),
                Forms\Components\DatePicker::make('posting_date'),
                Forms\Components\TextInput::make('document_number')
                    ->maxLength(255),
                Forms\Components\TextInput::make('item_number')
                    ->maxLength(255),
                Forms\Components\TextInput::make('material_number')
                    ->maxLength(255),
                Forms\Components\TextInput::make('debitcredit')
                    ->maxLength(255),
                Forms\Components\TextInput::make('gl_account')
                    ->maxLength(255),
                Forms\Components\TextInput::make('quantity')
                    ->numeric(),
                Forms\Components\TextInput::make('amount')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->groups([
                Group::make('material_number')
                    ->collapsible(),
            ])
            ->defaultGroup('material_number')
            ->columns([
                Tables\Columns\TextColumn::make('document_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('posting_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('document_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('item_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('material_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('debitcredit')
                    ->searchable(),
                Tables\Columns\TextColumn::make('gl_account')
                    ->searchable(),
                Tables\Columns\TextColumn::make('quantity')
                    ->summarize(Sum::make())
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('amount')
                    ->summarize(Sum::make())
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
            'index' => Pages\ListTestJurnals::route('/'),
            'create' => Pages\CreateTestJurnal::route('/create'),
            'view' => Pages\ViewTestJurnal::route('/{record}'),
            'edit' => Pages\EditTestJurnal::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {

        return parent::getEloquentQuery()->where('item_number', '<>', null);
    }
}
