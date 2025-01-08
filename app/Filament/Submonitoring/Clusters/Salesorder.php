<?php

namespace App\Filament\Submonitoring\Clusters;

use Filament\Clusters\Cluster;

class Salesorder extends Cluster
{
    // protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    protected static ?int $navigationSort = 500000000;

    protected static ?string $navigationGroup = 'Sales Order';
}
