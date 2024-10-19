<?php

namespace App\Filament\Submonitoring\Resources;

use App\Filament\Submonitoring\Clusters\BusinessPartner as ClustersBusinessPartner;
use App\Filament\Submonitoring\Resources\BusinesspartnerResource\Pages;
use App\Filament\Submonitoring\Resources\BusinesspartnerResource\RelationManagers;
use App\Models\Businesspartner;
use App\Models\Numberrange;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
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

class BusinesspartnerResource extends Resource
{
    protected static ?string $model = Businesspartner::class;

    public static function canViewAny(): bool
    {
        return auth()->user()->id == 1;
    }

    protected static ?string $modelLabel = 'Business Partner';

    protected static ?string $pluralModelLabel = 'Business Partner';

    protected static ?string $navigationLabel = 'Business Partner';

    protected static ?int $navigationSort = 700000050;

    protected static ?string $cluster = ClustersBusinessPartner::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form

            ->schema(static::BusinessPartnerFormSchema());
    }

    public static function BusinessPartnerFormSchema(): array
    {
        return [

            Section::make('Business Partner')
                ->schema([

                    Hidden::make('numberrange_id')
                        ->label('NR Interval')
                        ->default(function () {

                            $nriid = Numberrange::whereNrInterval('BP01')->first();

                            return ($nriid->id);
                        }),

                    Grid::make(4)
                        ->schema([

                            TextInput::make('bp_number')
                                ->label('BP Number')
                                ->disabled(),

                        ]),

                ])->collapsible()
                ->compact(),

            Section::make('General Data')
                ->relationship('addresses')
                ->schema([

                    TextInput::make('name_1')
                        ->label('Name'),

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
            ->columns([

                ColumnGroup::make('Business Partner', [
                    TextColumn::make('business_partner')
                        ->label('Business Partner')
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
                        ->sortable(),

                    TextColumn::make('business_partner_desc')
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
            ])
            ->recordUrl(null)
            ->searchOnBlur()
            ->filters([
                QueryBuilder::make()
                    ->constraintPickerColumns(1)
                    ->constraints([

                        TextConstraint::make('business_partner')
                            ->label('Business Partner')
                            ->icon(false),

                        TextConstraint::make('business_partner_desc')
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBusinesspartners::route('/'),
            'create' => Pages\CreateBusinesspartner::route('/create'),
            'view' => Pages\ViewBusinesspartner::route('/{record}'),
            'edit' => Pages\EditBusinesspartner::route('/{record}/edit'),
        ];
    }
}
