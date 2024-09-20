<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string|null $loading_group
 * @property string|null $loading_group_desc
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Loadinggroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Loadinggroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Loadinggroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|Loadinggroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Loadinggroup whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Loadinggroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Loadinggroup whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Loadinggroup whereLoadingGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Loadinggroup whereLoadingGroupDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Loadinggroup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Loadinggroup whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Loadinggroup extends Model
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
