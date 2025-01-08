<?php

namespace App\Models;

use App\log;
use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kenepa\ResourceLock\Models\Concerns\HasLocks;
use Spatie\Activitylog\Traits\LogsActivity;

class Chartofaccount extends Model
{

    public function chartofaccountCompanycodes()
    {
        return $this->hasMany(ChartofaccountCompanycode::class);
    }

    use log;
    use HasFactory;
    // use LogsActivity;
    use HasLocks;
}
