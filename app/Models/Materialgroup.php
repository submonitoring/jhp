<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @property int $id
 * @property string|null $material_group
 * @property string|null $material_group_desc
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Materialgroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Materialgroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Materialgroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|Materialgroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialgroup whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialgroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialgroup whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialgroup whereMaterialGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialgroup whereMaterialGroupDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialgroup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialgroup whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Materialgroup extends Model
{
    use HasFactory;

    public function materialmasters()
    {
        return $this->hasMany(Materialmaster::class);
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
