<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string|null $temperature_condition
 * @property string|null $temperature_condition_desc
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Temperaturecondition newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Temperaturecondition newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Temperaturecondition query()
 * @method static \Illuminate\Database\Eloquent\Builder|Temperaturecondition whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Temperaturecondition whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Temperaturecondition whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Temperaturecondition whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Temperaturecondition whereTemperatureCondition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Temperaturecondition whereTemperatureConditionDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Temperaturecondition whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Temperaturecondition whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Temperaturecondition extends Model
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
