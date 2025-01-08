<?php

namespace App\Models;

use App\log;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kenepa\ResourceLock\Models\Concerns\HasLocks;

class GlaccountGlgroup extends Model
{

    public function glgroup()
    {
        return $this->belongsTo(Glgroup::class);
    }

    public function glaccount()
    {
        return $this->belongsTo(Glaccount::class);
    }

    use log;
    use HasFactory;
    // use LogsActivity;
    use HasLocks;
}
