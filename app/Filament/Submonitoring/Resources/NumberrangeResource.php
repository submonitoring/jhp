<?php

namespace App\Filament\Submonitoring\Resources;

use App\Filament\Submonitoring\Clusters\NumberRange as ClustersNumberRange;
use App\Filament\Submonitoring\Resources\NrobjectResource\Pages\EditNrobject;
use App\Filament\Submonitoring\Resources\NumberrangeResource\Pages;
use App\Filament\Submonitoring\Resources\NumberrangeResource\Pages\ManageDocumenttype;
use App\Filament\Submonitoring\Resources\NumberrangeResource\Pages\ManageMaterialtypes;
use App\Filament\Submonitoring\Resources\NumberrangeResource\Pages\ViewNumberrange;
use App\Filament\Submonitoring\Resources\NumberrangeResource\RelationManagers;
use App\Models\Numberrange;
use Filament\Forms;
use Filament\Forms\Components\Section;
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

class NumberrangeResource extends Resource
{
    public static function canViewAny(): bool
    {
        return auth()->user()->id == 1;
    }

    protected static ?string $modelLabel = 'Number Ranges';

    protected static ?string $pluralModelLabel = 'Number Ranges';

    protected static ?string $navigationLabel = 'Number Ranges';

    protected static ?int $navigationSort = 910000050;

    protected static ?string $cluster = ClustersNumberRange::class;

    protected static ?string $model = Numberrange::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make('Input Data Number Ranges')
                    ->description('Silakan input data Number Ranges')
                    ->schema(static::NumbeRangesFormSchema())
                    ->columns(2)
            ]);
    }

    public static function NumbeRangesFormSchema(): array
    {
        return [

            TextInput::make('nrobject_id')
                ->label('NR Object')
                ->disabled(),

            TextInput::make('nr_interval')
                ->label('Interval')
                ->required()
                ->maxLength(4)
                ->unique(Numberrange::class, ignoreRecord: true),

            TextInput::make('year')
                ->label('Year')
                ->numeric()
                ->maxLength(4)
                ->characterLimit(4),

            TextInput::make('number')
                ->label('Number Range')
                ->numeric()
                ->required()
                ->maxLength(20)
                ->characterLimit(20),

            Toggle::make('is_external')
                ->label('External?')
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

                TextColumn::make('nrobject.nrobject_name')
                    ->label('NR Object')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('nr_interval')
                    ->label('NR Interval')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('year')
                    ->label('Year')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('number')
                    ->label('Number Range')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('current_number')
                    ->label('Current Number')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                ToggleColumn::make('is_external')
                    ->label('External?')
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

                        TextConstraint::make('nrobject.nrobject_name')
                            ->label('NR Object')
                            ->nullable(),

                        TextConstraint::make('nr_interval')
                            ->label('NR Interval')
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
            'index' => Pages\ListNumberranges::route('/'),
            'create' => Pages\CreateNumberrange::route('/create'),
            'view' => Pages\ViewNumberrange::route('/{record}'),
            'edit' => Pages\EditNumberrange::route('/{record}/edit'),
            'managematerialtypes' => Pages\ManageMaterialtypes::route('/{record}/materialtypes'),
            'managedocumenttypes' => Pages\ManageDocumenttype::route('/{record}/documenttypes'),
        ];
    }

    public static function getRecordSubNavigation(Page $page): array
    {
        return $page->generateNavigationItems([
            ViewNumberrange::class,
            EditNrobject::class,
            ManageMaterialtypes::class,
            ManageDocumenttype::class,
        ]);
    }

    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Start;
}
