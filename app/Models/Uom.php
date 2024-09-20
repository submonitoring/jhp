<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @property int $id
 * @property string|null $uom
 * @property string|null $uom_name
 * @property string|null $iso_uom
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Uom newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Uom newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Uom query()
 * @method static \Illuminate\Database\Eloquent\Builder|Uom whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Uom whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Uom whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Uom whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Uom whereIsoUom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Uom whereUom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Uom whereUomName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Uom whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Uom whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Uom extends Model
{
    use HasFactory;

    public function materialmasters()
    {
        return $this->hasMany(Materialmaster::class, 'base_uom');
    }

    public function materialmasters2()
    {
        return $this->hasMany(Materialmaster::class, 'weight_unit');
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
