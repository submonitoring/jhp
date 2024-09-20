<?php

namespace App\Filament\Submonitoring\Resources;

use App\Filament\Submonitoring\Clusters\NumberRange;
use App\Filament\Submonitoring\Resources\NrobjectResource\Pages;
use App\Filament\Submonitoring\Resources\NrobjectResource\Pages\EditNrobject;
use App\Filament\Submonitoring\Resources\NrobjectResource\Pages\ManageNumberranges;
use App\Filament\Submonitoring\Resources\NrobjectResource\Pages\ViewNrobject;
use App\Filament\Submonitoring\Resources\NrobjectResource\RelationManagers;
use App\Models\Nrobject;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
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

class NrobjectResource extends Resource
{
    public static function canViewAny(): bool
    {
        return auth()->user()->id == 1;
    }

    protected static ?string $modelLabel = 'NR Object';

    protected static ?string $pluralModelLabel = 'NR Object';

    protected static ?string $navigationLabel = 'NR Object';

    protected static ?int $navigationSort = 910000000;

    protected static ?string $model = Nrobject::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $cluster = NumberRange::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make('Input Data NR Object')
                    ->description('Silakan input data NR Object')
                    ->schema(static::NRObjectFormSchema())
                    ->columns(2)
            ]);
    }

    public static function NRObjectFormSchema(): array
    {
        return [

            TextInput::make('nrobject')
                ->label('NR Object')
                ->unique(Nrobject::class, ignoreRecord: true)
                ->required()
                ->maxLength(10),
            // ->characterLimit(10),

            TextInput::make('nrobject_name')
                ->label('Name')
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

                TextColumn::make('nrobject')
                    ->label('NR Object')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('nrobject_name')
                    ->label('Name')
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

                        TextConstraint::make('nrobject')
                            ->label('NR Object')
                            ->nullable(),

                        TextConstraint::make('nrobject_name')
                            ->label('Name')
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
            'index' => Pages\ListNrobjects::route('/'),
            'create' => Pages\CreateNrobject::route('/create'),
            'view' => Pages\ViewNrobject::route('/{record}'),
            'edit' => Pages\EditNrobject::route('/{record}/edit'),
            'managenumberranges' => Pages\ManageNumberranges::route('/{record}/numberranges'),
        ];
    }

    public static function getRecordSubNavigation(Page $page): array
    {
        return $page->generateNavigationItems([
            ViewNrobject::class,
            EditNrobject::class,
            ManageNumberranges::class,
        ]);
    }

    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Start;
}
