<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batchmaster extends Model
{
    use HasFactory;

    public function businesspartner()
    {
        return $this->belongsTo(Businesspartner::class);
    }

    public function numberrange()
    {
        return $this->belongsTo(Numberrange::class);
    }

    public function batchsource()
    {
        return $this->belongsTo(Batchsource::class);
    }

    public function materialdocumentitems()
    {
        return $this->hasMany(Materialdocumentitem::class);
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
