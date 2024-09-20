<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string|null $country_name
 * @property string|null $alpha_2
 * @property string|null $alpha_3
 * @property string|null $country_code
 * @property string|null $region
 * @property string|null $sub_region
 * @property string|null $intermediate_region
 * @property string|null $region_code
 * @property string|null $sub_region_code
 * @property string|null $intermediate_region_code
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Kodepos> $allKodepos
 * @property-read int|null $all_kodepos_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Provinsi> $provinsis
 * @property-read int|null $provinsis_count
 * @method static \Illuminate\Database\Eloquent\Builder|Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country query()
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereAlpha2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereAlpha3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCountryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereIntermediateRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereIntermediateRegionCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereRegionCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereSubRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereSubRegionCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereUpdatedBy($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Address> $addresses
 * @property-read int|null $addresses_count
 * @mixin \Eloquent
 */
class Country extends Model
{
    use HasFactory;

    public function provinsis()
    {
        return $this->hasMany(Provinsi::class);
    }

    public function allKodepos()
    {
        return $this->hasMany(Kodepos::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
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
