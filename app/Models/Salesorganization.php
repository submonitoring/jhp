<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Salesorganization extends Model
{
    public function companycode()
    {
        return $this->belongsTo(Companycode::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function salesareas()
    {
        return $this->hasMany(Salesarea::class);
    }

    public function distributionchannels()
    {
        return $this->belongsToMany(Distributionchannel::class);
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
