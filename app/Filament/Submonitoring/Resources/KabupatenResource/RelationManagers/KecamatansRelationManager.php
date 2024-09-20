<?php

namespace App\Filament\Submonitoring\Resources\KabupatenResource\RelationManagers;

use App\Filament\Submonitoring\Resources\KecamatanResource;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KecamatansRelationManager extends RelationManager
{
    protected static string $relationship = 'kecamatans';

    protected static ?string $title = 'Kecamatan';

    public function form(Form $form): Form
    {
        return KecamatanResource::form($form);
    }

    public function table(Table $table): Table
    {
        return KecamatanResource::table($table);
    }
}
