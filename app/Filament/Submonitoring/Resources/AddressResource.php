<?php

namespace App\Filament\Submonitoring\Resources;

use App\Filament\Submonitoring\Clusters\Address as ClustersAddress;
use App\Filament\Submonitoring\Resources\AddressResource\Pages;
use App\Filament\Submonitoring\Resources\AddressResource\RelationManagers;
use App\Models\Address;
use App\Models\Country;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Kodepos;
use App\Models\Numberrange;
use App\Models\Provinsi;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Textarea;
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
use Illuminate\Support\Collection;
use Schmeits\FilamentCharacterCounter\Forms\Components\TextInput;
use Str;

class AddressResource extends Resource
{
    protected static ?string $model = Address::class;

    public static function canViewAny(): bool
    {
        return auth()->user()->id == 1;
    }

    protected static ?string $modelLabel = 'Address';

    protected static ?string $pluralModelLabel = 'Address';

    protected static ?string $navigationLabel = 'Address';

    protected static ?int $navigationSort = 820000000;

    protected static ?string $cluster = ClustersAddress::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(static::AddressFormSchema());
    }

    public static function AddressFormSchema(): array
    {
        return [

            Section::make()
                ->schema([

                    Hidden::make('numberrange_id')
                        ->label('NR Interval')
                        ->default(function () {

                            $nriid = Numberrange::whereNrInterval('ADDR')->first();

                            return ($nriid->id);
                        }),

                    Grid::make(4)
                        ->schema([

                            TextInput::make('address_number')
                                ->label('Address Number')
                                ->disabled(),

                        ]),
                ]),


            //address general data
            Section::make('Address General Data')
                ->schema([

                    Grid::make(4)
                        ->schema([

                            TextInput::make('name_1')
                                ->label('Name 1')
                                ->required()
                                ->characterLimit(40),

                            TextInput::make('name_2')
                                ->label('Name 2')
                                ->characterLimit(40),

                            TextInput::make('name_3')
                                ->label('Name 3')
                                ->characterLimit(40),

                            TextInput::make('name_4')
                                ->label('Name 4')
                                ->characterLimit(40),
                        ]),

                ]),
            //end of address general data

            //address Communication Data
            Section::make('Address Communication Data')
                ->schema([

                    Grid::make(2)
                        ->schema([

                            TextInput::make('telephone_number_1')
                                ->label('Telephone Number 1')
                                // ->required()
                                ->tel()
                                ->characterLimit(30),

                            TextInput::make('telephone_number_1_ext')
                                ->label('Telephone Number 1 Extension')
                                // ->required()
                                ->characterLimit(10),

                            TextInput::make('telephone_number_2')
                                ->label('Telephone Number 2')
                                // ->required()
                                ->tel()
                                ->characterLimit(30),

                            TextInput::make('telephone_number_2_ext')
                                ->label('Telephone Number 2 Extension')
                                // ->required()
                                ->characterLimit(10),

                            TextInput::make('fax_number_1')
                                ->label('Fax Number 1')
                                // ->required()
                                ->tel()
                                ->characterLimit(30),

                            TextInput::make('fax_number_1_ext')
                                ->label('Fax Number 1 Extension')
                                // ->required()
                                ->characterLimit(10),

                            TextInput::make('fax_number_2')
                                ->label('Fax Number 2')
                                // ->required()
                                ->tel()
                                ->characterLimit(30),

                            TextInput::make('fax_number_2_ext')
                                ->label('Fax Number 2 Extension')
                                // ->required()
                                ->characterLimit(10),

                            TextInput::make('handphone_number_1')
                                ->label('Handphone Number 1')
                                ->required()
                                ->tel()
                                ->characterLimit(30),

                            TextInput::make('handphone_number_2')
                                ->label('Handphone Number 2')
                                // ->required()
                                ->tel()
                                ->characterLimit(30),

                            TextInput::make('email')
                                ->label('Email')
                                // ->required()
                                ->email(),

                        ]),

                ]),
            //end of address Communication Data


            Section::make('Address Data')
                ->schema([
                    Grid::make(4)
                        ->schema([

                            Select::make('country_id')
                                ->label('Country')
                                ->live()
                                ->options(Country::whereIsActive(1)->pluck('country_name', 'id'))
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

                            TextArea::make('street')
                                ->label('Street')
                                ->required()
                                ->columnSpanFull()
                                ->hidden(fn(Get $get) =>
                                $get('country_id') == 105),

                            TextInput::make('building_number')
                                ->label('Building Number')
                                // ->required()
                                ->hidden(fn(Get $get) =>
                                $get('country_id') == 105),

                            TextInput::make('floor')
                                ->label('Floor')
                                // ->required()
                                ->hidden(fn(Get $get) =>
                                $get('country_id') == 105),

                            TextInput::make('room')
                                ->label('Room')
                                // ->required()
                                ->hidden(fn(Get $get) =>
                                $get('country_id') == 105),

                            TextInput::make('city')
                                ->label('City')
                                // ->required()
                                ->hidden(fn(Get $get) =>
                                $get('country_id') == 105),

                            TextInput::make('district')
                                ->label('District')
                                // ->required()
                                ->hidden(fn(Get $get) =>
                                $get('country_id') == 105),

                            TextInput::make('po_box')
                                ->label('PO Box')
                                ->numeric()
                                // ->required()
                                ->hidden(fn(Get $get) =>
                                $get('country_id') == 105),
                        ]),
                    //end of if country_id != 105
                ]),

            Section::make()
                ->schema([

                    Grid::make(4)
                        ->schema([

                            Toggle::make('is_active')
                                ->label('Status')
                                ->default(true),

                        ]),
                ]),

        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('numberrange.nr_interval')
                    ->label('NR Interval')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('address_number')
                    ->label('Address Number')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('name_1')
                    ->label('Name 1')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('name_2')
                    ->label('Name 2')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('name_3')
                    ->label('Name 3')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('name_4')
                    ->label('Name 4')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('telephone_number_1')
                    ->label('Telephone Number 1')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('telephone_number_1_ext')
                    ->label('Telephone Number 1 Extension')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('telephone_number_2')
                    ->label('Telephone Number 2')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('telephone_number_2_ext')
                    ->label('Telephone Number 2 Extension')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('fax_number_1')
                    ->label('Fax Number 1')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('fax_number_1_ext')
                    ->label('Fax Number 1 Extension')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('fax_number_2')
                    ->label('Fax Number 2')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('fax_number_2_ext')
                    ->label('Fax Number 2 Extension')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('handphone_number_1')
                    ->label('Handphone Number 1')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('handphone_number_2')
                    ->label('Handphone Number 2')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('country.country_name')
                    ->label('Country')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('provinsi.provinsi')
                    ->label('Provinsi')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('kabupaten.kabupaten')
                    ->label('Kabupaten')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('kecamatan.kecamatan')
                    ->label('Kecamatan')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('kelurahan.kelurahan')
                    ->label('Kelurahan')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('alamat')
                    ->label('Alamat')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('rt')
                    ->label('RT')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('rw')
                    ->label('RW')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('kodepos')
                    ->label('Kodepos')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('street')
                    ->label('Street')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('building_number')
                    ->label('Building Number')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('floor')
                    ->label('Floor')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('room')
                    ->label('Room')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('city')
                    ->label('City')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('district')
                    ->label('District')
                    ->searchable(isIndividual: true, isGlobal: false)
                    ->copyable()
                    ->copyableState(function ($state) {
                        return ($state);
                    })
                    ->copyMessage('Tersalin')
                    ->sortable(),

                TextColumn::make('po_box')
                    ->label('PO Box')
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

                        TextConstraint::make('numberrange.nr_interval')
                            ->label('NR Interval')
                            ->nullable(),

                        TextConstraint::make('address_number')
                            ->label('Address Number')
                            ->nullable(),

                        TextConstraint::make('name_1')
                            ->label('Name 1')
                            ->nullable(),

                        TextConstraint::make('name_2')
                            ->label('Name 2')
                            ->nullable(),

                        TextConstraint::make('name_3')
                            ->label('Name 3')
                            ->nullable(),

                        TextConstraint::make('name_4')
                            ->label('Name 4')
                            ->nullable(),

                        TextConstraint::make('telephone_number_1')
                            ->label('Telephone Number 1')
                            ->nullable(),

                        TextConstraint::make('telephone_number_1_ext')
                            ->label('Telephone Number 1 Extension')
                            ->nullable(),

                        TextConstraint::make('telephone_number_2')
                            ->label('Telephone Number 2')
                            ->nullable(),

                        TextConstraint::make('telephone_number_2_ext')
                            ->label('Telephone Number 2 Extension')
                            ->nullable(),

                        TextConstraint::make('fax_number_1')
                            ->label('Fax Number 1')
                            ->nullable(),

                        TextConstraint::make('fax_number_1_ext')
                            ->label('Fax Number 1 Extension')
                            ->nullable(),

                        TextConstraint::make('fax_number_2')
                            ->label('Fax Number 2')
                            ->nullable(),

                        TextConstraint::make('fax_number_2_ext')
                            ->label('Fax Number 2 Extension')
                            ->nullable(),

                        TextConstraint::make('handphone_number_1')
                            ->label('Handphone Number 1')
                            ->nullable(),

                        TextConstraint::make('handphone_number_2')
                            ->label('Handphone Number 2')
                            ->nullable(),

                        TextConstraint::make('email')
                            ->label('Email')
                            ->nullable(),

                        TextConstraint::make('country.country_name')
                            ->label('Country')
                            ->nullable(),

                        TextConstraint::make('provinsi.provinsi')
                            ->label('Provinsi')
                            ->nullable(),

                        TextConstraint::make('kabupaten.kabupaten')
                            ->label('Kabupaten')
                            ->nullable(),

                        TextConstraint::make('kecamatan.kecamatan')
                            ->label('Kecamatan')
                            ->nullable(),

                        TextConstraint::make('kelurahan.kelurahan')
                            ->label('Kelurahan')
                            ->nullable(),

                        TextConstraint::make('alamat')
                            ->label('Alamat')
                            ->nullable(),

                        TextConstraint::make('rt')
                            ->label('RT')
                            ->nullable(),

                        TextConstraint::make('rw')
                            ->label('RW')
                            ->nullable(),

                        TextConstraint::make('kodepos')
                            ->label('Kodepos')
                            ->nullable(),

                        TextConstraint::make('street')
                            ->label('Street')
                            ->nullable(),

                        TextConstraint::make('building_number')
                            ->label('Building Number')
                            ->nullable(),

                        TextConstraint::make('floor')
                            ->label('Floor')
                            ->nullable(),

                        TextConstraint::make('room')
                            ->label('Room')
                            ->nullable(),

                        TextConstraint::make('city')
                            ->label('City')
                            ->nullable(),

                        TextConstraint::make('district')
                            ->label('District')
                            ->nullable(),

                        TextConstraint::make('po_box')
                            ->label('PO Box')
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
            'index' => Pages\ListAddresses::route('/'),
            'create' => Pages\CreateAddress::route('/create'),
            'view' => Pages\ViewAddress::route('/{record}'),
            'edit' => Pages\EditAddress::route('/{record}/edit'),
        ];
    }
}
