<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $title_desc
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Bpcategory> $bpcategories
 * @property-read int|null $bpcategories_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Businesspartner> $businesspartners
 * @property-read int|null $businesspartners_count
 * @method static \Illuminate\Database\Eloquent\Builder|Title newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Title newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Title query()
 * @method static \Illuminate\Database\Eloquent\Builder|Title whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Title whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Title whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Title whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Title whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Title whereTitleDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Title whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Title whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Title extends Model
{
    use HasFactory;

    public function bpcategories()
    {
        return $this->belongsToMany(Bpcategory::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

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
