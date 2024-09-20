<?php

namespace App\Filament\Submonitoring\Clusters;

use Filament\Clusters\Cluster;

class ManageUser extends Cluster
{
    // protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?int $navigationSort = 900000000;

    protected static ?string $navigationGroup = 'Manage Users';
}
