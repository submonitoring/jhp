<?php

namespace App\Filament\Submonitoring\Resources\ProvinsiResource\RelationManagers;

use App\Filament\Submonitoring\Resources\KabupatenResource;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KabupatensRelationManager extends RelationManager
{
    protected static string $relationship = 'kabupatens';

    protected static ?string $title = 'Kabupaten';

    public function form(Form $form): Form
    {
        return KabupatenResource::form($form);
    }

    public function table(Table $table): Table
    {
        return KabupatenResource::table($table);
    }
}
