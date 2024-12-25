<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Salesarea extends Model
{
    public function salesorganization()
    {
        return $this->belongsTo(Salesorganization::class);
    }

    public function distributionchannel()
    {
        return $this->belongsTo(Distributionchannel::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function salesoffices()
    {
        return $this->belongsToMany(Salesoffice::class);
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
