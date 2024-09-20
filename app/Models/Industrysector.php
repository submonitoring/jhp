<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @property int $id
 * @property string|null $industry_sector
 * @property string|null $industry_sector_desc
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Industrysector newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Industrysector newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Industrysector query()
 * @method static \Illuminate\Database\Eloquent\Builder|Industrysector whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Industrysector whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Industrysector whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Industrysector whereIndustrySector($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Industrysector whereIndustrySectorDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Industrysector whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Industrysector whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Industrysector whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Industrysector extends Model
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
