<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string|null $kabupaten_code
 * @property string|null $kabupaten
 * @property int|null $provinsi_id
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Kodepos> $allKodepos
 * @property-read int|null $all_kodepos_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Kecamatan> $kecamatans
 * @property-read int|null $kecamatans_count
 * @property-read \App\Models\Provinsi|null $provinsi
 * @method static \Illuminate\Database\Eloquent\Builder|Kabupaten newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kabupaten newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kabupaten query()
 * @method static \Illuminate\Database\Eloquent\Builder|Kabupaten whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kabupaten whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kabupaten whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kabupaten whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kabupaten whereKabupaten($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kabupaten whereKabupatenCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kabupaten whereProvinsiId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kabupaten whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kabupaten whereUpdatedBy($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Address> $addresses
 * @property-read int|null $addresses_count
 * @mixin \Eloquent
 */
class Kabupaten extends Model
{
    use HasFactory;

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }

    public function kecamatans()
    {
        return $this->hasMany(Kecamatan::class);
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
