<?php

namespace App\Filament\Submonitoring\Clusters;

use App\Filament\Submonitoring\Resources\MaterialmasterResource\Pages\ManageMaterialplant;
use Filament\Clusters\Cluster;
use Filament\Pages\Page;
use Filament\Pages\SubNavigationPosition;

class MaterialMasterData extends Cluster
{
    // protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?int $navigationSort = 710000000;

    protected static ?string $navigationGroup = 'Master Data';

    public static function getPages(): array
    {
        return [
            'managematerialplant' => ManageMaterialplant::route('/{record}/materialplant'),
        ];
    }

    public static function getRecordSubNavigation(Page $page): array
    {
        return $page->generateNavigationItems([
            ManageMaterialplant::class,
        ]);
    }

    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Start;
}
