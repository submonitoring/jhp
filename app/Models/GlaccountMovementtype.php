<?php

namespace App\Models;

use App\log;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kenepa\ResourceLock\Models\Concerns\HasLocks;

class GlaccountMovementtype extends Model
{
    public function glaccount()
    {
        return $this->belongsTo(Glaccount::class);
    }

    public function movementtype()
    {
        return $this->belongsTo(Movementtype::class);
    }

    use log;
    use HasFactory;
    // use LogsActivity;
    use HasLocks;
}
