<?php

namespace App\Filament\Submonitoring\Resources;

use App\Filament\Submonitoring\Clusters\BusinessPartner as ClustersBusinessPartner;
use App\Filament\Submonitoring\Resources\BusinesspartnerResource\Pages;
use App\Filament\Submonitoring\Resources\BusinesspartnerResource\RelationManagers;
use App\Models\Bpcategory;
use App\Models\Bpcategory_title;
use App\Models\Bprole;
use App\Models\Businesspartner;
use App\Models\Country;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Kodepos;
use App\Models\Numberrange;
use App\Models\Provinsi;
use App\Models\Title;
use DB;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;
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
use Illuminate\Support\Collection;
use Schmeits\FilamentCharacterCounter\Forms\Components\Textarea;
use Schmeits\FilamentCharacterCounter\Forms\Components\TextInput;
use Str;

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

            ->schema(static::BusinessPartnerFormSchema())->columns(1);
    }

    public static function BusinessPartnerFormSchema(): array
    {
        return [

            Tabs::make('BP')
                ->tabs([
                    Tab::make('General Data')
                        ->schema([
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

                                ])
                                ->compact(),

                            Split::make([
                                Section::make('Business Partner Category')
                                    ->schema([

                                        ToggleButtons::make('bpcategory_id')
                                            ->label('')
                                            ->options(Bpcategory::all()->pluck('bpcategory_desc', 'id'))
                                            ->live()
                                            ->inline()
                                            ->afterStateUpdated(function (Set $set) {
                                                $set('title_id', null);
                                            }),

                                    ])
                                    ->columnspan(4)
                                    ->compact(),

                                Section::make('Business Partner Role')
                                    ->schema([

                                        ToggleButtons::make('bprole_id')
                                            ->label('')
                                            ->options(Bprole::all()->pluck('bprole_desc', 'id'))
                                            ->inline()
                                            ->multiple()
                                            ->live(),

                                    ])
                                    ->columnspan(2)
                                    ->compact(),

                            ]),

                            Section::make('General Data')
                                // ->hidden(fn(Get $get) => $get('bpcategory_id') === null)
                                ->schema([
                                    Split::make([
                                        Fieldset::make('Nama')
                                            ->schema([

                                                Grid::make(4)
                                                    ->schema([
                                                        Select::make('title_id')
                                                            ->label('Title')
                                                            ->options(function (Get $get) {

                                                                $bpcategory = $get('bpcategory_id');

                                                                $title = Bpcategory_title::all()->where('bpcategory_id', $bpcategory)->pluck('title_id');

                                                                return (Title::whereIn('id', $title)->pluck('title', 'id'));
                                                            })
                                                            ->native(false),

                                                    ]),

                                                Grid::make()
                                                    ->schema([

                                                        TextInput::make('name_1')
                                                            ->label('Nama'),

                                                    ])

                                            ])

                                    ]),

                                    Split::make([
                                        Fieldset::make('Communication')
                                            ->schema([

                                                Grid::make(4)
                                                    ->schema([

                                                        TextInput::make('telephone_number_1')
                                                            ->tel()
                                                            ->label('Telp 1'),

                                                        TextInput::make('telephone_number_1_ext')
                                                            ->label('Telp 1 Extension'),

                                                    ]),

                                                Grid::make(4)
                                                    ->schema([

                                                        TextInput::make('telephone_number_2')
                                                            ->tel()
                                                            ->label('Telp 2'),

                                                        TextInput::make('telephone_number_2_ext')
                                                            ->label('Telp 2 Extension'),

                                                    ]),

                                                Grid::make(4)
                                                    ->schema([

                                                        TextInput::make('fax_number_1')
                                                            ->tel()
                                                            ->label('Fax 1'),

                                                        TextInput::make('fax_number_1_ext')
                                                            ->label('Fax 1 Extension'),

                                                    ]),

                                                Grid::make(4)
                                                    ->schema([

                                                        TextInput::make('fax_number_2')
                                                            ->tel()
                                                            ->label('Fax 2'),

                                                        TextInput::make('fax_number_2_ext')
                                                            ->label('Fax 2 Extension'),

                                                    ]),

                                                Grid::make(4)
                                                    ->schema([

                                                        TextInput::make('handphone_number_1')
                                                            ->tel()
                                                            ->label('Handphone 1'),

                                                    ]),

                                                Grid::make(4)
                                                    ->schema([

                                                        TextInput::make('handphone_number_2')
                                                            ->tel()
                                                            ->label('Handphone 2'),

                                                    ]),

                                                Grid::make(4)
                                                    ->schema([

                                                        TextInput::make('email')
                                                            ->label('Email')
                                                            ->email(),

                                                    ]),

                                            ])
                                            ->columnspan(4),

                                    ]),

                                    Split::make([
                                        Fieldset::make('Address')
                                            ->schema([

                                                Grid::make(4)
                                                    ->schema([

                                                        Select::make('country_id')
                                                            ->label('Country')
                                                            ->live()
                                                            ->options(Country::whereIsActive(1)->pluck('country_name', 'id'))
                                                            // ->native(false)
                                                            // ->default(105)
                                                            // ->disabled()
                                                            ->dehydrated(),

                                                    ]),

                                                //if country_id = 105
                                                Grid::make(4)
                                                    ->schema([

                                                        Select::make('provinsi_id')
                                                            ->label('Provinsi')
                                                            ->placeholder('Pilih Provinsi')
                                                            ->options(Provinsi::whereIsActive(1)->pluck('provinsi', 'id'))
                                                            ->searchable()
                                                            ->required()
                                                            ->live()
                                                            ->native(false)
                                                            ->hidden(fn(Get $get) =>
                                                            $get('country_id') != 105)
                                                            ->afterStateUpdated(function (Set $set) {
                                                                $set('kabupaten_id', null);
                                                                $set('kecamatan_id', null);
                                                                $set('kelurahan_id', null);
                                                                $set('kodepos', null);
                                                            }),

                                                        Select::make('kabupaten_id')
                                                            ->label('Kabupaten')
                                                            ->placeholder('Pilih Kabupaten')
                                                            ->options(fn(Get $get): Collection => Kabupaten::query()
                                                                ->where('provinsi_id', $get('provinsi_id'))
                                                                ->pluck('kabupaten', 'id'))
                                                            ->searchable()
                                                            ->required()
                                                            ->live()
                                                            ->native(false)
                                                            ->hidden(fn(Get $get) =>
                                                            $get('country_id') != 105),

                                                        Select::make('kecamatan_id')
                                                            ->label('Kecamatan')
                                                            ->placeholder('Pilih Kecamatan')
                                                            ->options(fn(Get $get): Collection => Kecamatan::query()
                                                                ->where('kabupaten_id', $get('kabupaten_id'))
                                                                ->pluck('kecamatan', 'id'))
                                                            ->searchable()
                                                            ->required()
                                                            ->live()
                                                            ->native(false)
                                                            ->hidden(fn(Get $get) =>
                                                            $get('country_id') != 105),

                                                        Select::make('kelurahan_id')
                                                            ->label('Kelurahan')
                                                            ->placeholder('Pilih Kelurahan')
                                                            ->options(fn(Get $get): Collection => Kelurahan::query()
                                                                ->where('kecamatan_id', $get('kecamatan_id'))
                                                                ->pluck('kelurahan', 'id'))
                                                            ->searchable()
                                                            ->required()
                                                            ->live()
                                                            ->native(false)
                                                            ->hidden(fn(Get $get) =>
                                                            $get('country_id') != 105)
                                                            ->afterStateUpdated(function (Get $get, ?string $state, Set $set, ?string $old) {

                                                                if (($get('kodepos') ?? '') != Str::slug($old)) {
                                                                    return;
                                                                }

                                                                $kodepos = Kodepos::where('kelurahan_id', $state)->first();

                                                                $set('kodepos_id', $kodepos->id);
                                                                $set('kodepos', $kodepos->kodepos);
                                                            }),

                                                        Textarea::make('alamat')
                                                            ->label('Alamat')
                                                            ->required()
                                                            ->columnSpanFull()
                                                            ->hidden(fn(Get $get) =>
                                                            $get('country_id') != 105),

                                                        TextInput::make('rt')
                                                            ->label('RT')
                                                            ->numeric()
                                                            ->required()
                                                            ->hidden(fn(Get $get) =>
                                                            $get('country_id') != 105),

                                                        TextInput::make('rw')
                                                            ->label('RW')
                                                            ->numeric()
                                                            ->required()
                                                            ->hidden(fn(Get $get) =>
                                                            $get('country_id') != 105),

                                                        TextInput::make('kodepos')
                                                            ->label('Kodepos')
                                                            ->disabled()
                                                            ->required()
                                                            ->dehydrated()
                                                            ->hidden(fn(Get $get) =>
                                                            $get('country_id') != 105),

                                                        Hidden::make('kodepos_id'),
                                                    ]),
                                                //end of if country_id = 105

                                                //if country_id != 105
                                                Grid::make(4)
                                                    ->schema([

                                                        Textarea::make('street')
                                                            ->label('Street')
                                                            ->required()
                                                            ->columnSpanFull()
                                                            ->hidden(fn(Get $get) =>
                                                            $get('country_id') == 105 ||
                                                                $get('country_id') == null),

                                                    ]),

                                                Grid::make(4)
                                                    ->schema([

                                                        TextInput::make('building_number')
                                                            ->label('Building Number')
                                                            // ->required()
                                                            ->hidden(fn(Get $get) =>
                                                            $get('country_id') == 105 ||
                                                                $get('country_id') == null),

                                                    ]),

                                                Grid::make(4)
                                                    ->schema([

                                                        TextInput::make('floor')
                                                            ->label('Floor')
                                                            // ->required()
                                                            ->hidden(fn(Get $get) =>
                                                            $get('country_id') == 105 ||
                                                                $get('country_id') == null),

                                                    ]),

                                                Grid::make(4)
                                                    ->schema([

                                                        TextInput::make('room')
                                                            ->label('Room')
                                                            // ->required()
                                                            ->hidden(fn(Get $get) =>
                                                            $get('country_id') == 105 ||
                                                                $get('country_id') == null),

                                                    ]),

                                                Grid::make(4)
                                                    ->schema([

                                                        TextInput::make('city')
                                                            ->label('City')
                                                            // ->required()
                                                            ->hidden(fn(Get $get) =>
                                                            $get('country_id') == 105 ||
                                                                $get('country_id') == null),

                                                    ]),

                                                Grid::make(4)
                                                    ->schema([

                                                        TextInput::make('district')
                                                            ->label('District')
                                                            // ->required()
                                                            ->hidden(fn(Get $get) =>
                                                            $get('country_id') == 105 ||
                                                                $get('country_id') == null),

                                                    ]),

                                                Grid::make(4)
                                                    ->schema([

                                                        TextInput::make('po_box')
                                                            ->label('PO Box')
                                                            ->numeric()
                                                            // ->required()
                                                            ->hidden(fn(Get $get) =>
                                                            $get('country_id') == 105 ||
                                                                $get('country_id') == null),
                                                    ]),
                                                //end of if country_id != 105


                                            ])
                                            ->columnspan(4),

                                    ]),


                                ]),

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

                        ]),
                    Tab::make('Customer Data')
                        ->hidden(fn(Get $get) => !in_array('1', $get('bprole_id')))
                        ->schema([
                            // ...
                        ]),
                    Tab::make('Vendor Data')
                        ->hidden(fn(Get $get) => !in_array('2', $get('bprole_id')))
                        ->schema([
                            // ...
                        ]),
                ])->contained(false),

        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                ColumnGroup::make('Business Partner', [
                    TextColumn::make('bp_number')
                        ->label('BP Number')
                        ->copyable()
                        ->copyableState(function ($state) {
                            return ($state);
                        })
                        ->copyMessage('Tersalin')
                        ->sortable(),

                    TextColumn::make('name_1')
                        ->label('Name')
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

                        TextConstraint::make('bp_number')
                            ->label('BP Number')
                            ->icon(false),

                        TextConstraint::make('name_1')
                            ->label('Name')
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
