<?php

namespace App\Filament\Jhpadmin\Widgets;

use App\Filament\Jhpadmin\Resources\MaterialtypeResource;
use App\Filament\Jhpadmin\Resources\NrobjectResource;
use App\Filament\Submonitoring\Resources\CompanycodeResource;
use App\Models\Sysobject;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Model;

class Menu extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Sysobject::whereId(1)
            )
            ->columns([
                TextColumn::make('')
                ->default('Link')
                ->badge()
                ->url(NrobjectResource::getUrl(panel: 'submonitoring')),
                TextColumn::make('1'),
                TextColumn::make('2'),
                TextColumn::make('3'),
                TextColumn::make('4'),
                TextColumn::make('5'),
                TextColumn::make('6'),
                TextColumn::make('7'),
                TextColumn::make('8'),
                // TextColumn::make('9'),
            ]);
    }
}
