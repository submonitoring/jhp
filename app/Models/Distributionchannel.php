<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Distributionchannel extends Model
{
    public function salesareas()
    {
        return $this->hasMany(Salesarea::class);
    }

    public function salesorganizations()
    {
        return $this->belongsToMany(Salesorganization::class);
    }

    public function divisions()
    {
        return $this->belongsToMany(Division::class);
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
