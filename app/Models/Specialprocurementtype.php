<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string|null $special_procurement_type
 * @property string|null $special_procurement_type_desc
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Specialprocurementtype newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Specialprocurementtype newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Specialprocurementtype query()
 * @method static \Illuminate\Database\Eloquent\Builder|Specialprocurementtype whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Specialprocurementtype whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Specialprocurementtype whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Specialprocurementtype whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Specialprocurementtype whereSpecialProcurementType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Specialprocurementtype whereSpecialProcurementTypeDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Specialprocurementtype whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Specialprocurementtype whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Specialprocurementtype extends Model
{
    use HasFactory;

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
