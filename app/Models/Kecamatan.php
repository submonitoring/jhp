<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string|null $kecamatan_code
 * @property string|null $kecamatan
 * @property int|null $kabupaten_id
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Kodepos> $allKodepos
 * @property-read int|null $all_kodepos_count
 * @property-read \App\Models\Kabupaten|null $kabupaten
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Kelurahan> $kelurahans
 * @property-read int|null $kelurahans_count
 * @method static \Illuminate\Database\Eloquent\Builder|Kecamatan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kecamatan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kecamatan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Kecamatan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kecamatan whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kecamatan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kecamatan whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kecamatan whereKabupatenId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kecamatan whereKecamatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kecamatan whereKecamatanCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kecamatan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kecamatan whereUpdatedBy($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Address> $addresses
 * @property-read int|null $addresses_count
 * @mixin \Eloquent
 */
class Kecamatan extends Model
{
    use HasFactory;

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class);
    }

    public function kelurahans()
    {
        return $this->hasMany(Kelurahan::class);
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
