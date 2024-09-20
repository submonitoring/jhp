<?php

namespace App\Filament\Jhpadmin\Resources;

use App\Filament\Jhpadmin\Clusters\NumberRange;
use App\Filament\Jhpadmin\Resources\NrobjectResource\Pages;
use App\Filament\Jhpadmin\Resources\NrobjectResource\RelationManagers;
use App\Filament\Submonitoring\Resources\NrobjectResource as ResourcesNrobjectResource;
use App\Filament\Submonitoring\Resources\NrobjectResource\Pages\ManageNumberranges;
use App\Models\Nrobject;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NrobjectResource extends Resource
{
    public static function canViewAny(): bool
    {
        return auth()->user()->id == 1;
    }

    protected static ?string $modelLabel = 'NR Object';

    protected static ?string $pluralModelLabel = 'NR Object';

    protected static ?string $navigationLabel = 'NR Object';

    protected static ?int $navigationSort = 710;

    protected static ?string $model = Nrobject::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $cluster = NumberRange::class;

    public static function form(Form $form): Form
    {
        return ResourcesNrobjectResource::form($form);
    }

    public static function table(Table $table): Table
    {
        return ResourcesNrobjectResource::table($table);
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
            'index' => Pages\ListNrobjects::route('/'),
            'create' => Pages\CreateNrobject::route('/create'),
            'view' => Pages\ViewNrobject::route('/{record}'),
            'edit' => Pages\EditNrobject::route('/{record}/edit'),
            'managenumberranges' => ManageNumberranges::route('/{record}/numberranges'),
        ];
    }

    public static function getRecordSubNavigation(Page $page): array
    {
        return ResourcesNrobjectResource::getRecordSubNavigation($page);
    }

    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Start;
}
