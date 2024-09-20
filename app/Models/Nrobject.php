<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

/**
 * 
 *
 * @property int $id
 * @property string|null $nrobject
 * @property string|null $nrobject_name
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Numberrange> $numberranges
 * @property-read int|null $numberranges_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Nrobject newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Nrobject newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Nrobject query()
 * @method static \Illuminate\Database\Eloquent\Builder|Nrobject whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nrobject whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nrobject whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nrobject whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nrobject whereNrobject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nrobject whereNrobjectName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nrobject whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nrobject whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Nrobject extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function numberranges()
    {
        return $this->hasMany(Numberrange::class);
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
