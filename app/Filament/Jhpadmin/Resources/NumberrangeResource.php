<?php

namespace App\Filament\Jhpadmin\Resources;

use App\Filament\Jhpadmin\Clusters\NumberRange as ClustersNumberRange;
use App\Filament\Jhpadmin\Resources\NumberrangeResource\Pages;
use App\Filament\Jhpadmin\Resources\NumberrangeResource\RelationManagers;
use App\Filament\Submonitoring\Resources\NumberrangeResource as ResourcesNumberrangeResource;
use App\Models\Numberrange;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NumberrangeResource extends Resource
{
    public static function canViewAny(): bool
    {
        return auth()->user()->id == 1;
    }

    protected static ?string $modelLabel = 'Number Range';

    protected static ?string $pluralModelLabel = 'Number Range';

    protected static ?string $navigationLabel = 'Number Range';

    protected static ?int $navigationSort = 720;

    protected static ?string $model = Numberrange::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $cluster = ClustersNumberRange::class;

    public static function form(Form $form): Form
    {
        return ResourcesNumberrangeResource::form($form);
    }

    public static function table(Table $table): Table
    {
        return ResourcesNumberrangeResource::table($table);
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
            'index' => Pages\ListNumberranges::route('/'),
            'create' => Pages\CreateNumberrange::route('/create'),
            'view' => Pages\ViewNumberrange::route('/{record}'),
            'edit' => Pages\EditNumberrange::route('/{record}/edit'),
        ];
    }
}
