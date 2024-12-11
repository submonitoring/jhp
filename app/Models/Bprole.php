<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string|null $bprole
 * @property string|null $bprole_desc
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Businesspartner> $businesspartners
 * @property-read int|null $businesspartners_count
 * @method static \Illuminate\Database\Eloquent\Builder|Bprole newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bprole newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bprole query()
 * @method static \Illuminate\Database\Eloquent\Builder|Bprole whereBprole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bprole whereBproleDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bprole whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bprole whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bprole whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bprole whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bprole whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bprole whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Bprole extends Model
{
    use HasFactory;

    public function businesspartners()
    {
        return $this->hasMany(Businesspartner::class);
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
