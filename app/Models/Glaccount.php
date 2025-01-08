<?php

namespace App\Models;

use App\log;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kenepa\ResourceLock\Models\Concerns\HasLocks;
use Spatie\Activitylog\Traits\LogsActivity;

class Glaccount extends Model
{

    public function glaccountGlgroups()
    {
        return $this->hasMany(GlaccountGlgroup::class);
    }

    public function glaccountMovementtypes()
    {
        return $this->hasMany(GlaccountMovementtype::class);
    }

    use log;
    use HasFactory;
    // use LogsActivity;
    use HasLocks;
}
