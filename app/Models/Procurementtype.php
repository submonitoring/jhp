<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string|null $procurement_type
 * @property string|null $procurement_type_desc
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Procurementtype newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Procurementtype newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Procurementtype query()
 * @method static \Illuminate\Database\Eloquent\Builder|Procurementtype whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Procurementtype whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Procurementtype whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Procurementtype whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Procurementtype whereProcurementType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Procurementtype whereProcurementTypeDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Procurementtype whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Procurementtype whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Procurementtype extends Model
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
