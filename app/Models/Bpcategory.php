<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bpcategory extends Model
{
    use HasFactory;

    public function businesspartners()
    {
        return $this->hasMany(Businesspartner::class);
    }

    public function titles()
    {
        return $this->belongsToMany(Title::class);
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
