<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string|null $period_indicator
 * @property string|null $period_indicator_desc
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Periodindicator newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Periodindicator newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Periodindicator query()
 * @method static \Illuminate\Database\Eloquent\Builder|Periodindicator whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Periodindicator whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Periodindicator whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Periodindicator whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Periodindicator wherePeriodIndicator($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Periodindicator wherePeriodIndicatorDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Periodindicator whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Periodindicator whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Periodindicator extends Model
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
