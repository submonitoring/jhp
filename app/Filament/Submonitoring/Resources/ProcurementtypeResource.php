<?php

namespace App\Filament\Submonitoring\Resources;

use App\Filament\Submonitoring\Clusters\MaterialMaster;
use App\Filament\Submonitoring\Resources\ProcurementtypeResource\Pages;
use App\Filament\Submonitoring\Resources\ProcurementtypeResource\RelationManagers;
use App\Models\Procurementtype;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
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

class ProcurementtypeResource extends Resource
{
    protected static ?string $model = Procurementtype::class;

    public static function canViewAny(): bool
    {
        return auth()->user()->id == 1;
    }

    protected static ?string $modelLabel = 'Procurement Type';

    protected static ?string $pluralModelLabel = 'Procurement Type';

    protected static ?string $navigationLabel = 'Procurement Type';

    protected static ?int $navigationSort = 810000300;

    protected static ?string $cluster = MaterialMaster::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make('Input Data Procurement Type')
                    ->description('Silakan input data Procurement Type')
                    ->schema(static::ProcurementTypeFormSchema())
                    ->columns(2)
            ]);
    }

    public static function ProcurementTypeFormSchema(): array
    {
        return [

            TextInput::make('procurement_type')
                ->label('Procurement Type')
                ->required()
                ->maxLength(1)
                ->unique(Procurementtype::class, ignoreRecord: true),

            TextInput::make('procurement_type_desc')
                ->label('Description')
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

                TextColumn::make('procurement_type')
                    ->label('Procurement Type')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('procurement_type_desc')
                    ->label('Description')
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

                        TextConstraint::make('procurement_type')
                            ->label('Procurement Type')
                            ->nullable(),

                        TextConstraint::make('procurement_type_desc')
                            ->label('Description')
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProcurementtypes::route('/'),
            'create' => Pages\CreateProcurementtype::route('/create'),
            'view' => Pages\ViewProcurementtype::route('/{record}'),
            'edit' => Pages\EditProcurementtype::route('/{record}/edit'),
        ];
    }
}
