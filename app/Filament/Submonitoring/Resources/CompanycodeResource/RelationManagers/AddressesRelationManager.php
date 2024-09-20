<?php

namespace App\Filament\Submonitoring\Resources\CompanycodeResource\RelationManagers;

use App\Filament\Submonitoring\Resources\AddressResource;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\QueryBuilder;
use Filament\Tables\Filters\QueryBuilder\Constraints\BooleanConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\TextConstraint;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AddressesRelationManager extends RelationManager
{
    protected static string $relationship = 'addresses';

    public function form(Form $form): Form
    {
        return AddressResource::form($form);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name_1')
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
            ->headerActions([
                Tables\Actions\CreateAction::make(),
                Tables\Actions\AttachAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DetachAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DetachBulkAction::make(),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
