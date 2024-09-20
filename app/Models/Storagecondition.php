<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string|null $storage_condition
 * @property string|null $storage_condition_desc
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Storagecondition newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Storagecondition newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Storagecondition query()
 * @method static \Illuminate\Database\Eloquent\Builder|Storagecondition whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Storagecondition whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Storagecondition whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Storagecondition whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Storagecondition whereStorageCondition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Storagecondition whereStorageConditionDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Storagecondition whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Storagecondition whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Storagecondition extends Model
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
