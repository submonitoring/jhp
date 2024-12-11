<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string|null $1
 * @property string|null $2
 * @property string|null $3
 * @property string|null $4
 * @property string|null $5
 * @property string|null $6
 * @property string|null $7
 * @property string|null $8
 * @property string|null $9
 * @property string|null $link
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Sysobject newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sysobject newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sysobject query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sysobject where1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysobject where2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysobject where3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysobject where4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysobject where5($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysobject where6($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysobject where7($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysobject where8($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysobject where9($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysobject whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysobject whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysobject whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysobject whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysobject whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysobject whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysobject whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Sysobject extends Model
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
