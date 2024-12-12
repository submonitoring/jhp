<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kenepa\ResourceLock\Models\Concerns\HasLocks;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Materialdocumentitem extends Model
{
    use HasFactory;
    use LogsActivity;
    use HasLocks;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll();
    }

    public function materialdocumentheader()
    {
        return $this->belongsTo(Materialdocumentheader::class);
    }

    public function movementtype()
    {
        return $this->belongsTo(Movementtype::class);
    }

    public function materialmaster()
    {
        return $this->belongsTo(Materialmaster::class);
    }

    public function plant()
    {
        return $this->belongsTo(Plant::class);
    }

    public function storagelocation()
    {
        return $this->belongsTo(Storagelocation::class);
    }

    public function stocktype()
    {
        return $this->belongsTo(Stocktype::class);
    }

    public function debitcreditindicator()
    {
        return $this->belongsTo(Debitcreditindicator::class);
    }

    public function uom()
    {
        return $this->belongsTo(Uom::class);
    }

    public function reasonformovement()
    {
        return $this->belongsTo(Reasonformovement::class);
    }

    public function batchmaster()
    {
        return $this->belongsTo(Batchmaster::class);
    }

    public static function boot()
    {
        parent::boot();
        $user = Auth::user();

        if ($user === null) {
            return;
        } else {

            static::creating(function ($model) {
                $user = Auth::user();
                $model->created_by = $user->username;
                $model->updated_by = $user->username;
            });
            static::updating(function ($model) {
                $user = Auth::user();
                $model->updated_by = $user->username;
            });
        }
    }
}
