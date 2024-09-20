<?php

namespace App\Filament\Submonitoring\Resources;

use App\Filament\Submonitoring\Clusters\Document;
use App\Filament\Submonitoring\Resources\MaterialtypeResource\Pages\ViewMaterialtype;
use App\Filament\Submonitoring\Resources\MovementtypeResource\Pages;
use App\Filament\Submonitoring\Resources\MovementtypeResource\Pages\EditMovementtype;
use App\Filament\Submonitoring\Resources\MovementtypeResource\Pages\ManageReasonformovement;
use App\Filament\Submonitoring\Resources\MovementtypeResource\Pages\ViewMovementtype;
use App\Filament\Submonitoring\Resources\MovementtypeResource\RelationManagers;
use App\Models\Debitcreditindicator;
use App\Models\Movementtype;
use App\Models\Reasonformovementcontrol;
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

class MovementtypeResource extends Resource
{
    protected static ?string $model = Movementtype::class;

    public static function canViewAny(): bool
    {
        return auth()->user()->id == 1;
    }

    protected static ?string $modelLabel = 'Movement Type';

    protected static ?string $pluralModelLabel = 'Movement Type';

    protected static ?string $navigationLabel = 'Movement Type';

    protected static ?int $navigationSort = 815000150;

    protected static ?string $cluster = Document::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make('Input Data Movement Type')
                    ->description('Silakan input data Movement Type')
                    ->schema(static::MovementTypeFormSchema())
                    ->columns(2)
            ]);
    }

    public static function MovementTypeFormSchema(): array
    {
        return [

            TextInput::make('movement_type')
                ->label('Movement Type')
                ->required()
                ->maxLength(3)
                ->unique(Movementtype::class, ignoreRecord: true),

            TextInput::make('movement_type_desc')
                ->label('Description')
                ->required(),

            Select::make('debitcreditindicator_id')
                ->label('Debit/Credit')
                ->options(Debitcreditindicator::whereIsActive(1)->pluck('debit_credit_indicator_desc', 'id')),

            Select::make('reasonformovementcontrol_id')
                ->label('Reason for Movement Control')
                ->options(Reasonformovementcontrol::whereIsActive(1)->pluck('reason_for_movement_control_desc', 'id')),

            Toggle::make('is_reversal')
                ->label('Reversal?')
                ->default(false),

            Toggle::make('is_active')
                ->label('Status')
                ->default(true),

        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('movement_type')
                    ->label('Movement Type')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('movement_type_desc')
                    ->label('Description')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('debitcreditindicator.debit_credit_indicator_desc')
                    ->label('Debit/Credit')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('reasonformovementcontrol.reason_for_movement_control_desc')
                    ->label('Reason Control')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                ToggleColumn::make('is_reversal')
                    ->label('Reversal?')
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

                        TextConstraint::make('movement_type')
                            ->label('Movement Type')
                            ->nullable(),

                        TextConstraint::make('movement_type_desc')
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
            'index' => Pages\ListMovementtypes::route('/'),
            'create' => Pages\CreateMovementtype::route('/create'),
            'view' => Pages\ViewMovementtype::route('/{record}'),
            'edit' => Pages\EditMovementtype::route('/{record}/edit'),
            'managereasonformovement' => Pages\ManageReasonformovement::route('/{record}/reasonformovement'),
        ];
    }

    public static function getRecordSubNavigation(Page $page): array
    {
        return $page->generateNavigationItems([
            ViewMovementtype::class,
            EditMovementtype::class,
            ManageReasonformovement::class,
        ]);
    }

    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Start;
}
