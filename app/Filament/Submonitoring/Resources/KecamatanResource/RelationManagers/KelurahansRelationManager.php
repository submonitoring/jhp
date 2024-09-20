<?php

namespace App\Filament\Submonitoring\Resources\KecamatanResource\RelationManagers;

use App\Filament\Submonitoring\Resources\KelurahanResource;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KelurahansRelationManager extends RelationManager
{
    protected static string $relationship = 'kelurahans';

    protected static ?string $title = 'Kelurahan';

    public function form(Form $form): Form
    {
        return KelurahanResource::form($form);
    }

    public function table(Table $table): Table
    {
        return KelurahanResource::table($table);
    }
}
