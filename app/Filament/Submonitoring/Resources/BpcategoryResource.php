<?php

namespace App\Filament\Submonitoring\Resources;

use App\Filament\Submonitoring\Clusters\Businesspartnercustm;
use App\Filament\Submonitoring\Resources\BpcategoryResource\Pages;
use App\Filament\Submonitoring\Resources\BpcategoryResource\Pages\ManageTitles;
use App\Filament\Submonitoring\Resources\BpcategoryResource\RelationManagers;
use App\Models\Bpcategory;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Pages\Page;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Resource;
use Filament\Support\Enums\ActionSize;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\CheckboxColumn;
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
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Schmeits\FilamentCharacterCounter\Forms\Components\TextInput;

class BpcategoryResource extends Resource
{
    protected static ?string $model = Bpcategory::class;

    public static function canViewAny(): bool
    {
        return auth()->user()->id == 1;
    }

    protected static ?string $modelLabel = 'Business Partner Category';

    protected static ?string $pluralModelLabel = 'Business Partner Category';

    protected static ?string $navigationLabel = 'Business Partner Category';

    protected static ?int $navigationSort = 807000000;

    protected static ?string $cluster = Businesspartnercustm::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form

            ->schema(static::BusinessPartnerCategoryFormSchema());
    }

    public static function BusinessPartnerCategoryFormSchema(): array
    {
        return [

            Section::make('Business Partner Category')
                ->schema([

                    Grid::make(4)
                        ->schema([

                            TextInput::make('bpcategory')
                                ->label('Business Partner Category')
                                ->required()
                                ->maxLength(1)
                                ->unique(Bpcategory::class, ignoreRecord: true),

                            TextInput::make('bpcategory_desc')
                                ->label('Description')
                                ->required(),

                        ]),

                ])->collapsible()
                ->compact(),

            Section::make('Status')
                ->schema([

                    Grid::make(4)
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

                ColumnGroup::make('Business Partner Category', [
                    TextColumn::make('bpcategory')
                        ->label('Business Partner Category')
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
                        ->sortable(),

                    TextColumn::make('bpcategory_desc')
                        ->label('Description')
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
                        ->sortable(),
                ]),

                ColumnGroup::make('Status', [

                    CheckboxColumn::make('is_active')
                        ->label('Status')
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
            ->extremePaginationLinks()
            ->searchOnBlur()
            ->filters([
                QueryBuilder::make()
                    ->constraintPickerColumns(1)
                    ->constraints([

                        TextConstraint::make('bpcategory')
                            ->label('Business Partner Category')
                            ->icon(false),

                        TextConstraint::make('bpcategory_desc')
                            ->label('Description')
                            ->icon(false)
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

                    ])
            ], layout: Tables\Enums\FiltersLayout::AboveContentCollapsible)
            ->deferFilters()
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                ]),
                ActionGroup::make([
                    Action::make('assign_title')
                        ->label('Assign Title')
                        ->icon('heroicon-m-arrow-right-end-on-rectangle')
                        ->url(fn(Model $record): string => route('filament.submonitoring.businesspartnercustm.resources.bpcategories.managetitles', $record)),
                ])
                    ->label('Assignment')
                    ->icon('heroicon-m-arrow-right-end-on-rectangle')
                    ->size(ActionSize::Small)
                    ->outlined()
                    ->button(),


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
            'index' => Pages\ListBpcategories::route('/'),
            'create' => Pages\CreateBpcategory::route('/create'),
            'view' => Pages\ViewBpcategory::route('/{record}'),
            'edit' => Pages\EditBpcategory::route('/{record}/edit'),
            'managetitles' => Pages\ManageTitles::route('/{record}/title'),
        ];
    }

    public static function getRecordSubNavigation(Page $page): array
    {
        return $page->generateNavigationItems([
            ManageTitles::class,
        ]);
    }
}
