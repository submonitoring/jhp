<?php

namespace App\Filament\Submonitoring\Resources;

use App\Filament\Submonitoring\Clusters\General;
use App\Filament\Submonitoring\Resources\TitleResource\Pages;
use App\Filament\Submonitoring\Resources\TitleResource\RelationManagers;
use App\Models\Title;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
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

class TitleResource extends Resource
{
    protected static ?string $model = Title::class;

    public static function canViewAny(): bool
    {
        return auth()->user()->id == 1;
    }

    protected static ?string $modelLabel = 'Title';

    protected static ?string $pluralModelLabel = 'Title';

    protected static ?string $navigationLabel = 'Title';

    protected static ?int $navigationSort = 805000100;

    protected static ?string $cluster = General::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form

            ->schema(static::TitleFormSchema());
    }

    public static function TitleFormSchema(): array
    {
        return [

            Section::make('Title')
                ->schema([

                    Grid::make(4)
                        ->schema([

                            TextInput::make('title')
                                ->label('Title')
                                ->required()
                                ->unique(Title::class, ignoreRecord: true),

                            TextInput::make('title_desc')
                                ->label('Description')
                                ->required(),

                        ]),

                ])->collapsible()
                ->compact(),

            Section::make('Status')
                ->schema([

                    Grid::make(4)
                        ->schema([

                            Toggle::make('is_active')
                                ->label('Is Active?')
                                ->default(true),

                        ]),
                ])->collapsible()
                ->compact(),

        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(static::TitleTableColumns())
            ->recordUrl(null)
            ->searchOnBlur()
            ->filters([
                QueryBuilder::make()
                    ->constraintPickerColumns(1)
                    ->constraints([

                        TextConstraint::make('title')
                            ->label('Title')
                            ->icon(false),

                        TextConstraint::make('title_desc')
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
                    ActionGroup::make([
                        Tables\Actions\ViewAction::make(),
                        Tables\Actions\EditAction::make(),
                    ])->dropdown(false),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function TitleTableColumns(): array
    {
        return
            [

                ColumnGroup::make('Title', [
                    TextColumn::make('title')
                        ->label('Title')
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
                        ->sortable(),

                    TextColumn::make('title_desc')
                        ->label('Description')
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
            ];
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
            'index' => Pages\ListTitles::route('/'),
            'create' => Pages\CreateTitle::route('/create'),
            'view' => Pages\ViewTitle::route('/{record}'),
            'edit' => Pages\EditTitle::route('/{record}/edit'),
        ];
    }
}
