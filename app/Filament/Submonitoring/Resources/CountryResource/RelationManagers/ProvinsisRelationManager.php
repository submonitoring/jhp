<?php

namespace App\Filament\Submonitoring\Resources\CountryResource\RelationManagers;

use App\Filament\Submonitoring\Resources\ProvinsiResource;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProvinsisRelationManager extends RelationManager
{
    protected static string $relationship = 'provinsis';

    protected static ?string $title = 'Provinsi';

    public function form(Form $form): Form
    {
        return ProvinsiResource::form($form);
    }

    public function table(Table $table): Table
    {
        return ProvinsiResource::table($table);
    }
}
