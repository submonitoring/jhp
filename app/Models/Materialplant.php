<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materialplant extends Model
{
    use HasFactory;

    public function cyclecounting()
    {
        return $this->belongsTo(Cyclecounting::class);
    }

    public function loadinggroup()
    {
        return $this->belongsTo(Loadinggroup::class);
    }

    public function periodindicator()
    {
        return $this->belongsTo(Periodindicator::class);
    }

    public function procurementtype()
    {
        return $this->belongsTo(Procurementtype::class);
    }

    public function transportationgroup()
    {
        return $this->belongsTo(Transportationgroup::class);
    }

    public function specialprocurementtype()
    {
        return $this->belongsTo(Specialprocurementtype::class);
    }

    public function plant()
    {
        return $this->belongsTo(Plant::class);
    }

    public function materialmaster()
    {
        return $this->belongsTo(Materialmaster::class);
    }

    public function materialmasters()
    {
        return $this->morphToMany(Materialmaster::class, 'materialmasterable');
    }

    public function materialstoragelocations()
    {
        return $this->morphedByMany(
            Materialstoragelocation::class,
            'materialplantable'
        );
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
