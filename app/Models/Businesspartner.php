<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Businesspartner extends Model
{
    use HasFactory;

    public function numberrange()
    {
        return $this->belongsTo(Numberrange::class);
    }

    public function bpcategory()
    {
        return $this->belongsTo(Bpcategory::class);
    }

    public function bprole()
    {
        return $this->belongsTo(Bprole::class);
    }

    public function addresses()
    {
        return $this->morphToMany(Address::class, 'addressable');
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
