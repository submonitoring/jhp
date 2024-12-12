<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kenepa\ResourceLock\Models\Concerns\HasLocks;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Materialdocumentheader extends Model
{
    use HasFactory;
    use LogsActivity;
    use HasLocks;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll();
    }

    protected $casts = [
        'materialdocumentitems' => 'array',
    ];


    public function transactiontype()
    {
        return $this->belongsTo(Transactiontype::class);
    }

    public function documenttype()
    {
        return $this->belongsTo(Documenttype::class);
    }

    public function transactionreference()
    {
        return $this->belongsTo(Transactionreference::class);
    }

    public function materialdocumentitems()
    {
        return $this->hasMany(Materialdocumentitem::class);
    }

    public function businesspartner()
    {
        return $this->belongsTo(Businesspartner::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function numberrange()
    {
        return $this->belongsTo(Numberrange::class);
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
