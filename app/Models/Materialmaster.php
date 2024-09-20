<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materialmaster extends Model
{
    use HasFactory;

    public function numberrange()
    {
        return $this->belongsTo(Numberrange::class);
    }

    public function materialtype()
    {
        return $this->belongsTo(Materialtype::class);
    }

    public function industrysector()
    {
        return $this->belongsTo(Industrysector::class);
    }

    public function materialgroup()
    {
        return $this->belongsTo(Materialgroup::class);
    }

    public function genitemcategorygroup()
    {
        return $this->belongsTo(Itemcategorygroup::class, 'itemcategorygroup_id');
    }

    public function base_uom()
    {
        return $this->belongsTo(Uom::class, 'base_uom');
    }

    public function weight_unit()
    {
        return $this->belongsTo(Uom::class, 'weight_unit');
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
