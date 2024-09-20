<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @property int $id
 * @property string|null $material_type
 * @property string|null $material_type_desc
 * @property int|null $numberrange_id
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Numberrange|null $numberrange
 * @method static \Illuminate\Database\Eloquent\Builder|Materialtype newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Materialtype newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Materialtype query()
 * @method static \Illuminate\Database\Eloquent\Builder|Materialtype whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialtype whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialtype whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialtype whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialtype whereMaterialType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialtype whereMaterialTypeDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialtype whereNumberrangeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialtype whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialtype whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Materialtype extends Model
{
    use HasFactory;

    public function numberrange()
    {
        return $this->belongsTo(Numberrange::class);
    }

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
