<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materialstoragelocation extends Model
{
    use HasFactory;

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

    public function storagecondition()
    {
        return $this->belongsTo(Storagecondition::class);
    }

    public function temperaturecondition()
    {
        return $this->belongsTo(Temperaturecondition::class);
    }

    public function materialplants()
    {
        return $this->morphToMany(Materialplant::class, 'materialplantable');
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
