<?php

namespace App\Models;

use App\log;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kenepa\ResourceLock\Models\Concerns\HasLocks;

class Glgroup extends Model
{
    public function glaccountGlgroups()
    {
        return $this->hasMany(GlaccountGlgroup::class);
    }

    use log;
    use HasFactory;
    // use LogsActivity;
    use HasLocks;
}
