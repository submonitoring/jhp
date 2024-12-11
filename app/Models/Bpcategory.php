<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @property int $id
 * @property string|null $bpcategory
 * @property string|null $bpcategory_desc
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Businesspartner> $businesspartners
 * @property-read int|null $businesspartners_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Title> $titles
 * @property-read int|null $titles_count
 * @method static \Illuminate\Database\Eloquent\Builder|Bpcategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bpcategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bpcategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|Bpcategory whereBpcategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bpcategory whereBpcategoryDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bpcategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bpcategory whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bpcategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bpcategory whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bpcategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bpcategory whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Bpcategory extends Model
{
    use HasFactory;

    public function businesspartners()
    {
        return $this->hasMany(Businesspartner::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function titles()
    {
        return $this->belongsToMany(Title::class);
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
